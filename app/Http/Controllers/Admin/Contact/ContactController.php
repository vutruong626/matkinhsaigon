<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListContact() {
        $contact = Contact::getListContactAdmin();
        return view('admin.dashboard.contact.list-contact', compact('contact'));
    }


    public function getCreateContact() {
        return view('admin.dashboard.contact.create-contact');
    }

    public function postCreateContact(Request $request) {
        $request->validate( [
            'name'      => 'required',
            'address'      => 'required',
            'phone'      => 'required',
            'strart_time'      => 'required',
            'end_time'      => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->strart_time = $request->strart_time;
        $contact->end_time = $request->end_time;
        $contact->weight = $request->weight;
        $contact->status = $request->status;
        if($contact->save()) {
            return redirect()->route('contact.getListContact')
                                ->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }

    public function getUpdateContact($id) {
        $contact = Contact::find($id);
        return view('admin.dashboard.contact.update-contact', compact('contact'));
    }


    public function postUpdateContact(Request $request, $id) {
        $request->validate( [
            'name'      => 'required',
            'address'      => 'required',
            'phone'      => 'required',
            'strart_time'      => 'required',
            'end_time'      => 'required',
        ]);
        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->strart_time = $request->strart_time;
        $contact->end_time = $request->end_time;
        $contact->weight = $request->weight;
        $contact->status = $request->status;
        if($contact->update()) {
            return redirect()->route('contact.getListContact')
                                ->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }


    public function deleteContact($id) {
        $contact = Contact::find($id);
        if($contact->delete()) {
            return redirect()->back()->withSuccess(trans('auth.failed'));
        }else {
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }
}
