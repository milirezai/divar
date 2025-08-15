<?php

namespace App\Requests\Admin;

use System\Request\Request;

class AdsRequest extends Request
{
    public function rules()
    {
        if (methodField() == 'put')
        {
            return
            [
                'title' => 'min:10|max:191',
                'description' => 'min:10',
                'address' => 'max:191',
                'amount' => 'max:191',
                'image' => 'file|mimes:png,jpg,jpeg',
                'floor' => 'max:191',
                'year' => 'number',
                'storeroom' => 'number',
                'balcony' => 'number',
                'area' => 'max:5',
                'room' => 'number',
                'toilet' => 'max:191',
                'parking' => 'number',
                'tag' => 'max:191',
                'status' => 'max:5',
                'user_id' => 'max:191',
                'cat_id' => 'exists:categories,id',
                'sell_status' => 'number',
                'type' => 'number',
            ];
        }
        else
        {
            return
            [
                'title' => 'required|min:10|max:191',
                'description' => 'required|min:10',
                'address' => 'required|max:191',
                'amount' => 'required|max:191',
                'image' => 'required|file|mimes:png,jpg,jpeg',
                'floor' => 'required|max:191',
                'year' => 'required|number',
                'storeroom' => 'required|number',
                'balcony' => 'required|number',
                'area' => 'required|max:5',
                'room' => 'required|number',
                'toilet' => 'required|max:191',
                'parking' => 'required|number',
                'tag' => 'required|max:191',
                'status' => 'required|max:5',
                'user_id' => 'required|max:191',
                'cat_id' => 'required|exists:categories,id',
                'sell_status' => 'required|number',
                'type' => 'required|number',
            ];
        }
    }
}