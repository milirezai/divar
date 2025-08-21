<?php

namespace App\Http\Request;
;

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