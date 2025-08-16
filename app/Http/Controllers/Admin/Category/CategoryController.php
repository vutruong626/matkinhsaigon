<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FeaturedCategory;
use Illuminate\Http\Request;
use App\Services\Utilities\UploadImages;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListCategory() {
        $parentID = 0;
        $parentCategories = Category::getAllCategoryParentID($parentID);
        return view('admin.dashboard.category-product.list-category', compact('parentCategories'));
    }


    public function getCreateCategory() {
        $parentID = 0;
        $parentCategories = Category::getAllCategoryParentID($parentID);
        return view('admin.dashboard.category-product.create-category', compact('parentCategories'));
    }

    public function postAddCategory(Request $request) {
        $request->validate( [
            'name'      => 'required',
            'kw'      => 'required',
        ]);
        $images = $request->file('icon');
        if($images) {
            $uploadImage = UploadImages::storeImageAs($images, Category::IMAGE);
        }
        $category = new Category();
        $category->name = $request->name;
        $category->alias = $request->alias;
        $category->kw = $request->kw;
        $category->des = $request->des;
        $category->weight = $request->weight;
        $category->parent_id = $request->parent_id;
        $category->show_icon = $request->show_icon;
        $category->index_hidden = $request->index_hidden;
        $category->hidden = $request->hidden;
        $category->type = 'product';
        $category->icon = $uploadImage ?? null;
        if($category->save()) {
            return redirect()->route('category.getListCategory')
            ->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function getUpdateCategory($id) {
        $category = Category::findOrFail($id);
        $parentID = 0;
        $parentCategories = Category::getAllCategoryParentID($parentID);
        return view('admin.dashboard.category-product.update-category', compact('category', 'parentCategories'));
    }


    public function postUpdateCategory(Request $request, $id) {
        $request->validate( [
            'name'      => 'required',
            'kw'      => 'required',
        ]);
        $category = Category::findOrFail($id);
        $images = $request->file('icon');
        $file_path = public_path('img/color/').$category->icon;
        if($images && $request != '') {
            unlink($file_path);
            $uploadImage = UploadImages::storeImageAs($images, Category::IMAGE);
        }
        $category->name = $request->name;
        $category->alias = $request->alias;
        $category->kw = $request->kw;
        $category->des = $request->des;
        $category->weight = $request->weight;
        $category->parent_id = $request->parent_id;
        $category->show_icon = $request->show_icon;
        $category->index_hidden = $request->index_hidden;
        $category->hidden = $request->hidden;
        $category->type = 'product';
        $category->icon = $uploadImage ?? $category->icon;
        if($category->update()) {
            return redirect()->route('category.getListCategory')
            ->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function deleteCategory($id) {
        $deleteCategory = Category::findOrFail($id);
        $file_path = $deleteCategory->icon ? public_path('img/color/').$deleteCategory->icon : null;
        if($deleteCategory) {
            if($file_path) {
                unlink($file_path);
            }
            $deleteCategory->delete();
            return redirect()->route('category.getListCategory')
            ->withSuccess("Xoá Thành Công");
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function getListFeaturedCategory() {
        $result = FeaturedCategory::get();
        return view('admin.dashboard.featured-category.featured-category', compact('result'));
    }

    public function getCreateFeaturedCategory() {
        return view('admin.dashboard.featured-category.create-featured-category');
    }

    public function postCraeteFeaturedCategory(Request $request) {
        $request->validate( [
            'name'      => 'required',
            'link'      => 'required',
            'color'      => 'required',
        ]);

        $images = $request->file('image');
        if($images) {
            $uploadImage = UploadImages::storeImageAs($images, FeaturedCategory::IMAGE);
        }
        $data = new FeaturedCategory();
        $data->name = $request->name;
        $data->link = $request->link;
        $data->color = $request->color;
        $data->status = $request->status;
        $data->weight = $request->weight;
        $data->image = $uploadImage;
        if($data->save()) {
            return redirect()->route('category.getListFeaturedCategory')
            ->withSuccess("Cập Nhật Thành Công");
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }

    public function getUpdateFeaturedCategory($id) {
        $result = FeaturedCategory::find($id);
        return view('admin.dashboard.featured-category.update-featured-category', compact('result'));
    }

    public function postUpdateFeaturedCategory(Request $request, $id) {
        $request->validate( [
            'name'      => 'required',
            'link'      => 'required',
            'color'      => 'required',
        ]);
        $data = FeaturedCategory::find($id);
        $images = $request->file('image');
        $file_path = public_path('img/featured-category/').$data->image;
        if($images && $request != '') {
            unlink($file_path);
            $uploadImage = UploadImages::storeImageAs($images, FeaturedCategory::IMAGE);
        }
        $data->name = $request->name;
        $data->link = $request->link;
        $data->color = $request->color;
        $data->status = $request->status;
        $data->weight = $request->weight;
        $data->image = $uploadImage ?? $data->image;
        if($data->update()) {
            return redirect()->route('category.getListFeaturedCategory')
            ->withSuccess("Cập Nhật Thành Công");
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function deleteFeaturedCategory($id) {
        $data = FeaturedCategory::find($id);
        $file_path = public_path('img/featured-category/').$data->image;
        if($data) {
            unlink($file_path);
            $data->delete();
            return redirect()->back()->withSuccess("Cập Nhật Thành Công");
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }

    public function getCategoryPriceSale(Request $request) {
        $parentID = 0;
        $parentCategories = Category::getAllCategoryParentID($parentID);
        $response = [
            'status' => true,
            // 'html' => $html
            'data' => $parentCategories
        ];
        return response()->json($response);
    }
}
