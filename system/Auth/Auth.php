<?php

namespace System\Auth;

use App\User;
use System\Session\Session;

class Auth
{
    private $redirectTo= "/login";

    private function userMethod()
    {

        if (!Session::get("user"))
        {
            return redirect($this->redirectTo);
        }
        $user= User::find(Session::get("user"));
        if (empty($user))
        {
            Session::remove("user");
            return redirect($this->redirectTo);
        }
        else
        {
            return $user;
        }

    }

    private function checkMethod()
    {

        if (!Session::get("user"))
        {
            return redirect($this->redirectTo);
        }
        $user= User::find(Session::get("user"));
        if (empty($user))
        {
            Session::remove("user");
            return redirect($this->redirectTo);
        }
        else
        {
            return true;
        }

    }

    private function checkLoginMethod()
    {

        if (!Session::get("user"))
        {
            return false;
        }
        $user= User::find(Session::get("user"));
        if (empty($user))
        {
            return false;
        }
        else
        {
            return true;
        }

    }

    private function loginByEmailMethod($email, $password)
    {

        $user= User::where("email",$email)->get();
        if (empty($user))
        {
            error("login","There is no user with this email!");
            return false;
        }
        if (password_verify($password,$user[0]->password) and $user[0]->is_active == 1)
        {
            Session::set("user",$user[0]->id);
            return true;
        }
        else
        {
            error("login","The password is incorrect or the user is inactive!");
        }

    }

    private function loginByIdMethod($id)
    {
        $user= User::find($id);
        if (empty($user))
        {
            error("login","There is no user with this id!");
            return false;
        }
        else
        {
            Session::set("user",$user->id);
            return true;
        }
    }
    
    private function logoutMethod()
    {
        Session::remove("user");
    }

    public function __call($method, $args){
        return $this->methodCaller($method, $args);
    }

    public static function __callStatic($method, $args){
        $className = get_called_class();
        $instance = new $className();
        return $instance->methodCaller($method, $args);
    }

    private function methodCaller($method, $arguments)
    {
        $suffix = 'Method';
        $methodName = $method.$suffix;
        return call_user_func_array(array($this, $methodName), $arguments);
    }

}