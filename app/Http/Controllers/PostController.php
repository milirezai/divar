<?php
namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Post;
use App\Requests\Admin\PostRequest;
use App\Categories;
use System\Auth\Auth;
use App\Http\Services\Upload;

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
        $request = new PostRequest();
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $path = 'imags/posts/'.date('Y/M/d/');
        $name_image=date('Y_m_d_H_i_s_').rand(10,99);
        $inputs['image']=Upload::image($request->file('image'), $path, $name_image, 1080, 800);
        Post::create($inputs);
        return redirect("admin/blog");
    }
    public function edit($id)
    {
        $post=Post::find($id);
        $categories = Categories::all();
        return view("admin.blog.edit",compact("post","categories"));
    }
    public function update($id)
    {
        $request = new PostRequest();
        $inputs = $request->all();
        $inputs['id'] = $id;
        $file = $request->file('image');
        if (!empty($file['name']))
        {
            $path = 'imags/posts/'.date('Y/M/d/');
            $name_image=date('Y_m_d_H_i_s_').rand(10,99);
            $inputs['image']=Upload::image($file, $path, $name_image, 1080, 800);
        }
        $inputs['user_id'] = Auth::user()->id;
        Post::update($inputs);
        return redirect("admin/blog");
    }
    public function destroy($id)
    {
        Post::delete($id);
        return back();
    }
}