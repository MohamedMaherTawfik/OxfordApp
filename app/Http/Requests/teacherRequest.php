<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class teacherRequest extends FormRequest
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
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'phone' => 'required|string|max:15',
            'topic' => 'required|string|max:255',
            'certificate' => 'nullable',
        ];
    }
}
