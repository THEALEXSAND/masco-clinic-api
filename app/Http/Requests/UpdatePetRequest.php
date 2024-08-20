<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePetRequest extends FormRequest
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
            'id' => ['sometimes', 'numeric'],
            'customerIdCard' => ['required', 'numeric', 'max_digits:8', 'exists:customers,cedula'],
            'breedId' => ['required', 'numeric', 'exists:breeds,id'],
            'name' => ['required'],
            'gender' => ['required', Rule::in(['Macho', 'Hembra'])],
            'birthdate' => ['required', 'date']
        ];
        else return [
            'id' => ['sometimes', 'numeric'],
            'customerIdCard' => ['sometimes', 'numeric', 'max_digits:8', 'exists:customers,cedula'],
            'breedId' => ['sometimes', 'numeric', 'exists:breeds,id'],
            'name' => ['sometimes'],
            'gender' => ['sometimes', Rule::in(['Macho', 'Hembra'])],
            'birthdate' => ['sometimes', 'date']
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->customerIdCard) $this->merge([
            'customer_cedula' => $this->customerIdCard
        ]);

        if ($this->breedId) $this->merge([
            'breed_id' => $this->breedId
        ]);

        if ($this->name) $this->merge([
            'nombre' => $this->name
        ]);

        if ($this->gender) $this->merge([
            'sexo' => $this->gender
        ]);

        if ($this->birthdate) $this->merge([
            'fecha_nacimiento' => $this->birthdate
        ]);
    }
}
