<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConsultationRequest extends FormRequest
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
            'medicalHistoryId' => ['required', 'numeric', 'exists:medical_histories,id'],
            'userIdCard' => ['required', 'max_digits:8', 'exists:users,cedula'],
            'diagnostic' => ['required'],
            'observation' => ['required'],
            'description' => ['required']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'medical_history_id' => $this->medicalHistoryId,
            'user_cedula' => $this->userIdCard,
            'diagnostico' => $this->diagnostic,
            'descripcion' => $this->description,
            'observacion' => $this->observation,
        ]);
    }
}
