<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPartner() {
        $getPartner = Partner::getAllPartner();
        return view('frontend.pages.partner.partner', compact('getPartner'));
    }

    public function getDetailPartner($alias) {
        $getDetailPartner = Partner::getDetailPartner($alias);
        return view('frontend.pages.partner.partner-detail', compact('getDetailPartner'));
    }
}
