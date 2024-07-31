<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'      =>  'required|max:225',
            'route'      =>  'required|max:225',
            'page_title'      =>  'required|max:225',
            'status'    =>  'required'
        ];
    }
}