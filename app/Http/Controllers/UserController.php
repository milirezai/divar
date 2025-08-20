<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Controllers\AdminController;
use App\User;

class UserController extends AdminController
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }
    public function active($id)
    {
        $user = User::find($id);
        $active = $user->is_active == 0 ? 1 : 0;
        User::update(['id' => $id , 'is_active' => $active]);
        return back();
    }
}