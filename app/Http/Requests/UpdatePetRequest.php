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

        if ($method === 'PUT') {
            return [
                'customerId' => ['required', 'integer', 'nullable'],
                'nombre' => ['required'],
                'tipoAnimal' => ['required'],
                'raza' => ['required'],
                'sexo' => ['required', Rule::in(['Macho', 'Hembra'])],
                'edad' => ['required', 'integer'],
            ];
        } else {
            return [
                'customerId' => ['sometimes', 'integer'],
                'nombre' => ['sometimes'],
                'tipoAnimal' => ['sometimes'],
                'raza' => ['sometimes'],
                'sexo' => ['sometimes', Rule::in(['Macho', 'Hembra'])],
                'edad' => ['sometimes', 'integer'],
            ];
        }
    }

    function prepareForValidation()
    {
        if ($this->customerId) {
            $this->merge([
                'customer_id' => $this->customerId,
            ]);
        }

        if ($this->tipoAnimal) {
            $this->merge([
                'tipo_animal' => $this->tipoAnimal,
            ]);
        }
    }
}
