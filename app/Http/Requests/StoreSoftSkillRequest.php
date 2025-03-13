<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSoftSkillRequest extends FormRequest
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
            'name' => 'required|unique:soft_skills|max:255'
        ];
    }
    public function message()
    {
        return [
            'name.required' => 'The soft skill name is required',
            'name.unique' => 'This soft skill already exists',
            'name.max' => 'soft skill name cannot exceed 255 characters',
        ];
    }
}
