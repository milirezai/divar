<?php
namespace App\Http\Controllers;
use App\Categories;
use App\Http\Controllers\AdminController;

class CategoryController extends  AdminController
{
    
    public function index()
    {
        $categories= Categories::all();
        return view("admin.category.index",compact('categories'));
    }
    public function create()
    {
        return view("admin.category.create");
    }

    public function edit($id){
        echo "edit";
    }
    public function destroy($id){
 }

}