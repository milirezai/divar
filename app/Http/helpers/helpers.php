<?php

use Morilog\Jalali\Jalalian;
    /*
    |--------------------------------------------------------------------------
    |  Helper functions
    |--------------------------------------------------------------------------
    |
    | Helper functions are defined here
    | They are available program-wide
    | Contact them at your preferred location.
    |
    */


function active_sidebar($url, $contain = true)
{
    if ($contain)
        return ( strpos(currentUrl(), $url) == 0) ? "active" : '';
    else
        return currentUrl() === $url? "active" : '';
}
function errorClass($name)
{
    return erororExists($name) ? 'is-invalid' : '';
}

function errorText($name)
{
    return erororExists($name) ? '<div><small class="text-danger">' .error($name) . '</small></div>' : '';
}

function olrOrValue($name,$value)
{
    return empty(old($name)) ? $value : old($name) ;
}

function sendMail($email, $subject, $msg)
{
    $mailservice = new App\Http\Services\MailService();
    $mailservice->send($email, $subject, $msg);
}

function activationEmailMessage($token)
{
    $msg =
        '
        <h2>divar</h2>
       <p>کاربر گرامی ثبت  نام شما با موفقیت انجام  شد برای فعال سازی حساب کاربری خود روی لینک زیر کلیک کنید</p>
       <p style="text-align: center">
       <a href="'.route('auth.activation', [$token]).'">فعال سازی حساب کاربری</a>
       </p>
       ';
    return $msg;
}

function passwordRecoveryMsg($token)
{
    $msg =
        '
        <h2>divar</h2>
       <p>کاربر گرامی  برای تغییر رمز عبور حساب کاربری خود روی لینک زیر کلیک کنید</p>
       <p style="text-align: center">
       <a href="'.route('auth.reset-password.show', [$token]).'">بازیابی رمز عبور</a>
       </p>
       ';
    return $msg;
}

function solarDate($date)
{
    $date = Jalalian::now();
    $date = Jalalian::forge($date)->format('date');
    return $date;
}
