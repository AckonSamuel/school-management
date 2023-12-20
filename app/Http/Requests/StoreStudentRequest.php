<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Change authorization logic if needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'birthday' => 'required',
            'classroom' => 'required|exists:classrooms,id',
            'parent_phone_number' => 'required|regex:/(0)[0-9]{10}/',
            'second_phone_number' => 'nullable|regex:/(0)[0-9]{10}/',
            'enrollment_date' => 'required|date',
            'address' => 'required',
            'gender' => 'required|in:male,female', // Modify 'male' and 'female' as needed
        ];
    }
}
