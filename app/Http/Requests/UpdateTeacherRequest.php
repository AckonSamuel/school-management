<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Adjust authorization logic if needed
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|max:30',
            'surname' => 'required|max:30',
            'birth_date' => 'required',
            'email' => [
                'required',
                Rule::unique('teachers', 'email')->ignore($this->route('id'))
            ],

            'phone_number' => 'required|regex:/(0)[0-9]{10}/',
            'photo' => 'required|mimes:jpeg,bmp,png,jpg|max:2048',
            'address' => 'required',
        ];
    }
}
