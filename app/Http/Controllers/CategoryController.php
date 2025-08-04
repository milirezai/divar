<?php
namespace App\Http\Controllers;
use App\Categories;
use App\Http\Controllers\AdminController;
use App\Requests\Admin\CategoryRequest;

class CategoryController extends  AdminController
{
    
    public function index()
    {
        $categories= Categories::all();
        return view("admin.category.index",compact('categories'));
    }
    public function create()
    {
        $parentCategory=Categories::whereNull("parent_id")->get();
        return view("admin.category.create",compact('parentCategory'));
    }

    public function edit($id){
        echo "edit";
    }
    public function destroy($id){
 }

 public function store()
 {
     $request = new CategoryRequest();
     $input=$request->all();
     if (empty($request->parent_id))
         unset($input['parent_id']);
     Categories::create($input);
     return redirect("/admin/category");
 }
}