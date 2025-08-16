<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\ClientInformation;
use App\Models\Products;
use App\Models\TatalBillDetail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHomeDashboard() {
        $clientInformation = ClientInformation::get();
        // dd($clientInformation);
        foreach($clientInformation as $item) {
            $item['bill'] = Bill::where('bill_id', $item->id)->get();
            foreach($item['bill'] as $itemBill) {
                $itemBill['listProduct'] = Products::where('id', $itemBill->product_id)->first();   
            }
            // $item['priceSaleOff'] = $item;  
            $item['tatalBill'] = TatalBillDetail::where('bill_id', $item->id)->first();  
        }
        // dd($clientInformation[0]->bill[1]->category_name);
        return view('admin.dashboard.index', compact('clientInformation'));
    }

    public function uploadImage(Request $request) {
        if($request->hasFile('upload')) {
            dd("dsjks");
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

    public function updateShipProduct(Request $request) {
        $id = $request->id;
        $clientInformation = ClientInformation::find($id);
        $clientInformation->ship = $request->ship;
        if($clientInformation->update()) {
            return response()->json(['msg' => 'Cập Nhật Thành Công', 'data' => $clientInformation]);
            // return redirect()->back()->with('success', 'Cập Nhật '.$clientInformation->name.' thành công');
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
        
    }

    public function deleteOrder($id) {
        $clientInformation = ClientInformation::find($id);
        if($clientInformation){
            $detailBills = Bill::where('bill_id', $clientInformation->id)->get();
            foreach($detailBills as $itemDetailBill) {
                Bill::find($itemDetailBill->bill_id)->delete();
            }
            $billTotalls = TatalBillDetail::where('bill_id', $clientInformation->id)->get();
            foreach($billTotalls as $itemTT) {
                TatalBillDetail::find($itemTT->id)->delete();
            }
            $clientInformation->delete();
            return redirect()->back()
                ->withSuccess(trans('auth.failed'));
            
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }
}
