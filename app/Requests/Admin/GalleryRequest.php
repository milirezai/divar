<?php

namespace App\Requests\Admin;

use System\Request\Request;

class GalleryRequest extends Request
{
    public function rules()
    {
        return
            [
                'image' => 'file|required|mimes:png,jpg,jpeg'
            ];
    }
}