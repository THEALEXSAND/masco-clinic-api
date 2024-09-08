<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVaccineRecordRequest extends FormRequest
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
            'id' => ['sometimes', 'numeric', 'unique:vaccine_records'],
            'medicalHistoryId' => ['required', 'numeric', 'exists:medical_histories,id'],
            'vaccineName' => ['required'],
            'observation' => ['sometimes', 'nullable'],
            'applicationDate' => ['required', 'date']
        ];
        else return [
            'id' => ['sometimes', 'numeric', 'unique:vaccine_records'],
            'medicalHistoryId' => ['sometimes', 'numeric', 'exists:medical_histories,id'],
            'vaccineName' => ['sometimes'],
            'observation' => ['sometimes', 'nullable'],
            'applicationDate' => ['sometimes', 'date']
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->id) $this->merge([
            'id' => $this->id
        ]);

        if ($this->id) $this->merge([
            'medical_history_id' => $this->medicalHistoryId
        ]);

        if ($this->vaccineName) $this->merge([
            'nombre_vacuna' => $this->vaccineName
        ]);

        if ($this->observation) $this->merge([
            'observacion' => $this->observation
        ]);

        if ($this->applicationDate) $this->merge([
            'fecha_aplicacion' => $this->applicationDate
        ]);
    }
}
