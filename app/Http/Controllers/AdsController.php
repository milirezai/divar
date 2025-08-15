<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Http\Controllers\AdminController;

class AdsController extends AdminController
{
    public function index()
    {
        $ads_s = Ads::all();
        return view("admin.ads.index",compact('ads_s'));
    }
    public function show($id)
    {
        $ads = Ads::find($id);
        return view("admin.ads.show",compact('ads'));
    }
}