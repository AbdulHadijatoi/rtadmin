<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'package_id'=>'required',
            'tour_date'=>'required',
            'price'=>'required',
        ];
    }
}
