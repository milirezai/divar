<?php
use System\Router\Web\Route;

// home
Route::get('/','Home@index','index');
Route::get('/home','Home@index','index');
// home show-ads
Route::get("/advertise/show/{id}","Home@show","home.ads.show");
// home category-search
Route::get("/category/{id}","Home@category","home.ads.category");
// home status-search
Route::get("/status/{status_id}","Home@status","home.ads.status");
// home key-search
Route::post("/search-key","Home@search","home.ads.search");
// about
Route::get('/about','Home@about','home.about');


// user-panel
Route::get('/my_panel','UserController@index','user.panel');
Route::get('/my_panel/store-ads','UserController@showFormStoreAds','user.panel.showFormStoreAds');


// blog
Route::get('/blog','BlogController@index','blog.index');












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
Route::get("admin/ads/create","AdsController@create","admin.ads.create");
Route::post("/admin/ads/store","AdsController@store","admin.ads.store");
Route::get("/admin/ads/edit/{id}","AdsController@edit","admin.ads.edit");
Route::put("/admin/ads/update/{id}","AdsController@update","admin.ads.update");
Route::delete("/admin/ads/delete/{id}","AdsController@destroy","admin.ads.delete");

// gallery ads
Route::get("/admin/ads/gallery/{id}","GalleryController@gallery","admin.ads.gallery");
Route::post("/admin/ads/store-gallery-image/{id}","GalleryController@storeGalleryImage","admin.ads.store.gallery.image");
Route::get("/admin/ads/delete-gallery-image/{gallery_id}","GalleryController@deleteGalleryImage","admin.ads.delete.gallery.image");

// comment
Route::get("/admin/comments","CommentController@index","admin.comment.index");
Route::get("/admin/comments/show/{id}","CommentController@show","admin.comment.show");
Route::get("/admin/comments/approved/{id}","CommentController@approved","admin.comment.approved");
Route::post("/admin/comments/answer/{id}","CommentController@answer","admin.comment.answer");

// users
Route::get("/admin/users","UserController@index","admin.users.index");
Route::get("/admin/users/status/{id}","UserController@status","admin.users.status");

// auth
Route::get("/register","auth\RegisterController@show","auth.register.show");
Route::post("/register","auth\RegisterController@register","auth.register");
Route::get("/activation/{token}","auth\RegisterController@activation","auth.activation");
Route::get("/login","auth\LoginController@show","auth.login.show");
Route::post("/login","auth\LoginController@login","auth.login");
Route::get("/forgot","auth\ForgotController@show","auth.forgot.show");
Route::post("/forgot","auth\ForgotController@forgot","auth.forgot");
Route::get("/reset-password/{token}","auth\ResetPasswordController@show","auth.reset-password.show");
Route::post("/reset-password/{token}","auth\ResetPasswordController@resetPassword","auth.reset-password");
Route::get("/logout","auth\LogoutController@logout","auth.logout");
