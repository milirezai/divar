<?php
use System\Router\Web\Route;


    /*
    |--------------------------------------------------------------------------
    | Route post
    |--------------------------------------------------------------------------
    |
    |  
    |  
    |
    |--------------------------------------------------------------------------
    | Route get
    |--------------------------------------------------------------------------
    |
    |
    |
    |
    |--------------------------------------------------------------------------
    | Route put
    |--------------------------------------------------------------------------
    |
    |
    |
    |
    |--------------------------------------------------------------------------|
    | Route delete                               
    |--------------------------------------------------------------------------|
    |
    |
    |
    |
    */ 
    
Route::get('/','Home@index','index');

# admin routes
Route::get("/admin","AdminController@index","admin.index");

// category
Route::get("/admin/category","CategoryController@index","admin.category.index");
Route::get("/admin/category/create","CategoryController@create","admin.category.create");
Route::post("/admin/category/store","CategoryController@store","admin.category.store");
Route::get("/admin/category/edit/{id}","CategoryController@edit","admin.category.edit");
Route::put("/admin/category/update/{id}","CategoryController@update","admin.category.update");
Route::delete("/admin/category/delete/{id}","CategoryController@destroy","admin.category.delete");

// blog
Route::get("/admin/blog","PostController@index","admin.blog.index");
Route::get("admin/blog/create","PostController@create","admin.blog.create");
Route::post("/admin/blog/store","PostController@store","admin.blog.store");
Route::get("/admin/blog/edit/{id}","PostController@edit","admin.blog.edit");
Route::put("/admin/blog/update/{id}","PostController@update","admin.blog.update");
Route::delete("/admin/blog/delete/{id}","PostController@destroy","admin.blog.delete");

// ads
Route::get("/admin/ads","AdsController@index","admin.ads.index");
Route::get("/admin/ads/show/{id}","AdsController@show","admin.ads.show");
Route::get("/admin/ads/gallery/{id}","AdsController@gallery","admin.ads.gallery");
Route::get("/admin/ads/store-gallery-image/{id}","AdsController@storeGalleryImage","admin.ads.store.gallery.image");
Route::get("/admin/ads/delete-gallery-image/{gallery_id}","AdsController@deleteGalleryImage","admin.ads.delete.gallery.image");
Route::get("admin/ads/create","AdsController@create","admin.ads.create");
Route::post("/admin/ads/store","AdsController@store","admin.ads.store");
Route::get("/admin/ads/edit/{id}","AdsController@edit","admin.ads.edit");
Route::put("/admin/ads/update/{id}","AdsController@update","admin.ads.update");
Route::delete("/admin/ads/delete/{id}","AdsController@destroy","admin.ads.delete");


