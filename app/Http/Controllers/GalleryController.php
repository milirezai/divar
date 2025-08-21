<?php
namespace App\Http\Controllers;

use App\Ads;
use App\Gallery;
use App\Http\Request\Admin\GalleryRequest;


class GalleryController extends AdminController
{
    public function gallery($id)
    {
        $ads = Ads::find($id);
        $galleries = Gallery::where('advertise_id',$id)->get();
        return view('admin.ads.gallery',compact('galleries','ads'));
    }
    public function storeGalleryImage($id)
    {
        $request = new GalleryRequest();
        $file = $request->file('image');
        $path = 'imags/ads/gallery/'.date('Y/M/d/');
        $name_image=date('Y_m_d_H_i_s_').rand(10,99);
        $inputs['image']= $request->move($file,$path,$name_image,350,400);
        $inputs['advertise_id'] = $id;
        Gallery::create($inputs);
        return back();
    }
    public function deleteGalleryImage($id)
    {
        Gallery::delete($id);
        return back();
    }
}