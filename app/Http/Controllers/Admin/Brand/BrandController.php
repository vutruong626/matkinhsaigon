<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandImage;
use Illuminate\Http\Request;
use App\Services\Utilities\UploadImages;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListBrand() {
        $brand = Brand::getAllBrandAdmin();
        return view('admin.dashboard.brand.list-brand', compact('brand'));
    }

    public function getCreateBrand() {
        return view('admin.dashboard.brand.create-brand');
    }


    public function postAddBrand(Request $request) {
        $request->validate( [
            'name'      => 'required',
        ]);
        $imagesLogo = $request->file('logo');
        if($imagesLogo) {
            $uploadLogo = UploadImages::storeImageAs($imagesLogo, Brand::IMAGE);
        }
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->alias = $request->alias;
        $brand->content = $request->content;
        $brand->weight = $request->weight;
        $brand->hidden = $request->hidden;
        $brand->logo = $uploadLogo;
        $brand->url_imgs = NULL;
        if($brand->save()) {
            $images = $request->file('url_imgs');
            foreach($images as $itemImage) {
                $brandImage = new BrandImage();
                $brandImage->brand_id = $brand->id;
                $brandImage->images = UploadImages::storeImageAs($itemImage, Brand::IMAGE);
                $brandImage->save();
            }
            return redirect()->route('brand.getListBrand')
                                ->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function getUpdateBrand($id) {
        $getBrand = Brand::findOrFail($id);
        $brandImage = BrandImage::getBrandImageByID($getBrand->id);
        // dd($brandImage);
        return view('admin.dashboard.brand.update-brand', compact('getBrand', 'brandImage'));
    }


    public function postUpdateBrand(Request $request, $id) {
        $request->validate( [
            'name'      => 'required',
        ]);
        $brand = Brand::find($id);
        $imagesLogo = $request->file('logo');
        $file_path = public_path('img/brand/').$brand->logo;
        if($imagesLogo && $request != '') {
            unlink($file_path);
            $uploadLogo = UploadImages::storeImageAs($imagesLogo, Brand::IMAGE);
        }
        
        $brand->name = $request->name;
        $brand->alias = $request->alias;
        $brand->content = $request->content;
        $brand->weight = $request->weight;
        $brand->hidden = $request->hidden;
        $brand->logo = $uploadLogo ?? $brand->logo;
        $brand->url_imgs = NULL;
        if($brand->update()) {
            $images = $request->file('url_imgs');
            if($images) {
                foreach($images as $itemImage) {
                    $brandImage = new BrandImage();
                    $brandImage->brand_id = $brand->id;
                    $brandImage->images = UploadImages::storeImageAs($itemImage, Brand::IMAGE);
                    $brandImage->save();
                }
            }
            return redirect()->route('brand.getListBrand')
                                ->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function deleteBrand($id) {
        $brand = Brand::find($id);
        $brandImage = BrandImage::getBrandImageByID($brand->id);
        if($brandImage) {
            foreach($brandImage as $item) {
                $file_path = public_path('img/brand/').$item->images;
                unlink($file_path);
                $delete = BrandImage::find($item->id);
                $delete->delete();
            }
        }
        if($brand->delete()) {
            return redirect()->back()->with('success', 'Xóa '.$delete->name.' thành công');
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
        
    }

    public function deleteBrandImage($id) {
        
        $deleteImage = BrandImage::where('id', $id)->get();
        foreach($deleteImage as $item) {
            $file_path = public_path('img/brand/').$item->images;
            unlink($file_path);
            $delete = BrandImage::find($item->id);
            if($delete->delete()) {
                return redirect()->back()->with('success', 'Xóa '.$delete->images.' thành công');
            }
        }
    }
}
