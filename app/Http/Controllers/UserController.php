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
    public function status($id)
    {
        $user = User::find($id);
        $status = $user->is_active == 0 ? 1 : 0;
        $user->is_active = $status;
        $user->save();
        return back();
    }
}