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
            'first_name' => 'required|max:30',
            'surname' => 'required|max:30',
            'birth_date' => 'required',
            'classroom_id' => 'required|exists:classrooms,id',
            'parent_phone_number' => 'required',
            'second_phone_number' => 'nullable',
            'enrollment_date' => 'required',
            'address' => 'required',
            'gender' => 'required',
        ];
    }
}
