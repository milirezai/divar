<?php

namespace App\Http\Request\Admin;

use System\Request\Request;

class CommentRequest extends Request
{
    protected function rules()
    {
        return
            [
                'comment' => 'required|max:1000'
            ];
    }
}