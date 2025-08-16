<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Services\Utilities\UploadImages;
use Illuminate\Http\Request;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListSlider() {
        $listSlider = Slider::getSliderAdmin();
        return view('admin.dashboard.slider.list-slider', compact('listSlider'));
    }


    public function getCreateSlider() {
        return view('admin.dashboard.slider.create-slider');
    }
    public function postAddSlider(Request $request) {
        $request->validate( [
            'name'      => 'required',
        ]);
        $images = $request->file('url_img');
        if($images) {
            $uploadImage = UploadImages::storeImageAs($images, Slider::IMAGE);
        }

        $slider = new Slider();
        $slider->name = $request->name;
        $slider->alias = $request->alias;
        $slider->content = $request->content;
        $slider->weight = $request->weight;
        $slider->hidden = $request->hidden;
        $slider->hidden = $request->hidden;
        $slider->url_img = $uploadImage;
        if($slider->save()) {
            return redirect()->route('slider.getListSlider')
            ->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function getUpdateSlider(Request $request, $id) {
        $dataSlider = Slider::find($id);
        return view('admin.dashboard.slider.update-slider', compact('dataSlider'));
    }


    public function postUpdateSlider(Request $request, $id) {
        $request->validate( [
            'name'      => 'required',
        ]);
        $slider = Slider::find($id);
        $images = $request->file('url_img');
        $file_path = public_path('img/slider/').$slider->url_img;
        if($images && $request != '') {
            unlink($file_path);
            $uploadImage = UploadImages::storeImageAs($images, Slider::IMAGE);
        }
        $slider->name = $request->name;
        $slider->alias = $request->alias;
        $slider->content = $request->content;
        $slider->weight = $request->weight;
        $slider->hidden = $request->hidden;
        $slider->hidden = $request->hidden;
        $slider->url_img = $uploadImage ?? $slider->url_img;
        if($slider->update()) {
            return redirect()->route('slider.getListSlider')
            ->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function deleteSlider($id) {
        $deleteSlider = Slider::find($id);
        $file_path = public_path('img/slider/').$deleteSlider->url_img;
        if($deleteSlider) {
            unlink($file_path);
            $deleteSlider->delete();
            return redirect()->route('slider.getListSlider')
            ->withSuccess("Xoá Thành Công");
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }
}
