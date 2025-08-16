<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Categories;
use App\Http\Controllers\AdminController;
use App\Http\Services\Upload;
use App\Requests\Admin\AdsRequest;
use System\Auth\Auth;

class AdsController extends AdminController
{
    public function index()
    {
        $ads_s = Ads::all();
        return view("admin.ads.index",compact('ads_s'));
    }
    public function create()
    {
        $categories = Categories::all();
        return view("admin.ads.create",compact('categories'));
    }
    public function edit($id)
    {
        $ads = Ads::find($id);
        $categories = Categories::all();
        return view("admin.ads.edit",compact('ads','categories'));
    }
    public function store()
    {
        $request = new AdsRequest();
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $path = 'imags/ads/'.date('Y/M/d/');
        $name_image=date('Y_m_d_H_i_s_').rand(10,99);
        $inputs['image']=Upload::image($request->file('image'), $path, $name_image, 1080, 800);
        Ads::create($inputs);
        return redirect('/admin/ads');
    }
    public function update($id)
    {
        $request = new AdsRequest();
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $file = $request->file('image');
        if (!empty($file['name']))
        {
            $path = 'imags/ads/'.date('Y/M/d/');
            $name_image=date('Y_m_d_H_i_s_').rand(10,99);
            $inputs['image']=Upload::image($request->file('image'), $path, $name_image, 1080, 800);

        }
        $inputs['id'] = $id;
        Ads::update($inputs);
        return redirect('/admin/ads');
    }
    public function destroy($id)
    {
        Ads::delete($id);
        return back();
    }
    public function storeGalleryImage($id)
    {
    }
    public function gallery($id)
    {
        return view("admin.ads.gallery");
    }
}