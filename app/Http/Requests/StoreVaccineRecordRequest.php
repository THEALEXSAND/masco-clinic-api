<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVaccineRecordRequest extends FormRequest
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
            'vaccineName' => ['required'],
            'observation' => ['sometimes', 'nullable'],
            'applicationDate' => ['required', 'date']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'medical_history_id' => $this->medicalHistoryId,
            'nombre_vacuna' => $this->vaccineName,
            'observacion' => $this->observation,
            'fecha_aplicacion' => $this->applicationDate
        ]);
    }
}
