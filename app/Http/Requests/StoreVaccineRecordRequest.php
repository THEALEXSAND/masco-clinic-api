<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVaccineRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'historia_medica_id' => ['required', 'integer'],
            'nombre_vacuna' => ['required', 'string', 'max:255'],
            'fecha_aplicacion' => ['required', 'date'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    // protected function prepareForValidation()
    // {
    //     $this->merge([
    //         'historia_medica_id' => $this->historia_medica_id,
    //     ]);
    // }
}
