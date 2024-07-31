<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ResponseTrait;

class OrderRequest extends FormRequest
{
    use ResponseTrait;

    public function rules(): array
    {
        return [
            'first_name' => 'required', 'string', 'max:255',
            'last_name' => 'required', 'string', 'max:255',
            'email'      => 'required', 'string', 'email',
            'activity_name'  => 'required', 'string',
            'title'     => 'required',
            'nationality'=>'required',
            'phone'=>'required',
            'date'=>'required',
            'total_amount'=>'required',
            'pickup_location'=>'required',
            'note'=>'nullable',
            'payment'=>'required',
            'package_details'=>'required',
        ];
    }
}