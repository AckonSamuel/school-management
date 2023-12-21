<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'subject_code' => 'required|max:6',
            'semester' => 'required|max:255',
            'description' => 'required|max:255',
            'teacher' => 'required|exists:teachers,id',
            'classroom' => 'required|exists:classrooms,id',
        ];
    }
}
