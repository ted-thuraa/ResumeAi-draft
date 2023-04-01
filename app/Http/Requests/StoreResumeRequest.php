<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResumeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->user()->id
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:1000',
            'slug' => 'nullable|string',
            'user_id' => 'exists:users,id',
            'template' => 'nullable|string',
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'email' => 'nullable|string',
            'phone' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'address' => 'nullable|string',
            'country' => 'nullable|string',
            'Zipcode' => 'nullable|string',
            'skills' => 'nullable|string',
            'language' => 'nullable|string',
            'professional_summary' => 'nullable|string',
            'education_data' => 'array',
            'experiences_data' => 'array',
            'links' => 'array',
            'add_section' => 'array',
        ];
    }
}
