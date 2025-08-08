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


