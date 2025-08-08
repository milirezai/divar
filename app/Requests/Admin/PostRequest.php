<?php

namespace App\Requests\Admin;

use System\Request\Request;

class PostRequest extends Request
{
    public function rules()
    {
        return
            [
//                'title' => 'required|max:300',
//                'published_at' => 'required',
//                'image' => 'required',
//                'body' => 'required',
//                'cat_id' => 'required'
            ];
    }
}