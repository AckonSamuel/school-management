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
            'classroom_id' => 'nullable|exists:classrooms,id',
            'parent_phone_number' => 'nullable',
            'second_phone_number' => 'nullable',
            'enrollment_date' => 'nullable',
            'address' => 'nullable',
            'gender' => 'nullable',
        ];
    }
}
