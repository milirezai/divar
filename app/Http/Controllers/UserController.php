<?php
namespace App\Http\Controllers;
use System\Auth\Auth;

class UserController
{
    public function __construct()
    {
        Auth::check();
        if (Auth::check())
        {
            if (Auth::user()->user_type != 'user')
            {
                return redirect('/login');
            }
        }
        else
        {
            return redirect('/login');
        }
    }
    public function index()
    {
        dd('UserController#index');
    }
    public function showFormStoreAds()
    {
        dd('UserController@showFormStoreAds');
    }
}