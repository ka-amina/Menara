<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvaluationRequest extends FormRequest
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
            'candidate_id' => 'required|exists:candidates,id',
            'offer_id' => 'required|exists:offers,id',
            'criteria_met' => 'required|in:0,1',
            'decision_justification' => 'required|string|max:1000'
        ];
    }
    
    public function messages(): array
    {
        return [
            'candidate_id.required' => 'The candidate field is required.',
            'candidate_id.exists' => 'The selected candidate does not exist.',
            'offer_id.required' => 'The offer field is required.',
            'offer_id.exists' => 'The selected offer does not exist.',
            'criteria_met.required' => 'The criteria met field is required.',
            'criteria_met.in' => 'The criteria met must be either 0 or 1.',
            'decision_justification.required' => 'The decision justification field is required.',
            'decision_justification.max' => 'The decision justification may not be more than 1000 characters.'
        ];
    }
}
