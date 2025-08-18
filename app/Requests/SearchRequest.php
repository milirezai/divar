<?php

namespace App\Requests;

use System\Request\Request;

class SearchRequest extends Request
{
    public function rules()
    {
        return
            [
                'search' => 'required'
            ];
    }
}