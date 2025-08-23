<?php
namespace App\Http\Controllers\Auth;
use App\Http\Request\Auth\RegisterRequest;
use App\Http\Services\MailService;
use App\User;
class RegisterController
{
    private $redirectTo = '/login';

    public function show()
    {
        return view("auth.register");
    }
    public function register()
    {
        $request = new RegisterRequest();
        $inputs = $request->all();
        $file = $request->file('avatar');
        $path = 'imags/avatar/'.date('Y/M/d/');
        $avatar=date('Y_m_d_H_i_s_').rand(10,99);
        $inputs['avatar']= $request->move($file,$path,$avatar);
        $inputs['verify_token'] = generateToken();
        $inputs['is_active'] = 0;
        $inputs['user_type'] = 'user';
        $inputs['status'] = 0;
        $inputs['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        User::create($inputs);
        sendMail($inputs['email'], 'فعال سازی حساب کاربری', msgEmail($inputs['verify_token']));
        return redirect($this->redirectTo);
    }
    public function activation($token)
    {
        $user = User::where('verify_token', $token)->get();
        if (empty($user))
        {
            return redirect('/register');
        }
        $user = $user[0];
        $user->is_active = 1;
        $user->save();
        sleep(1);
        return redirect('/');
    }
}