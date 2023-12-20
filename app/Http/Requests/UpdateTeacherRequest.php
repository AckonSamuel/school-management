<?php

namespace App\Http\Requests;

use App\Models\Teacher;
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
        $teacherId = $this->route('id'); // Change 'teacher' to the parameter name in your route
    
        return [
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'birthday' => 'required',
            'email' => ['required'],
            'phone_number' => 'required|regex:/(0)[0-9]{9}/',
            'photo' => 'required|mimes:jpeg,bmp,png,jpg|max:2048',
            'address' => 'required',
        ];
    }
    
    
}
