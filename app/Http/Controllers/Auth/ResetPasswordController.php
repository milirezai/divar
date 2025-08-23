<?php
namespace App\Http\Controllers\Auth;

use App\Http\Request\Auth\ResetPasswordRequest;
use App\User;

class ResetPasswordController
{
    private $redirectTo = '/login';

    public function show($token)
    {
        $user = User::where('remember_token', $token)->get();
        if (empty($user))
        {
            return redirect('/forgot');
        }
        elseif ($user->remember_token_expire >= date('Y-m-d H:i:s'))
        {
            return redirect('/forgot');
        }
        $user = $user[0];
        return view('auth.reset-password',compact('token'));
    }

    public function resetPassword($token)
    {
        $request = new ResetPasswordRequest();
        $inputs = $request->all();
        $user = User::where('remember_token', $token)->get();
        if (empty($user))
        {
            error("reset-password","There is no user with this!");
            return back();
        }
        if ($inputs['password'] != $inputs['new_password'])
        {
            error("reset-password","The entered passwords do not match!");
            return back();
        }
        $user = $user[0];
        $user->password = md5($inputs['password']);
        $user->save();
        return redirect($this->redirectTo);
    }
}