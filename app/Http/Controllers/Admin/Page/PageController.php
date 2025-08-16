<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\Utilities\UploadImages;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListPage() {
        $page = Page::getAllPageAdmin();
        return view('admin.dashboard.page.list-page', compact('page'));
    }

    public function getCreatePage() {
        return view('admin.dashboard.page.create-page');
    }

    public function postAddPage(Request $request) {
        $request->validate( [
            'name'      => 'required',
        ]);
        $imagesLogo = $request->file('image');
        if($imagesLogo) {
            $uploadLogo = UploadImages::storeImageAs($imagesLogo, Page::IMAGE);
        }

        $page = new Page();
        $page->name = $request->name;
        $page->content = $request->content;
        $page->link = $request->link;
        $page->image = $uploadLogo ?? NULL;
        $page->weight = $request->weight;
        $page->type = $request->type;
        $page->status = $request->status;
        if($page->save()) {
            return redirect()->route('page.getListPage')->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }

    public function getUpdatePage($id) {
        $page = Page::find($id);
        return view('admin.dashboard.page.update-page',compact('page'));
    }

    public function postUpdatePage(Request $request, $id) {
        $request->validate( [
            'name'      => 'required',
        ]);
        $page = Page::find($id);
        $file_path = public_path('img/page/').$page->image;
        $imagesLogo = $request->file('image');
        if($imagesLogo && $request != '') {
            unlink($file_path);
            $uploadLogo = UploadImages::storeImageAs($imagesLogo, Page::IMAGE);
        }
        $page->name = $request->name;
        $page->content = $request->content;
        $page->link = $request->link;
        $page->image = $uploadLogo ?? $page->image;
        $page->weight = $request->weight;
        $page->type = $request->type;
        $page->status = $request->status;
        if($page->update()) {
            return redirect()->route('page.getListPage')->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function deletePage($id) {
        $delete = Page::find($id);
        $file_path = public_path('img/page/').$delete->image;
        if($delete->delete()) {
            unlink($file_path);
            return redirect()->back()->with('success', 'Xóa '.$delete->name.' thành công');
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }
}
