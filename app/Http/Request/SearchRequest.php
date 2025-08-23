<?php

namespace App\Http\Request;
;

use System\Request\Request;

class SearchRequest extends Request
{
    protected function rules()
    {
        return
            [
                'search' => 'required'
            ];
    }
}