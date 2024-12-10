<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantUpsertRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:300'],
            'contact_phone' => ['required', 'string', 'max:300'],
            'contact_email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:600'],
            'location' => ['required', 'string', 'max:300'],
            'resume_path' => ['required', 'file', 'max:1024', 'mimes:pdf'],
        ];
    }
}
