<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FindUsRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'image'=>'image|mimes:jpeg,png,jpg,gif',
            'header_image'=>'image|mimes:jpeg,png,jpg,gif',
            'phone'=>'nullable',
            'email'=>'email',
            'whatsapp'=>'nullable',
            'address'=>'nullable',
            'time_zone'=>'max:225',
            'booking_email'=>'email',
            'business_email'=>'email',
            'press_email'=>'email',
            'general_email'=>'email',
        ];
    }
}