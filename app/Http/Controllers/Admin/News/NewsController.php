<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsCategories;
use App\Services\Utilities\UploadImages;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListNews() {
        $news = News::getAllNewsAdmin();
        return view('admin.dashboard.news.list-news', compact('news'));
    }

    public function getCreateNews() {
        $parentID = 0;
        $categories = Category::where('parent_id',$parentID)->where('type', 'new')->get();
        return view('admin.dashboard.news.create-news', compact('categories'));
    }

    public function postAddNews(Request $request) {
        $request->validate( [
            'name'      => 'required',
            'kw'      => 'required',
            'meta_description'      => 'required',
        ]);
        $images = $request->file('url_img');
        if($images) {
            $uploadImage = UploadImages::storeImageAs($images, News::IMAGE);
        }
        $news = new News();
        $news->name = $request->name;
        $news->alias = $request->alias;
        $news->description = $request->description;
        $news->content = $request->content;
        $news->kw = $request->kw;
        $news->meta_description = $request->meta_description;
        $news->hidden = $request->hidden;
        $news->weight = $request->weight;
        $news->views = 0;
        $news->cat_id = '';
        $news->url_img = $uploadImage;
        if($news->save()) {
            foreach($request->categories as $item) {
                $newsCategory = new NewsCategories();
                $newsCategory->newsID = $news->id;
                $newsCategory->categoryID = $item;
                $newsCategory->type = 'new';
                $newsCategory->save();
            }
            return redirect()->route('news.getListNews')
            ->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function getUpdateNews($id) {
        $news = News::find($id);
        $parentID = 0;
        $categories = Category::where('parent_id',$parentID)->where('type', 'new')->get();
        $categoriesList = $news->categoriesNewsByID();
        // dd($categoriesList);
        return view('admin.dashboard.news.update-news', compact('categories', 'news', 'categoriesList'));
    }

    public function postUpdateNews(Request $request, $id) {
        // dd($request->all());
        $request->validate( [
            'name'      => 'required',
            'kw'      => 'required',
            'meta_description'      => 'required',
        ]);
        $news = News::find($id);
        $images = $request->file('url_img');
        $file_path = public_path('img/news/').$news->url_img;
        if($images && $request != '') {
            unlink($file_path);
            $uploadImage = UploadImages::storeImageAs($images, News::IMAGE);
        }
        
        $news->name = $request->name;
        $news->alias = $request->alias;
        $news->description = $request->description;
        $news->content = $request->content;
        $news->kw = $request->kw;
        $news->meta_description = $request->meta_description;
        $news->hidden = $request->hidden;
        $news->weight = $request->weight;
        $news->views = 0;
        $news->cat_id = '';
        $news->url_img = $uploadImage ?? $news->url_img;
        if($news->update()) {
            // $dataNewsCate = NewsCategories::where('newsID', $news->id)->get();
            // foreach($dataNewsCate as $itemDelete) {
            //     $delete = NewsCategories::find($itemDelete->id);
            //     $delete->delete();
            // }
            $this->deleteAllTypeByNewsID($news->id);
            if($request->categories) {
                foreach($request->categories as $item) {
                    $newsCategory = new NewsCategories();
                    $newsCategory->newsID = $news->id;
                    $newsCategory->categoryID = $item;
                    $newsCategory->type = 'new';
                    $newsCategory->save();
                }
            }
            return redirect()->route('news.getListNews')
            ->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }

    public function deleteAllTypeByNewsID($newsID) {
        $deleteTypeNews = new NewsCategories();
        $deleteTypeNews->select('*')->where('newsID', $newsID)->delete();
    }


    public function deleteNews($id) {
        $news = News::find($id);
        $file_path = public_path('img/news/').$news->url_img;
        if($news) {
            $categories = NewsCategories::where('newsID', $news->id)->get();
            foreach($categories as $itemCate) {
                NewsCategories::find($itemCate->id)->delete();
            }
            unlink($file_path);
            if($news->delete()) {
                return redirect()->back()->withSuccess("Xoá Thành Công");
            }else {
                return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
            }
        }
    }
}
