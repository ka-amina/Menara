<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
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
            'job_id' => 'required',
            // 'company_id' => 'required|exists:companies,id',
            'level' => 'required|in:junior,mid,senior,lead',
            'location' => 'nullable|string|max:255',
            'location_type' => 'required|in:onsite,remote,hybrid',
            'requirements' => 'nullable|string|max:255',
            'start_date' => 'required|in:flexible,immediately',
            'contract_type' => 'required|in:full-time,part-time,internship,CDI,CDD',
            // 'status' => 'sometimes|in:open,closed',
            'about_offer' => 'nullable|string',
        ];
    }

    public function messages(): array
{
    return [
        'job_id.required' => 'A job must be selected',
        'level.required' => 'The experience level is required',
        'level.in' => 'The experience level must be junior, mid, senior or lead',
        'location_type.required' => 'The location type is required',
        'location_type.in' => 'The location type must be onsite, remote or hybrid',
        'start_date.required' => 'The start date is required',
        'start_date.in' => 'The start date must be flexible or immediately',
        'contract_type.required' => 'The contract type is required',
        'contract_type.in' => 'The contract type must be full-time, part-time, internship, CDI or CDD',
    ];
}
}
