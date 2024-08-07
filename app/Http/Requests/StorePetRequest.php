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
            'customer_id' => ['required', 'integer'],
            'nombre' => ['required'],
            'tipo_animal' => ['required'],
            'raza' => ['required'],
            'sexo' => ['required', Rule::in(['Macho', 'Hembra'])],
            'fecha_nacimiento' => ['required', 'date'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'customer_id' => $this->customerId,
            'tipo_animal' => $this->tipoAnimal,
            'fecha_nacimiento' => $this->fechaNacimiento
        ]);
    }
}
