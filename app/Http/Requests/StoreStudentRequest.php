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
            'student_num' => 'required|digits:7|unique:students,student_num',
            'parent_phone_number' => 'required|regex:/(0)[0-9]{9}/',
            'enrollment_date' => 'required|date',
            'address' => 'required',
            'gender' => 'required|in:male,female',
            'classroom_id' => 'nullable|exists:classrooms,id',
        ];
    }

    public function messages()
{
    return [
        'parent_phone_number.regex' => 'The phone number must be in the format 0244974077'
    ];
}
}
