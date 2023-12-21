<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'first_name' => 'nullable|max:30',
            'last_name' => 'nullable|max:30',
            'birthday' => 'nullable',
            'student_num' => 'nullable|digits:7',
            'parent_phone_number' => 'nullable|regex:/(0)[0-9]{9}/',
            'enrollment_date' => 'nullable',
            'address' => 'nullable',
            'gender' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'parent_phone_number.regex' => 'The phone number must be in the format 0244974077'
        ];
    }
}
