<?php

namespace App\Http\Controllers\Admin\Partner;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Partner;
use App\Services\Utilities\UploadImages;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListPartner() {
        $partner = Partner::getAllPartner();
        return view('admin.dashboard.partner.list-partner', compact('partner'));
    }


    public function getCreatePartner() {
        $area = Area::getAllCity(0);
        return view('admin.dashboard.partner.create-partner', compact('area'));
    }

    public function postAddPartner(request $request) {
        $request->validate( [
            'name'      => 'required',
            'email'      => 'required',
            'phone'      => 'required',
            'address'      => 'required',
        ]);
        $imagesLogo = $request->file('logo');
        if($imagesLogo) {
            $uploadLogo = UploadImages::storeImageAs($imagesLogo, Partner::IMAGE);
        }
        $partner = new Partner();
        $partner->name = $request->name;
        $partner->alias = $request->alias;
        $partner->email = $request->email;
        $partner->phone = $request->phone;
        $partner->weight = $request->weight;
        $partner->hidden = $request->hidden;
        $partner->city = $request->city;
        $partner->address = $request->address;
        $partner->content = $request->content;
        $partner->logo = $uploadLogo;
        if($partner->save()) {
            return redirect()->route('partner.getListPartner')
            ->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function getUpdatePartner($id) {
        $area = Area::getAllCity(0);
        $partner = Partner::find($id);
        return view('admin.dashboard.partner.update-partner', compact('area', 'partner'));
    }

    public function postUpdatePartner(Request $request, $id) {
        $request->validate( [
            'name'      => 'required',
            'email'      => 'required',
            'phone'      => 'required',
            'address'      => 'required',
        ]);
        $partner = Partner::find($id);
        $imagesLogo = $request->file('logo');
        $file_path = public_path('img/partner/').$partner->logo;
        if($imagesLogo && $request != '') {
            unlink($file_path);
            $uploadLogo = UploadImages::storeImageAs($imagesLogo, Partner::IMAGE);
        }
        
        $partner->name = $request->name;
        $partner->alias = $request->alias;
        $partner->email = $request->email;
        $partner->phone = $request->phone;
        $partner->weight = $request->weight;
        $partner->hidden = $request->hidden;
        $partner->city = $request->city;
        $partner->address = $request->address;
        $partner->content = $request->content;
        $partner->logo = $uploadLogo ?? $partner->logo;
        if($partner->update()) {
            return redirect()->route('partner.getListPartner')
            ->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }

    public function deletePartner($id){
        $partner = Partner::find($id);
        $file_path = public_path('img/partner/').$partner->logo;
        if($partner) {
            unlink($file_path);
            $partner->delete();
            return redirect()->back()->withSuccess("Bạn Đã Xoá Thành Công");
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }
}
