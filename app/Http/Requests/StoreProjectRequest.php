<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:200', 'unique:projects'],
            'logo' => ['nullable', 'min:4', 'max:255'],
            'image' => ['nullable', 'min:4', 'max:255'],
            'description' => ['nullable'],
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.min' => 'The title must be at least :min characters.',
            'title.max' => 'The title may not be greater than :max characters.',
            'title.unique' => 'The title has already been taken.',
            'logo.min' => 'The logo must be at least :min characters.',
            'logo.max' => 'The logo may not be greater than :max characters.',
            'image.min' => 'The image must be at least :min characters.',
            'image.max' => 'The image may not be greater than :max characters.',
        ];
    }
}
