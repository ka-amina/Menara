<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:20',
            'industry' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', 
            'description' => 'nullable|string|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The company name is required.',
            'email.required' => 'The email is required.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'The password is required.',
            'phone.required' => 'The phone number is required.',
            'industry.required' => 'The industry is required.',
            'address.required' => 'The address is required.',
        ];
    }
}
