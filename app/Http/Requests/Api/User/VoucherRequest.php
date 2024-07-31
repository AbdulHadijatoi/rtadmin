<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ResponseTrait;
class VoucherRequest extends FormRequest
{
    use ResponseTrait;

    public function rules(): array
    {
        return [
            'voucher_code'=>'required|exists:gift_cards,code',
        ];
    }
}