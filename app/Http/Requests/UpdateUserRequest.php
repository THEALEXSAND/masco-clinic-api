<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tipo_usuario_id' => 'required|exists:user_types,id',
            'nombre' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:users,correo,' . $this->route('user')->cedula,
            'contrasena' => 'sometimes|string|min:8',
        ];
    }
}
