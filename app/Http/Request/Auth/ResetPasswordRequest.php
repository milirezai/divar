<?php
namespace App\Http\Request\Auth;

use System\Request\Request;

class ResetPasswordRequest extends Request
{
    public function rules()
    {
        return
            [
                'password' => 'required',
                'new_password' => 'required'
            ];
    }
}