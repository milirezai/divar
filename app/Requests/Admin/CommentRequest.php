<?php

namespace App\Requests\Admin;

use System\Request\Request;

class CommentRequest extends Request
{
    public function rules()
    {
        return
            [
                'comment' => 'required|max:1000'
            ];
    }
}