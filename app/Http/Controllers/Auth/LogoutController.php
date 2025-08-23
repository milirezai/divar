<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use System\Auth\Auth;

class LogoutController
{
    private $redirectTo = '/login';
    public function logout()
    {
        Auth::logout();
        return redirect($this->redirectTo);
    }
}