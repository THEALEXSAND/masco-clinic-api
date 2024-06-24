<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVaccineRecordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'historia_medica_id' => 'required|exists:medical_histories,id',
            'nombre_vacuna' => 'required|string',
            'fecha_aplicacion' => 'required|date',
        ];
    }
}
