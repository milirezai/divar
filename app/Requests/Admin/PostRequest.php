<?php

namespace App\Requests\Admin;

use System\Request\Request;

class PostRequest extends Request
{
    public function rules()
    {
        if (methodField() == 'put')
        {
            return
                [
                    'title' => 'min:10|max:300',
                    'image' => 'file|mimes:png,jpg,jpeg',
                    'published_at' => 'date',
                    'body' => 'min:50',
                    'cat_id' => 'exists:categories,id',
                ];
        }
        else
        {
            return
                [
                    'title' => 'required|min:10|max:300',
                    'image' => 'file|required|mimes:png,jpg,jpeg',
                    'published_at' => 'required|date',
                    'body' => 'required|min:50',
                    'cat_id' => 'required|exists:categories,id',
                ];
        }
    }
}