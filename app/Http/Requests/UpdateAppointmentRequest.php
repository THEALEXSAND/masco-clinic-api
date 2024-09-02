<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
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
        $method = $this->method();

        if ($method === 'PUT') return [
            'id' => ['sometimes', 'unique:appointments'],
            'petId' => ['required', 'exists:pets,id', 'numeric'],
            'userIdCard' => ['required', 'max_digits:8', 'exists:users,cedula'],
            'subject' => ['required'],
            'dateTime' => ['required', 'date']
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->subject) $this->merge([
            'asunto' => $this->subject
        ]);
    }
}
