<?php

namespace App\Http\Request\Admin;

use System\Request\Request;

class AdsRequest extends Request
{
    protected function rules()
    {
        if(methodField() == 'put'){
            return [
                'title' => 'max:191',
                'description' => 'max:2000',
                'address' => 'max:191',
                'amount' => 'max:191',
                'image' => 'file|mimes:jpeg,jpg,png,gif',
                'floor' => 'max:191',
                'year' => 'max:191',
                'storeroom' => 'number',
                'balcony' => 'number',
                'room' => 'number',
                'parking' => 'number',
                'toilet' => 'max:191',
                'tag' => 'max:191',
                'cat_id' => 'exist:categories,id',
                'sell_status' => 'number',
                'type' => 'number',
            ];
        }
        else{
            return [
                'title' => 'required|max:191',
                'description' => 'required|max:2000',
                'address' => 'required|max:191',
                'amount' => 'required|max:191',
                'image' => 'required|file|mimes:jpeg,jpg,png,gif',
                'floor' => 'required|max:191',
                'year' => 'required|max:191',
                'storeroom' => 'required|number',
                'balcony' => 'required|number',
                'room' => 'required|number',
                'parking' => 'required|number',
                'toilet' => 'required|max:191',
                'tag' => 'required|max:191',
                'cat_id' => 'required|exist:categories,id',
                'sell_status' => 'required|number',
                'type' => 'required|number',
            ];
        }

    }
}