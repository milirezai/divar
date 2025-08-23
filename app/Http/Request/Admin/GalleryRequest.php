<?php

namespace App\Http\Request\Admin;

use System\Request\Request;

class GalleryRequest extends Request
{
    protected function rules()
    {
        return
            [
                'image' => 'file|required|mimes:png,jpg,jpeg'
            ];
    }
}