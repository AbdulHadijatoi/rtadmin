<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TermsConditionRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'image'=>'image|mimes:jpeg,png,jpg,gif',
        ];
    }
}