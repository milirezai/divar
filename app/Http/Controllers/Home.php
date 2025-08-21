<?php
namespace App\Http\Controllers;
use App\Ads;
use App\Categories;
use App\Http\Request\SearchRequest;


class Home extends Controller
{
       
    public function index()
    {
        $ads = Ads::all();
        $categories = Categories::all();
        return view("app.index",compact('ads','categories'));
    }

    public function show($id)
    {
        $advertise = Ads::find($id);
        return view("app.advertise.show",compact('advertise'));
    }
    public function category($id)
    {
        $ads = Ads::where('cat_id',$id)->get();
        $categories = Categories::all();
        return view("app.index",compact('ads','categories'));
    }
    public function status($status_id)
    {
        $ads = Ads::where('sell_status',$status_id)->get();
        $categories = Categories::all();
        return view("app.index",compact('ads','categories'));
    }
    public function search()
    {
        $request = new SearchRequest();
        $ke = $request->all()['search'];
        $ads = Ads::where('title',$ke)->get();
        $categories = Categories::all();
        return view("app.index",compact('ads','categories'));
    }
}