<?php

namespace App\Http\Request\Admin;

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