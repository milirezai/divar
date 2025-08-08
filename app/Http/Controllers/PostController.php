<?php
namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Requests\Admin\PostRequest;
use App\Categories;
use App\Post;

class PostController extends AdminController
{
    public function index()
    {
        $posts= Post::all();
        return view("admin.blog.index",compact('posts'));
    }
    public function create()
    {
        $categories = Categories::all();
        return view("admin.blog.create",compact('categories'));
    }
    public function store()
    {
        $request= new PostRequest();
        $input = $request->all();
        dd($input);
    }
    public function edit($id)
    {
        $findPost=Post::find($id);
        $categories = Categories::all();
        return view("admin.blog.edit",compact("findPost","categories"));
    }
    public function update()
    {
        dd('update');
    }
    public function destroy($id)
    {
        Post::delete($id);
        return back();
    }
}