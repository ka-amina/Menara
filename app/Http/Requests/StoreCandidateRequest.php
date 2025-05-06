<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
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
            'email' => 'required|email|max:255|unique:candidates',
            'phone_number' => 'required|string|max:20',
            'cv' => 'required|file|mimes:pdf,doc,docx',
            'offer_id' => 'required|exists:offers,id',
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.max' => 'First name cannot exceed 255 characters.',

            'last_name.required' => 'Last name is required.',
            'last_name.max' => 'Last name cannot exceed 255 characters.',

            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email cannot exceed 255 characters.',
            'email.unique' => 'This email address is already registered.',

            'phone_number.required' => 'Phone number is required.',
            'phone_number.max' => 'Phone number cannot exceed 20 characters.',

            'cv.required' => 'Please upload a CV.',
            'cv.file' => 'CV must be a file.',
            'cv.mimes' => 'CV must be a PDF, DOC, or DOCX file.',

            'offer_id.required' => 'Please select a job offer.',
            'offer_id.exists' => 'The selected job offer does not exist.',
        ];
    }
}
