<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Models\ProductPriceSale;
use App\Models\Products;
use App\Models\TatalBillDetail;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use Cookie;
use App\Models\Area;
use Validator;
use Mail;
use App\Models\ClientInformation;
use App\Models\Bill;
use App\Models\ProductCategories;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryProduct(Request $request, $slugParent, $slugChild = null, $slugChildLevel = null)
    {

        // dd($request->all());
        $paramMenu['parent'] = $slugParent;
        $paramMenu['parentChill'] = $slugChild;
        $paramMenu['parentChillLevel'] = $slugChildLevel;

        $category = Category::getParentIDProduct($paramMenu['parent']);
        $listCategoties = Category::getParamMenuCategoryID($category->id);

        $categories = Category::getCategorySlugParamMenu($paramMenu);

        $brand = Brand::getAllBrandIDByCategoryID($categories->id);
        // dd($request->aliasCategory);
        if($request->has('aliasCategory')|| $request->has('category') || $request->has('price') || $request->has('brand')) {
            
            if($request->has('category')) {
                $data['category']   = $request->input('category');
            } else {
                $data['category'] = [$category->id];
                $products = Products::getProductByCategory($categories->id);
            }
            $data['price']      = str_replace(",", "", $request->input('price', ''));

            $data['brand'] = $request->input('brand');
            
            $products = Products::getProductByCategories($data);
            // $products = Products::getProductByCategory($categories->id);
            foreach($products as $product) {
                $product['listImage'] = ProductImage::getTwoImageCategoryProduct($product->id);
            }
        }else {
            $products = Products::getProductByCategory($categories->id);
            foreach($products as $product) {
                // dd($product->id);
                $product['listImage'] = ProductImage::getTwoImageCategoryProduct($product->id);
                // dd($product['listImage']);
            }
        }
        
        // dd($products);
        return view('frontend.pages.products.products', compact('listCategoties', 'products', 'categories', 'slugParent', 'slugChild', 'slugChildLevel', 'brand'));
    }


    public function detailProduct($aliasCate, $aliasPro = null) {
        $aliasCate = $aliasCate;
        
        if($aliasCate && $aliasPro) {
            
            $detailProduct = Products::getProductByAlias($aliasPro);

            $detailProduct['imgColor'] = Color::getColorByPhotoID($detailProduct->id); 
    
            $detailProduct['brand'] = Brand::getBrandByID($detailProduct->brand_id);
    
            $detailProduct['listImage'] = ProductImage::getImageCategoryProduct($detailProduct->id);
    
            $category = Category::where('alias', $aliasCate)->first();
            // dd($category, "dswjk");
            $productOrther = Products::getProductOrtherByIDCategory($category->id);
            foreach($productOrther as $item) {
                $item['listImage'] = ProductImage::getTwoImageCategoryProduct($item->id);
            }
        }else {
            
            $detailProduct = Products::getProductByAlias($aliasCate);
            $detailProduct['imgColor'] = Color::getColorByPhotoID($detailProduct->id);
            $detailProduct['brand'] = Brand::getBrandByID($detailProduct->brand_id);
            $detailProduct['listImage'] = ProductImage::getImageCategoryProduct($detailProduct->id);

            $detailProduct['category'] = ProductCategories::getCategoryByIDProduct($detailProduct->id);
            $productOrther = Products::getProductOrtherByIDCategory($detailProduct['category']->id);
            foreach($productOrther as $item) {
                $item['listImage'] = ProductImage::getTwoImageCategoryProduct($item->id);
            }
            $category = ProductCategories::getCategoryByIDProduct($detailProduct->id);
        }

        $listPriceSale = ProductPriceSale::getPriceSaleByIDProduct($detailProduct->id);
        $dataPriceSale = [];
        $itemP = [];
        $order =  0;
        foreach($listPriceSale as $key => $price) {
            if(empty($price->mainCategory)) {
                continue;
            }
            $itemP[$price->mainCategory->id][$price->category->id] = [
                'categoryName' => $price->category->name,
                'price' => $price->price,
                'id' => $price->id,
            ];
            $dataPriceSale[$price->mainCategory->id] = [
                'name' => $price->mainCategory->name,
                'id' => $price->mainCategory->id,
                'items' => $itemP[$price->mainCategory->id]
            ];
            
        }
        // dd($detailProduct);
        return view('frontend.pages.products.detail-product', compact('detailProduct', 'productOrther', 'aliasCate', 'category', 'dataPriceSale'));
    }


    public function checkout() {
        
        $brands = Brand::getAllBrandHome();
        $sessionDataCart = session()->get('infoProducts') ?? [];
        $newSession = $sessionDataCart;
        unset($newSession['total']);
        $dataProduct = [];
        $totalCart = 0;
        $totalQT = 0;
        $priceSaleOff = 0;
        $setPriceSaleOff = 0;
        $dataSale = [];
        if(!empty($newSession)) {
            foreach ($newSession as $k => $value) {
                $product = Products::select('id','name', 'price_sale','unit','brand_id')
                            ->where('id', $value['id'])->first();
                            // dd($value);
                $product['listImage'] = ProductImage::getTwoImageCategoryProduct($product->id);
                $product->quantity = $value['quantity'];
                $product->name_sale = $value['name_sale'];
                $product->priceSaleOffProduct = $value['price_sale'];
                $product->totalAmount = $value['totalAmount'];
                $dataProduct[] = $product;
                $totalCart += $value['quantity'] * ($value['name_sale'] ? $value['price_sale'] : $product->price_sale);
                $totalQT += $value['quantity'];
                $priceSaleOff += $value['quantity'] * $value['price_sale'];
                $dataSale = $value['name_sale'] ? true : null;
                $setPriceSaleOff = $value['price_sale'];
            }
        }
        $sessionDataCart['total'] = $totalCart;
        // dd($dataProduct);
        // dd($setPriceSaleOff);
        return view('frontend.pages.products.checkout', compact('dataProduct', 'brands', 'totalCart', 'totalQT', 'priceSaleOff', 'dataSale', 'setPriceSaleOff'));
    }


    public function addToCart(Request $request) {
        $sessionDataCart = session()->get('infoProducts') ?? [];
        $sessionDataCart[$request->id]['id'] = $request->id;
        $sessionDataCart[$request->id]['name'] = $request->name;
        $sessionDataCart[$request->id]['price_sale'] = $request->price;
        $sessionDataCart[$request->id]['quantity'] = $request->quantity;
        $sessionDataCart[$request->id]['image'] = $request->image;
        $sessionDataCart[$request->id]['color'] = $request->color;
        $sessionDataCart[$request->id]['brand'] = $request->brand;
        $sessionDataCart[$request->id]['totalAmount'] = $request->quantity * $request->price;
        $sessionDataCart[$request->id]['name_sale'] = $request->nameSale;
        session()->put('infoProducts', $sessionDataCart);
        return response()->json(['msg' => 'Thêm vào giỏ hàng thành công', 'data' => $sessionDataCart]);
    }


    public function updateCart(Request $request) {
        
        $sessionDataCart = session()->get('infoProducts') ?? [];
        
        $newSession = $sessionDataCart;
        unset($newSession['total']);
        if(!empty($newSession)) {
            foreach ($newSession as $key => $item) {
                if($item['id'] == $request->id ) {
                    $newSession[$key]['id'] = $request->id;
                    $newSession[$key]['name'] = $request->name;
                    $newSession[$key]['price_sale'] = $request->price;
                    $newSession[$key]['quantity'] = $request->quantity;
                    $newSession[$key]['image'] = $request->image;
                    $newSession[$key]['color'] = $request->color;
                    $newSession[$key]['brand'] = $request->color;
                    $newSession[$key]['totalAmount'] = $request->quantity * $request->price;
                    session()->put('infoProducts', $newSession);
                }
            }
        }
        // dd($sessionDataCart);
        return response()->json(['msg' => 'Cập Nhật Thành Công', 'data' => $sessionDataCart]);
    }


    public function deleteCart($id){
        $sessionDataCart = session()->get('infoProducts') ?? [];
        $newSession = $sessionDataCart;
        unset($newSession['total']);
        $tmpSession = [];
        if(!empty($newSession)){
            foreach ($newSession as $value) {
                if($value['id'] != (int)$id){
                    $tmpSession[] = $value;
                }
            }
        }
        if($tmpSession) {
            session()->put('infoProducts', $tmpSession);
        }
        if(count($tmpSession) == 0) {
            session()->forget('infoProducts');
        }
        return redirect()->route('checkout');
    }

    public function getClientInformation(){
        $brands = Brand::getAllBrandHome();
        $sessionDataCart = session()->get('infoProducts') ?? [];
        $newSession = $sessionDataCart;
        unset($newSession['total']);
        $dataProduct = [];
        $totalCart = 0;
        $totalQT = 0;
        if(!empty($newSession)) {
            foreach ($newSession as $k => $value) {
                $product = Products::select('id','name', 'price_sale','url_imgs','unit','brand_id')
                            ->where('id', $value['id'])->first();
                $product->quantity = $value['quantity'];
                $dataProduct[] = $product;
                // $totalCart += $value['quantity'] * $product->price_sale;
                $totalCart += $value['quantity'] * ($value['name_sale'] ? $value['price_sale'] : $product->price_sale);
                $totalQT += $value['quantity'];
            }
        }
        $sessionDataCart['total'] = $totalCart;
        $CityID = 0;
        $city = Area::getAllCity($CityID);
        // dd($totalCart);
        return view('frontend.pages.products.client-information', compact('totalQT', 'totalCart', 'city'));
    }
    

    public function loadCity($id = 0) {
        $id = ['parent_id' => $id];
        $district = Area::where($id)->orderBy('weight','asc')->get();
        return $district;
    }


    public function clientInformation(Request $request) {
        
        // $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $alphabet = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $code = array(); //remember to declare $code as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 10; $i++) {
            $n = rand(0, $alphaLength);
            $code[] = $alphabet[$n];
        }

        // dd(implode($code));
        
        $rules = [
            'name'      => 'required',
            'email'     => 'required|email',
            'phone'     => 'required',
            'address'   => 'required',
            'district'  => 'required',
            'city'      => 'required',
            'payment'   => 'required'
        ];
        $messages = [
            'name.required'     => 'Vui lòng nhập họ tên',
            'email.required'    => 'Vui lòng nhập email',
            'email.email'       => 'Vui lòng nhập đúng định dạng email',
            'phone.required'    => 'Vui lòng nhập số điện thoại',
            'address.required'  => 'Vui lòng chọn địa chỉ   ',
            'district.required' => 'Vui lòng chọn Quận/huyện',
            'city.required'     => 'Vui lòng chọn Tỉnh/TP',
            'payment.required'     => 'Vui lòng chọn hình thức thanh toán',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // $bill_find = ClientInformation::orderByRaw('cast(code AS SIGNED) DESC')->first();
            // $code = ($bill_find) ? ((int)($bill_find->code) + 1).'' : 10000;
            //hadle save bill
            $infoClient = new ClientInformation();
            $infoClient->name         = $request->name;
            $infoClient->email        = $request->email;
            $infoClient->phone        = $request->phone;
            $infoClient->address      = trim($request->address);
            $infoClient->district     = $request->district;
            $infoClient->city         = $request->city;
            $infoClient->note         = $request->note ?? null;
            $infoClient->code_bill         = implode($code);
            $infoClient->sex       = (int)$request->sex ?? 0;
            $infoClient->payment      = $request->payment;
            $infoClient->status       = 0;
            $infoClient->ship       = 'Chưa Giao';

            // $sessionProducts = session()->get('infoProducts') ?? [];
            $sessionDataCart = session()->get('infoProducts') ?? [];
            
            if ($infoClient->save()) {

                $cart_detail = [];
                $cart_total = 0;

                // $bill               = new Bill();
                // $bill->bill_id          =  $infoClient->id;
                // $bill->product_id       = 0;
                // $bill->qty              = 0;
                // $bill->price            = $sessionDataCart['total'];
                // dd($sessionDataCart);
                foreach ($sessionDataCart as $key => $value) {
                    if($key != "total") {
                        // $product = Product::select('id', 'name', 'price', 'photo', 'unit')
                        //     ->where('products.id', $value['id'])->first();

                        $product = Products::select('id','name', 'price_sale','url_imgs','unit','brand_id')
                            ->where('id', $value['id'])->first();
                        // dd($value['price_sale']);
                        $product->quantity = $value['quantity'];
                        $product->priceSaleOff = $value['price_sale'];
                        $product->name_sale = $value['name_sale'];
                        $product->totalPriceSaleOff = $value['quantity'] * ($value['name_sale'] ? $value['price_sale'] : $product->price_sale);
                        $cart_detail[] = $product;
                        // $cart_total += $value['quantity'] * $product->price_sale;
                        $cart_total += $value['quantity'] * ($value['name_sale'] ? $value['price_sale'] : $product->price_sale);
                        $billProduct = new Bill();
                        $billProduct->product_id = $value['id'];
                        $billProduct->bill_id = $infoClient->id;
                        $billProduct->qty = $value['quantity'];
                        $billProduct->color_id = 0;
                        $billProduct->price = $value['quantity'] * ($value['name_sale'] ? $value['price_sale'] : $product->price_sale);
                        if($value['name_sale']) {
                            $billProduct->sale_off = $value['price_sale'];
                            foreach ($value['name_sale'] as $key => $value) {
                                $item[]["name"] = $value["name"];
                                $billProduct->category_name = json_encode($item);
                            }
                        }
                        
                        $billProduct->save();
                    }
                }
                // dd($billProduct);

                $tatalBill = new TatalBillDetail();
                $tatalBill->bill_id = $infoClient->id;
                $tatalBill->tatal = $cart_total;
                $tatalBill->save();
            }
            $brand = Brand::getAllBrandHome();
            $city = Area::where('id',(int)$request->city)->first();
            $district = Area::where('id', (int)$request->district)->first();

            $area['district'] = trim($district->name);
            $area['city'] = trim($city->name);

            $data_send['bill'] = $infoClient;
            foreach($cart_detail as $itemImage) {
                $itemImage['listImage'] = ProductImage::getTwoImageCategoryProduct($itemImage->id);
            }
            // dd($cart_detail);
            Mail::send(
                'frontend.pages.products.email',
                [
                    'bill' => $infoClient,
                    'area' => $area,
                    'city' => $city,
                    'district'=> $district,
                    'cart_detail' => $cart_detail,
                    'cart_total' => $cart_total,
                    'brand' => $brand,
                ],

                function ($message) use ($data_send) {
                    $message->from('mksgvn@gmail.com', 'matkinhsaigon.com.vn');
                    $message->subject('Đơn hàng: '.$data_send['bill']->code);
                    $message->to($data_send['bill']->email);
                    $message->cc('mksgvn@gmail.com');
                }
            );

            $sessionProducts = session()->get('infoProducts') ?? [];
            return redirect()->route('getSuccess');
        }
    }


    public function getSuccess() {
        return view('frontend.pages.products.product-success');
    }

    public function getImageColor(Request $request) {
        $idColor = $request->input('idColor');
        $idProduct = $request->input('idProduct');
        $detailProduct = ProductImage::getImageByColor($idColor, $idProduct);
        // $detailProduct = Products::where('id', $idProduct)->first();
        // $detailProduct["listImage"] = ProductImage::getImageByColor($idColor, $idProduct);
        // $html = view('frontend.pages.products.image-left', compact('detailProduct'))->render();
        $response = [
            'status' => true,
            // 'html' => $html
            'data' => $detailProduct
        ];
        return response()->json($response);
    }
}
