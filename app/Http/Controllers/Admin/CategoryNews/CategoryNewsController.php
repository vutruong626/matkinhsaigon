<?php

namespace App\Http\Controllers\Admin\CategoryNews;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\Utilities\UploadImages;
use Illuminate\Http\Request;

class CategoryNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListCategoryNews() {
        $parentID = 0;
        $parentCategories = Category::getAllCategoryParentIDNews($parentID);
        return view('admin.dashboard.category-news.list-category-news', compact('parentCategories'));
    }


    public function getCreateCategoryNews() {
        $parentID = 0;
        $parentCategories = Category::getAllCategoryParentIDNews($parentID);
        return view('admin.dashboard.category-news.create-category-news', compact('parentCategories'));
    }

    public function postAddCategoryNews(Request $request) {
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
        $category->type = 'new';
        $category->icon = $uploadImage;
        if($category->save()) {
            return redirect()->route('catagoryNews.getListCategoryNews')
            ->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function getUpdateCategoryNews($id) {
        $category = Category::findOrFail($id);
        $parentID = 0;
        $parentCategories = Category::getAllCategoryParentIDNews($parentID);
        return view('admin.dashboard.category-news.update-category-news', compact('category', 'parentCategories'));
    }

    public function postUpdateCategoryNews(Request $request, $id) {
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
        $category->type = 'new';
        $category->icon = $uploadImage ?? $category->icon;
        if($category->update()) {
            return redirect()->route('catagoryNews.getListCategoryNews')
            ->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function deleteCategoryNews($id) {
        $deleteCategory = Category::findOrFail($id);
        $file_path = public_path('img/color/').$deleteCategory->icon;
        if($deleteCategory) {
            unlink($file_path);
            $deleteCategory->delete();
            return redirect()->route('catagoryNews.getListCategoryNews')
            ->withSuccess("Xoá Thành Công");
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }
}
