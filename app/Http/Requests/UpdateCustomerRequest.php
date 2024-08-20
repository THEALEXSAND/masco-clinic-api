<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'idCard' => ['required', 'max_digits:8', 'numeric'],
            'name' => ['required'],
            'lastName' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
        ];
        else return [
            'idCard' => ['sometimes', 'max_digits:8', 'numeric'],
            'name' => ['sometimes'],
            'lastName' => ['sometimes'],
            'address' => ['sometimes'],
            'phone' => ['sometimes'],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->idCard) $this->merge([
            'cedula' => $this->idCard
        ]);

        if ($this->name) $this->merge([
            'nombre' => $this->name
        ]);

        if ($this->idCard) $this->merge([
            'apellido' => $this->lastName
        ]);

        if ($this->idCard) $this->merge([
            'direccion' => $this->address
        ]);

        if ($this->idCard) $this->merge([
            'telefono' => $this->phone
        ]);
    }
}
