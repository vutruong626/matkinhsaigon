<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\Utilities\UploadImages;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListSetting() {
        $setting = Setting::find(1);
        return view('admin.dashboard.setting.data-setting', compact('setting'));
    }

    public function postUpdateSetting(Request $request) {
        $request->validate( [
            'facebook'      => 'required',
            'youtube'      => 'required',
            'google_plus'      => 'required',
            'hotline'      => 'required',
            'zalo'      => 'required',
            'email'      => 'required',
            'meta_title'      => 'required',
            'meta_keyword'      => 'required',
            'meta_description'      => 'required',
            'google_analytic'      => 'required',
            'copyright'      => 'required',
            'legal_regulations'      => 'required',
            'facebook_fb'      => 'required',
            'map'      => 'required',
            // 'logo'      => 'required',
            'order_success'      => 'required',
            'work_time'      => 'required',
            'branch_address'      => 'required',
            'about'      => 'required',
            'address'      => 'required',
            'info'      => 'required',
        ]);
        $setting = Setting::find(1);
        $imagesLogo = $request->file('logo');
        $iconFB = $request->file('icon_fb');
        $iconYoutube = $request->file('icon_youtube');
        $iconZalo = $request->file('icon_zalo');
        $iconEmail = $request->file('icon_email');
        $iconTime = $request->file('icon_time');

        $file_path = public_path('img/setting/').$setting->logo;
        $file_path_fb = public_path('img/setting/').$setting->icon_fb;
        $file_path_youtube = public_path('img/setting/').$setting->icon_youtube;
        $file_path_zalo = public_path('img/setting/').$setting->icon_zalo;
        $file_path_email = public_path('img/setting/').$setting->icon_email;
        $file_path_time = public_path('img/setting/').$setting->icon_time;

        if($imagesLogo && $request != '') {
            unlink($file_path);
            $uploadLogo = UploadImages::storeImageAs($imagesLogo, Setting::IMAGE);
        }
        if($iconFB && $request != '') {
            unlink($file_path_fb);
            $uploadIconFB = UploadImages::storeImageAs($iconFB, Setting::IMAGE);
        }

        if($iconYoutube && $request != '') {
            unlink($file_path_youtube);
            $uploadIconYoutube = UploadImages::storeImageAs($iconYoutube, Setting::IMAGE);
        }

        if($iconZalo && $request != '') {
            unlink($file_path_zalo);
            $uploadIconZalo = UploadImages::storeImageAs($iconZalo, Setting::IMAGE);
        }

        if($iconEmail && $request != '') {
            unlink($file_path_email);
            $uploadIconEmail = UploadImages::storeImageAs($iconEmail, Setting::IMAGE);
        }

        if($iconTime && $request != '') {
            unlink($file_path_time);
            $uploadIconTime = UploadImages::storeImageAs($iconTime, Setting::IMAGE);
        }


        $setting->facebook = $request->facebook;
        $setting->youtube = $request->youtube;
        $setting->google_plus = $request->google_plus;
        $setting->hotline = $request->hotline;
        $setting->zalo = $request->zalo;
        $setting->email = $request->email;
        $setting->meta_title = $request->meta_title;
        $setting->meta_keyword = $request->meta_keyword;
        $setting->meta_description = $request->meta_description;
        $setting->google_analytic = $request->google_analytic;
        $setting->copyright = $request->copyright;
        $setting->legal_regulations = $request->legal_regulations;
        $setting->facebook_fb = $request->facebook_fb;
        $setting->map = $request->map;
        $setting->logo = $uploadLogo ?? $setting->logo;
        $setting->order_success = $request->order_success;
        $setting->work_time = $request->work_time;
        $setting->branch_address = $request->branch_address;
        $setting->about = $request->about;
        $setting->address = $request->address;
        $setting->info = $request->info;
        $setting->icon_fb = $uploadIconFB ?? $setting->icon_fb;
        $setting->icon_youtube = $uploadIconYoutube ?? $setting->icon_youtube;
        $setting->icon_zalo = $uploadIconZalo ?? $setting->icon_zalo;
        $setting->icon_email = $uploadIconEmail ?? $setting->icon_email;
        $setting->icon_time = $uploadIconTime ?? $setting->icon_time;
        
        if($setting->update()) {
            return redirect()->back()->withSuccess("Cập Nhật Thành Công!");
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }
}
