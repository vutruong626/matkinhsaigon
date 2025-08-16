<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Material;
use App\Models\ProductCategories;
use App\Models\ProductImage;
use App\Models\ProductPriceSale;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Services\Utilities\UploadImages;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListProduct(Request $request) {
        
        $dataRequest = $request->all();
        // dd($dataRequest);
        $parentID = 0;
        $parentCategories = Category::getAllCategoryParentID($parentID);
        $brand = Brand::getAllBrandHome();
        if(!$request->category || !$request->brand || !$request->keywork || !$request->page) {
            $listProduct = Products::getAllProductAmdin();
        }
        if($request->page) {
            $listProduct = Products::getAllProductAmdin();
        }
        if($request->category || $request->brand || $request->keywork) {
            $listProduct = Products::searcAllProductCategoriesBrand($dataRequest);
        }
        // dd($listProduct);
        return view('admin.dashboard.products.list-product', compact('listProduct', 'parentCategories', 'brand'));
    }

    public function getCreateProduct() {
        $parentID = 0;
        $categories = Category::where('parent_id',$parentID)->where('type', 'product')->get();
        $brand = Brand::getAllBrandHome();
        $material = Material::getMaterialAdmin();
        return view('admin.dashboard.products.create-product', compact('categories', 'brand', 'material'));
    }


    public function postAddProduct(Request $request) {
        
        $request->validate( [
            'name'      => 'required',
            'price'      => 'required',
            'discount_sale'      => 'required',
            'unit'      => 'required',
            'kw'      => 'required',
            'meta_des'      => 'required',
            'categories'      => 'required',
        ]);
        
        $product = new Products();
        $product->name = $request->name;
        $product->alias = $request->alias;

        $description["name"] = $request->description["name"];
        $description["hidden"] = $request->description["hidden"] ?? 0;
        $description["text"] = $request->description["text"];
        $product->description = json_encode($description);

        $content["name"] = $request->content["name"];
        $content["hidden"] = $request->content["hidden"] ?? 0;
        $content["text"] = $request->content["text"];
        $product->content = json_encode($content);

        $service["name"] = $request->service["name"];
        $service["hidden"] = $request->service["hidden"];
        $service["text"] = $request->service["text"];
        $product->service = json_encode($service);

        $tech["name"] = $request->tech["name"];
        $tech["hidden"] = $request->tech["hidden"] ?? 0;
        $tech["text"] = $request->tech["text"];
        $product->tech = json_encode($tech);

        $tutorial["name"] = $request->tutorial["name"];
        $tutorial["hidden"] = $request->tutorial["hidden"] ?? 0;
        $tutorial["text"] = $request->tutorial["text"];
        $product->tutorial = json_encode($tutorial);

        $address_sale["name"] = $request->address_sale["name"];
        $address_sale["hidden"] = $request->address_sale["hidden"] ?? 0;
        $address_sale["text"] = $request->address_sale["text"];
        $product->address_sale = json_encode($address_sale);

        $open_time["name"] = $request->open_time["name"];
        $open_time["hidden"] = $request->open_time["hidden"];
        $open_time["text"] = $request->open_time["text"];
        $product->open_time = json_encode($open_time);

        $product->kw = $request->kw;
        $product->meta_des = $request->meta_des;

        $price = str_replace([',', ' ', ','], ['', '', '.'], $request->price);
        $product->price = $price;

        $discount_sale = str_replace([',', ' ', ','], ['', '', '.'], $request->discount_sale);
        $product->discount_sale = $discount_sale;

        $price_sale = str_replace([',', ' ', ','], ['', '', '.'], $request->price_sale);
        $product->price_sale = $price_sale;

        $product->unit = $request->unit;
        $product->brand_id = $request->brand_id;
        $product->material_id = $request->material_id;
        $product->type_sale = $request->type_sale;
        $product->gender = $request->gender;
        $product->hidden = $request->hidden;
        $product->weight = $request->weight;
        // $product->categories = $request->categories;

        // Chức năng này không có tác dụng chỉ lưu tạm
        $imagesLogo = $request->file('images');
        // if($imagesLogo) {
        //     $dataImage = [];
        //     foreach($imagesLogo as $image) {
        //         dd($image);
        //         $url_imgs["name"] = $image->name;
        //         $url_imgs["color"] = '0';
        //         $url_imgs["weight"] = '0';
        //         array_unshift($dataImage, $url_imgs);
        //     }
        // }
        $product->url_imgs = '';
        // Chức năng này không có tác dụng chỉ lưu tạm
        $product->type_color = $request->type_color;

        if($product->save()) {
            $imagesLogo = $request->file('images');
            foreach($imagesLogo as $image) {
                $ProductImage = new ProductImage();
                $ProductImage->product_id = $product->id;
                $ProductImage->image = UploadImages::storeImageAs($image, Products::IMAGE);
                $ProductImage->color_id = 0;
                $ProductImage->weight = 0;
                $ProductImage->save();
            }
            foreach($request->categories as $itemCate) {
                $category = new ProductCategories();
                $category->ProductID = $product->id;
                $category->CategoryID = $itemCate;
                $category->type = 'product';
                $category->save();
            }

            if($request->prductPriceSale) {
                foreach ($request->prductPriceSale as $itemPriceSale) {
                    $price_sale_off = str_replace([',', ' ', ','], ['', '', '.'], $itemPriceSale['price']);
                    $priceSale = new ProductPriceSale();
                    $priceSale->id_category = $itemPriceSale['cate'];
                    $priceSale->parent_category = $itemPriceSale['parent_cate'];
                    $priceSale->id_Product = $product->id;
                    $priceSale->price = $price_sale_off;
                    $priceSale->save();
                }
            }
            return redirect()->route('products.getListProduct')
                                ->withSuccess("Cập Nhật Thành Công");
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }

    }


    public function getUpdateProduct($id) {
        $parentID = 0;
        $categories = Category::where('parent_id',$parentID)->get();
        $brand = Brand::getAllBrandHome();
        $material = Material::getMaterialAdmin();

        $product = Products::find($id);
        $tmpDescription = json_decode($product->description, true);
        if(isset($tmpDescription['name'])) {
            $product['description']     = json_decode($product->description, true);
        }

        $product['content']     = json_decode($product->content, true);
        $product['tech']        = json_decode($product->tech, true);
        $product['service']     = json_decode($product->service, true);
        $product['tutorial']    = json_decode($product->tutorial, true);
        $product['address_sale'] = json_decode($product->address_sale, true);
        $product['open_time']   = json_decode($product->open_time, true);
        // $product['url_imgs']    = json_decode($product->url_imgs, true);
        
        $categoriesList = $product->categoriesProductByID();
        $getAllImageProduct = ProductImage::where('product_id', $product->id)->orderBy('weight', 'asc')->get();
        $getColor = Color::getAllColorAdmin();

        $product['cate_price_sale'] = ProductPriceSale::getPriceSaleByIDProduct($product->id); 

        // dd($product);


        $parentCategories = Category::getAllCategoryParentID($parentID);
        // dd($product['price_sale']);
        return view('admin.dashboard.products.update-product', compact('categories', 'brand', 'material', 'product', 'categoriesList', 'getAllImageProduct', 'getColor', 'parentCategories'));
    }

    public function postUpdateColorImage(Request $request, $id) {
        // dd($request->all());
        $dataIDColor = ProductImage::find($request->idProductImage);
        $dataIDColor->color_id = $request->idColor;
        if($dataIDColor->update()) {
            return redirect()->back()->with('success', 'Cập nhật thành công');
        }
    }

    public function postUpdateColorWeight(Request $request) {
        $dataIDColor = ProductImage::findOrFail($request->idProductImage);
        $dataIDColor->weight = $request->weight;
        $dataIDColor->update();
        if($dataIDColor) {
            return redirect()->back()->with('success', 'Cập nhật thành công');
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function postUpdateProduct(Request $request, $id) {
        // dd($request->all());
        $request->validate( [
            'name'      => 'required',
            'price'      => 'required',
            'discount_sale'      => 'required',
            'unit'      => 'required',
            'kw'      => 'required',
            'meta_des'      => 'required',
            'categories'      => 'required',
        ]);
        
        $product = Products::find($id);
        $product->name = $request->name;
        $product->alias = $request->alias;

        $description["name"] = $request->description["name"];
        $description["hidden"] = $request->description["hidden"] ?? 0;
        $description["text"] = $request->description["text"];
        $product->description = json_encode($description);

        $content["name"] = $request->content["name"];
        $content["hidden"] = $request->content["hidden"] ?? 0;
        $content["text"] = $request->content["text"];
        $product->content = json_encode($content);

        $service["name"] = $request->service["name"];
        $service["hidden"] = $request->service["hidden"];
        $service["text"] = $request->service["text"];
        $product->service = json_encode($service);

        $tech["name"] = $request->tech["name"];
        $tech["hidden"] = $request->tech["hidden"] ?? 0;
        $tech["text"] = $request->tech["text"];
        $product->tech = json_encode($tech);

        $tutorial["name"] = $request->tutorial["name"];
        $tutorial["hidden"] = $request->tutorial["hidden"] ?? 0;
        $tutorial["text"] = $request->tutorial["text"];
        $product->tutorial = json_encode($tutorial);

        $address_sale["name"] = $request->address_sale["name"];
        $address_sale["hidden"] = $request->address_sale["hidden"] ?? 0;
        $address_sale["text"] = $request->address_sale["text"];
        $product->address_sale = json_encode($address_sale);

        $open_time["name"] = $request->open_time["name"];
        $open_time["hidden"] = $request->open_time["hidden"];
        $open_time["text"] = $request->open_time["text"];
        $product->open_time = json_encode($open_time);

        $product->kw = $request->kw;
        $product->meta_des = $request->meta_des;

        $price = str_replace([',', ' ', ','], ['', '', '.'], $request->price);
        $product->price = $price;

        $discount_sale = str_replace([',', ' ', ','], ['', '', '.'], $request->discount_sale);
        $product->discount_sale = $discount_sale;

        $price_sale = str_replace([',', ' ', ','], ['', '', '.'], $request->price_sale);
        $product->price_sale = $price_sale;

        $product->unit = $request->unit;
        $product->brand_id = $request->brand_id;
        $product->material_id = $request->material_id;
        $product->type_sale = $request->type_sale;
        $product->gender = $request->gender;
        $product->hidden = $request->hidden;
        $product->weight = $request->weight;
        // $product->categories = $request->categories;

        // Chức năng này không có tác dụng chỉ lưu tạm
        // $imagesLogo = $request->file('images');
        // if($imagesLogo) {
        //     $dataImage = [];
        //     foreach($imagesLogo as $image) {
        //         $url_imgs["name"] = $image->name;
        //         $url_imgs["color"] = '0';
        //         $url_imgs["weight"] = '0';
        //         array_unshift($dataImage, $url_imgs);
        //     }
        // }
        $product->url_imgs = '';
        // Chức năng này không có tác dụng chỉ lưu tạm
        $product->type_color = $request->type_color;
        
        if($product->update()) {
            $imagesLogo = $request->file('images');
            if($imagesLogo) {
                foreach($imagesLogo as $image) {
                    $ProductImage = new ProductImage();
                    $ProductImage->product_id = $product->id;
                    $ProductImage->image = UploadImages::storeImageAs($image, Products::IMAGE);
                    $ProductImage->color_id = 0;
                    $ProductImage->weight = 0;
                    $ProductImage->save();
                }
            }
            
            $this->deleteProductCategories($product->id);

            foreach($request->categories as $itemCate) {
                $category = new ProductCategories();
                $category->ProductID = $product->id;
                $category->CategoryID = $itemCate;
                $category->type = 'product';
                $category->save();
            }
            $this->deleteProductPriceSale($product->id);
            if($request->prductPriceSale) {
                foreach ($request->prductPriceSale as $itemPriceSale) {
                    $price_sale_off = str_replace([',', ' ', ','], ['', '', '.'], $itemPriceSale['price']);
                    $priceSale = new ProductPriceSale();
                    $priceSale->id_category = $itemPriceSale['cate'];
                    $priceSale->id_Product = $product->id;
                    $priceSale->parent_category = $itemPriceSale['parent_cate'];
                    $priceSale->price = $price_sale_off;
                    $priceSale->save();
                }
            }
            return redirect()->route('products.getListProduct')
                                ->withSuccess("Cập Nhật Thành Công");
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }

    public function deleteProductPriceSale($idProduct) {
        $delete = new ProductPriceSale();
        $delete->select('*')->where('id_Product', $idProduct)->delete();
    }

    public function deleteProductCategories($idProduct) {
        $delete = new ProductCategories();
        $delete->select('*')->where('ProductID', $idProduct)->delete();
    }

    public function deleteProductImage($id) {
        $ProductImage = ProductImage::find($id);
        if($ProductImage) {
            $file_path = public_path('img/product/').$ProductImage->image;
            unlink($file_path);
            $ProductImage->delete();
            return redirect()->back()->with('success', 'Xóa '.$ProductImage->image.' thành công');
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }

    public function deleteProduct($id) {
        $product = Products::find($id);
        if($product) {
            $ProductImage = ProductImage::where('product_id', $id)->get();
            foreach($ProductImage as $itemImage) {
                $dele = ProductImage::find($itemImage->id);
                $fileImage = public_path('img/product/').$dele->image;
                unlink($fileImage);
                $dele->delete();
            }
            $product->delete();
            return redirect()->back()->with('success', 'Xóa '.$product->name.' thành công');
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }

    public function deletePriceSale(Request $request, $id) {
        $delete = ProductPriceSale::where('id', $id)->first();
        if($delete->delete()) {
            $response = [
                'status' => true,
            ];
            return response()->json($response);
        }
    }
}
