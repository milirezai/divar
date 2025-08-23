<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Request\Auth\LoginRequest;
use App\User;
use System\Auth\Auth;

class LoginController extends Controller
{
    private $redirectTo = '/';
    private $redirectToAdmin = '/admin';

    public function show()
    {
        return view('auth.login');
    }

    public function login()
    {
        Auth::logout();
        $request = new LoginRequest();
        if (Auth::loginByEmail($request->email,$request->password))
        {
           $user =  User::where('email',$request->email)->get();
           $user = $user[0];
            return $user->user_type == 'admin' ? redirect($this->redirectToAdmin) : redirect($this->redirectTo);
        }
        else
        {
            return back();
        }
    }
}