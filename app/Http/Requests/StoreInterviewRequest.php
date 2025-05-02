<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInterviewRequest extends FormRequest
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
            'interviewer_id' => 'required|exists:users,id',
            'scheduled_at' => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'offer_id' => 'required|exists:offers,id'
        ];
    }

    public function messages(): array
    {
        return [
            'candidate_id.required' => 'The candidate field is required.',
            'candidate_id.exists' => 'The selected candidate does not exist.',
            'interviewer_id.required' => 'The interviewer field is required.',
            'interviewer_id.exists' => 'The selected interviewer does not exist.',
            'scheduled_at.required' => 'The date field is required.',
            'scheduled_at.date' => 'The date must be a valid date.',
            'scheduled_at.after_or_equal' => 'The date must be today or a future date.',
            'start_time.required' => 'The start time field is required.',
            'end_time.required' => 'The end time field is required.',
            'end_time.after' => 'The end time must be after the start time.',
            'offer_id.required' => 'The offer field is required.',
            'offer_id.exists' => 'The selected offer does not exist.'
        ];
    }
}
