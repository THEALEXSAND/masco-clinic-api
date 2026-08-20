<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'cedula' => ['required', 'string', 'max:8', 'unique:users,cedula'],
            'nombre' => ['required', 'string', 'max:100'],
            'apellido' => ['required', 'string', 'max:100'],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:users,correo'],
            'contraseña' => ['required', 'string', 'min:8'],
            'user_type_id' => ['required', 'integer', 'exists:user_types,id'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'cedula' => $this->input('idCard'),
            'nombre' => $this->input('name'),
            'apellido' => $this->input('lastName'),
            'correo' => $this->input('email'),
            'contraseña' => bcrypt($this->input('password')),
            'user_type_id' => $this->input('userTypeId'),
        ]);
    }
}
