<?php

namespace App\Http\Controllers\Admin\Material;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListMaterial() {
        $material = Material::getMaterialAdmin();
        return view('admin.dashboard.material.list-material', compact('material'));
    }
    

    public function postAddMaterial(Request $request) {
        $material = new Material();
        $material->name = $request->name;
        $material->weight = $request->weight;
        if($material->save()) {
            return redirect()->route('material.getListMaterial')
            ->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }

    public function postUpdateMaterial(Request $request, $id) {
        $material = Material::find($id);
        $material->name = $request->name;
        $material->weight = $request->weight;
        if($material->update()) {
            return redirect()->route('material.getListMaterial')
            ->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function deleteMaterial($id) {
        $material = Material::find($id);
        if($material->delete()) {
            return redirect()->route('material.getListMaterial')
            ->withSuccess("Bạn Đã Xoá Thành Công");
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }
}
