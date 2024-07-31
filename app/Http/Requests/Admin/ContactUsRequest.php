<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'phone'=>'nullable',
            'email'=>'email',
            'address'=>'max:500',
            'facebook'=>'url',
            'instagram'=>'url',
            'twitter'=>'url',
            'image'=>'required'
        ];
    }
}