<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConsultationRequest extends FormRequest
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
            'medicalHistoryId' => ['required', 'numeric', 'exists:medical_histories,id'],
            'userIdCard' => ['required', 'max_digits:8', 'exists:users,cedula'],
            'diagnostic' => ['required'],
            'observation' => ['required'],
            'description' => ['required']
        ];
        else return [
            'medicalHistoryId' => ['sometimes', 'numeric', 'exists:medical_histories,id'],
            'userIdCard' => ['sometimes', 'max_digits:8', 'exists:users,cedula'],
            'diagnostic' => ['sometimes'],
            'observation' => ['sometimes'],
            'description' => ['sometimes']
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->medicalHistoryId) $this->merge([
            'medical_history_id' => $this->medicalHistoryId
        ]);

        if ($this->userIdCard) $this->merge([
            'user_cedula' => $this->userIdCard
        ]);

        if ($this->diagnostic) $this->merge([
            'diagnostico' => $this->diagnostic
        ]);

        if ($this->observation) $this->merge([
            'observacion' => $this->observation
        ]);

        if ($this->description) $this->merge([
            'descripcion' => $this->description
        ]);
    }
}
