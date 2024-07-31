<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ResponseTrait;

class ContactRequest extends FormRequest
{
    use ResponseTrait;

    public function rules(): array
    {
        return [
            'first_name' => 'required', 'string', 'max:255',
            'company_name' => 'nullable', 'string', 'max:255',
            'email'      => 'required', 'string', 'email',
            'mobile'      => 'required',
            'inquiry_topic'  => 'required', 'string',
            'message'     => 'required'
        ];
    }
}