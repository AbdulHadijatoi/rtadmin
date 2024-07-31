<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ResponseTrait;

class ReviewRequest extends FormRequest
{
    use ResponseTrait;

    public function rules(): array
    {
        return [
            'activity_id'  => 'required|exists:activities,id',
            'comment'      => 'required|string|max:255',
            'rating'       => 'required|integer|min:1|max:5',
        ];
    }
}
