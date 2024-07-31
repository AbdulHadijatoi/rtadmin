<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ResponseTrait;

class GiftCardRequest extends FormRequest
{
    use ResponseTrait;

    public function rules(): array
    {
        return [
            'activity_id'     => 'nullable',
            'discount_price'  => 'required|string',
            'recipient_email' => 'nullable', 'string', 'email',
            'description'=>'nullable',
            'voucher_code'=>'nullable'
        ];
    }
}