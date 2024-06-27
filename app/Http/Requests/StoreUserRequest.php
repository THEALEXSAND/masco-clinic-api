<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cedula' => 'required|integer|unique:users,cedula',
            'tipo_usuario_id' => 'required|exists:user_types,id',
            'nombre' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:users,correo',
            'contrasena' => 'required|string|min:8',
        ];
    }
}
