<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use System\Auth\Auth;


use App\Category;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        Auth::loginById(1);
        Auth::check();
        if (Auth::user()->user_type != "admin")
        {
            return redirect("/login");
            exit();
        }
    }
    public function index()
    {
        // $all= User::all();
        // echo "<pre>";
        // dd($all);
        return view("admin.index");
    }
}