<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'cedula' => ['required', 'max_digits:8', 'numeric', 'unique:customers'],
            'nombre' => ['required'],
            'apellido' => ['required'],
            'direccion' => ['required'],
            'telefono' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'cedula' => $this->idCard,
            'nombre' => $this->name,
            'apellido' => $this->lastName,
            'direccion' => $this->address,
            'telefono' => $this->phone
        ]);
    }
}
