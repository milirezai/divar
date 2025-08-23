<?php
namespace App\Http\Controllers\Auth;
use App\Http\Request\Auth\ForgotRequest;
use App\User;
use System\Session\Session;

class ForgotController
{
    private $redirectTo = '/login';

    public function show()
    {
        return view('auth.forgot');
    }
    public function forgot()
    {
        if (Session::get('forgot.time') != false and Session::get('forgot.time') > time())
        {
            error("forgot","Please wait a minute and then try again!");
            return back();
        }
        else
        {
            Session::set('forgot.time', time()+120);
            $request = new ForgotRequest();
            $inputs = $request->all();
            $user = User::where('email',$inputs['email'])->get();
            if (empty($user))
            {
                error("forgot","There is no user with this!");
                return back();
            }
            else
            {
                $user = $user[0];
                $user->remember_token = generateToken();
                $user->remember_token_expire = date('Y-m-d H:i:s',strtotime(' + 10 min'));
                $user->save();
                sendMail($inputs['email'], 'بازیابی رمز عبور', passwordRecoveryMsg($user->remember_token));
                flash('forgot','Email sent successfully!');
                return redirect($this->redirectTo);
            }
        }
    }
}