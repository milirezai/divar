<?php
namespace App\Http\Request\Auth;

use System\Request\Request;

class ForgotRequest extends Request
{
    public function rules()
    {
        return
            [
                'email' => "required|max:64|email|exists:users,email"
            ];
    }
}