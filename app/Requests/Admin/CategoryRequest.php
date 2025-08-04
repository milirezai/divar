<?php

namespace App\Requests\Admin;
use System\Request\Request;

class CategoryRequest extends Request
{
    public function rules()
    {
        return
            [
                'name' => 'required|max:210',
                'parent_id' => 'exists:categories,id'
            ];
    }
}