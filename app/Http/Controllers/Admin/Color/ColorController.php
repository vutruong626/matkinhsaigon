<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Services\Utilities\UploadImages;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListColor() {
        $color = Color::getAllColorAdmin();
        return view('admin.dashboard.color.list-color', compact('color'));
    }


    public function getCreateColor() {
        return view('admin.dashboard.color.create-color');
    }

    public function postAddColor(Request $request) {
        $request->validate( [
            'name'      => 'required',
        ]);
        $imagesLogo = $request->file('url_img');
        if($imagesLogo) {
            $uploadLogo = UploadImages::storeImageAs($imagesLogo, Color::IMAGE);
        }
        $color = new Color();
        $color->name = $request->name;
        $color->weight = $request->weight;
        $color->url_img = $uploadLogo;
        if($color->save()) {
            return redirect()->route('color.getListColor')
                                ->withSuccess("Cập Nhật Thành Công");
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function getUpdateColor($id) {
        $color = Color::find($id);
        return view('admin.dashboard.color.update-color', compact('color'));
    }


    public function postUpdateColor(Request $request, $id) {
        $request->validate( [
            'name'      => 'required',
        ]);
        $color = Color::find($id);
        $imagesLogo = $request->file('url_img');
        $file_path = public_path('img/color/').$color->url_img;
        if($imagesLogo && $request != '') {
            unlink($file_path);
            $uploadLogo = UploadImages::storeImageAs($imagesLogo, Color::IMAGE);
        }
        $color->name = $request->name;
        $color->weight = $request->weight;
        $color->url_img = $uploadLogo ?? $color->url_img;
        if($color->update()) {
            return redirect()->route('color.getListColor')
                                ->withSuccess("Cập Nhật Thành Công");
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }

    public function deleteColor($id) {
        $color = Color::find($id);
        $file_path = public_path('img/color/').$color->url_img;
        if($color) {
            unlink($file_path);
            $color->delete();
            return redirect()->route('color.getListColor')
                                ->withSuccess("Cập Nhật Thành Công");
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }
}
