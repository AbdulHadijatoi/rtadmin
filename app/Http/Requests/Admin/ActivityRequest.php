<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'slug'=>'required|max:225|unique:activities,slug',
            'page_title'=>'required',
            'category_id' => 'required|integer',
            'subcategory_id' => 'nullable|integer',
            'name' => 'required',
            'duration' => 'required|integer',
            'cancellation_duration' => 'integer',
            'features'=>'required',
            'meetup' => 'nullable',
            'description' => 'required',
            'highlights' => 'required',
            'itinerary' => 'required',
            'whats_included' => 'required',
            'whats_not_included' => 'nullable',
            'minimum_travelers' => 'nullable',
            'image'=>'required',
            'images'=>'required',
            'booking_count' => 'nullable|integer',
            'discount_offer' => 'nullable|integer',
            'most_popular_activity' => 'nullable|integer',
            'otherexpereience_activity' => 'nullable|integer',
            'home_activity' => 'nullable|integer',
            'home_experience_activity' => 'nullable|integer',
            'available_activity' => 'nullable|integer',
            'price' => 'nullable|integer',
            'start_time'=>'nullable',
            'instructions' => 'array',
            'instructions.*.instruction_title' => 'nullable',
            'instructions.*.instruction_description' => 'nullable',
            'packages' => 'required|array',
            'packages.*.title' => 'required|string',
            'packages.*.category' => 'required|string',
            'packages.*.price' => 'nullable|integer',
            'packages.*.adult_price' => 'nullable|integer',
            'packages.*.child_price' => 'nullable|integer',
            'packages.*.highlight' => 'required|string',
        ];
    }
}