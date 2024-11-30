<?php

namespace App\Http\Requests;

use App\Enums\JobType;
use Illuminate\Foundation\Http\FormRequest;

class UpsertJobRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string'],
            'salary' => ['required', 'numeric', 'min:0'],
            'tags' => ['required', 'string'],
            'job_type' => ['required', 'string', 'in:' . implode(',', array_column(JobType::cases(), 'value'))],
            'remote' => ['required', 'boolean'],
            'requirements' => ['required', 'string'],
            'benefits' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'zipcode' => ['required', 'regex:/^\d+(\-\d+)?$/'],
            'contact_email' => ['required', 'email', 'max:255', 'unique:works,contact_email' . ($this->work ? ',' . $this->work->id : '')],
            'contact_phone' => ['required', 'string', 'max:18', 'regex:/^(\+\d{1,3})?(\(\d{1,3}\))?[\d\s().-]+$/', 'unique:works,contact_phone' . ($this->work ? ',' . $this->work->id : '')],
            'company_name' => ['required', 'string'],
            'company_description' => ['nullable', 'string'],
            'company_logo' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif', 'max:1024'],
            'company_website' => ['nullable', 'url', 'unique:works,company_website' . ($this->work ? ',' . $this->work->id : '')],
            'status' => ['required', 'boolean']
        ];
    }
}
