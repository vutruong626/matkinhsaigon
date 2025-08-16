<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\FeaturedCategory;
use App\Models\Page;
use App\Models\ProductCategories;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Products;
use App\Models\News;
use App\Models\Brand;
use App\Models\ProductImage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limitNews = 10;
        $slider = Slider::getSliderWeb();
        $categoriesProduct = Category::getAllParentCategoryByID();
        foreach($categoriesProduct as $item) {
            $product = Products::getAllProductByParentID($item->id);
            foreach($product as $itemproduct) {
                $itemproduct['listImage'] = ProductImage::getTwoImageCategoryProduct($itemproduct->id);
                // dd($itemproduct['listImage']);
            }
            $item->listProduct = $product;
        }
        // $images = json_decode($categoriesProduct[0]->listProduct[0]->url_imgs);
        // dd($categoriesProduct);
        $news = News::getNewsPageHome($limitNews);
        $brand = Brand::getAllBrandHome();
        $featuredCategory = FeaturedCategory::where('status', 1)->orderBy('weight', 'asc')->get();
        // dd($categoriesProduct);
        return view('frontend.pages.home.index', compact('slider', 'categoriesProduct', 'news', 'brand', 'featuredCategory'));
    }

    public function searchProduct(Request $request) {
        $keyword = $request->keyword;
        $limit = 12;
        $products = Products::searchProduct($keyword, $limit);
        foreach($products as $product) {
            $product['category'] = ProductCategories::getCategoryByIDProduct($product->id);
            $product['listImage'] = ProductImage::getTwoImageCategoryProduct($product->id);
        }
        // dd($products);
        return view('frontend.pages.search.search', compact('products'));
    }


    public function getContact() {
        $contact = Contact::getContact();
        return view('frontend.pages.contact.contact', compact('contact'));
    }


    public function getPage($link) {
        $result = Page::getDetailPage($link);
        return view('frontend.pages.page.detail-page', compact('result'));
    }
}
