<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Categories;
use App\Http\Controllers\AdminController;
use App\Requests\Admin\AdsRequest;

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
    public function create()
    {
        $categories = Categories::all();
        return view("admin.ads.create",compact('categories'));
    }
    public function gallery($id)
    {
        return view("admin.ads.gallery");
    }
    public function edit($id)
    {
        dd($id);
    }
    public function store()
    {
        $inputs = new AdsRequest;
        dd($inputs);
    }
    public function destroy($id)
    {
        dd($id);
//        Ads::delete($id);
//        return back();
    }
}