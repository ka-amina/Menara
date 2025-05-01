<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCandidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255,',
            'phone_number' => 'required|string|max:20',
            'cv' => 'nullable|file|mimes:pdf,doc,docx',
            'position' => 'required|string',
            'status' => 'nullable|string',
            'interview_date' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.max' => 'First name cannot exceed 255 characters.',

            'last_name.required' => 'Last name is required.',
            'last_name.max' => 'Last name cannot exceed 255 characters.',

            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email cannot exceed 255 characters.',

            'phone_number.required' => 'Phone number is required.',
            'phone_number.max' => 'Phone number cannot exceed 20 characters.',

            'cv.mimes' => 'CV must be a PDF, DOC, or DOCX file.',

            'position.required' => 'Please select a position.',

            'status.in' => 'Please select a valid status.',

            'interview_date.date' => 'Please enter a valid date.',
        ];
    }
}
