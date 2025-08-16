<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use App\Models\BrandImage;
use App\Models\Category;
use App\Models\ProductImage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBrand($alias = null) {
        $paramCategory = Category::getCategoryAlias($alias);
        $parentCategory = Category::getParent();

        if($alias) {
            $brand = Brand::getAllBrandByCategory($paramCategory->id);
        }else {
            $brand = Brand::getAllBrand();
        }
        // dd($brand);
        return view('frontend.pages.brands.brand',compact('parentCategory','brand', 'paramCategory'));
    }

    public function getDetailBrand($alias, $materialID = NULL) {
        $materialID = $materialID;
        $detailBrand = Brand::getDetailBrandByAlias($alias);
        if($detailBrand) {
            $detailBrand['listImageBrand'] = BrandImage::where('brand_id', $detailBrand->id)->get();
        }
        // $categories = Brand::getCategoryByBrandIDProduct($detailBrand->id);
        $material = Brand::getMarterialByBrandIDProduct($detailBrand->id);
        $materialId = [];
        foreach ($material as $key => $item) {
            $materialId[] = $item->prodID;
        }
        if($materialID) {
            $products = Brand::searchAllProductByMaterialID($materialID, $detailBrand->id, 12);
        }else {
            $products = Brand::getAllProductByMaterial($materialId, 12);
        }
        foreach($products as $product) {
            $product['listImage'] = ProductImage::getTwoImageCategoryProduct($product->id);
        }
        // dd($detailBrand);
        // $categories = Brand::getBrandByIDCategories();
        // $categories = Brand::getBrandByIDCategories($detailBrand['detail']['id'], 100);
        return view('frontend.pages.brands.brand-detail', compact('detailBrand', 'material', 'products','materialID'));
    }
}
