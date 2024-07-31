<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ResponseTrait;

class RegisterRequest extends FormRequest
{
    use ResponseTrait;

    public function rules(): array
    {
        return [
            'first_name' => 'required', 'string', 'max:255',
            'last_name'  => 'required', 'string', 'max:255',
            'email'      => 'required', 'string', 'email', 'max:255', 'unique:users,email',
            'password'   => 'required', 'string', 'min:8',
            'phone'      => 'nullable',
            'visa_status'      => 'nullable',
            'twitter'      => 'nullable',
            'instagram'      => 'nullable',
            'facebook'      => 'nullable',
            'profile_image'      => 'nullable'  
        ];
    }
}