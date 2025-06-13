<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'trainer' => ['sometimes', 'required', 'string', 'max:255'],
            'date' => ['sometimes', 'required', 'date', 'after_or_equal:today'],
            'slots' => ['sometimes', 'required', 'integer', 'min:1'],
            'is_active' => 'boolean',
        ];
    }
}
