<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
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
            'teacher_num' => 'required|digits:7|unique:teachers,teacher_num',
            'email' => 'required|email|unique:teachers,email',
            'phone_number' => 'required|regex:/(0)[0-9]{9}/',
            'address' => 'required',
            'gender' => 'required|in:male,female',
            'classroom_id' => 'nullable|exists:classrooms,id', // Modify 'male' and 'female' as needed
        ];
    }

    public function messages()
    {
        return [
            'phone_number.regex' => 'The phone number must be in the format 0244974077',
        ];
    }
}
