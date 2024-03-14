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

        if ($method === 'PUT') {
            return [
                'medicalHistoryId' => ['required', 'integer'],
                'descripcion' => ['required'],
                'receta' => ['required'],
                'tratamiento' => ['required'],
            ];
        } else {
            return [
                'medicalHistoryId' => ['sometimes', 'integer'],
                'descripcion' => ['sometimes'],
                'receta' => ['sometimes'],
                'tratamiento' => ['sometimes'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'medical_history_id' => $this->medicalHistoryId,
        ]);
    }
}
