<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Aquí puedes agregar lógica de autorización si es necesario
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fecha' => ['required', 'date'],
            'hora' => ['required', 'date_format:H:i:s'],
            'mascota_id' => ['required', 'exists:pets,id'],
            'usuario_cedula' => ['required', 'exists:users,cedula'],
            'asunto' => ['nullable', 'string'],
        ];
    }
}
