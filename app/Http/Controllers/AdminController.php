<?php
namespace App\Http\Controllers;
use App\Http\Controllers;
use System\Auth\Auth;

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
        return view("admin.index");
    }
}