<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePetRequest extends FormRequest
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
            'id' => ['sometimes', 'numeric'],
            'customerIdCard' => ['required', 'numeric', 'max_digits:8', 'exists:customers,cedula'],
            'breedId' => ['required', 'numeric', 'exists:breeds,id'],
            'name' => ['required'],
            'gender' => ['required', Rule::in(['Macho', 'Hembra'])],
            'birthdate' => ['required', 'date']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'customer_cedula' => $this->customerIdCard,
            'breed_id' => $this->breedId,
            'nombre' => $this->name,
            'sexo' => $this->gender,
            'fecha_nacimiento' => $this->birthdate,
        ]);
    }
}
