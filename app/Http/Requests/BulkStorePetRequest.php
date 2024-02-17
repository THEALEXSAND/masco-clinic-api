<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BulkStorePetRequest extends FormRequest
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
            '*.customerId' => ['required', 'integer'],
            '*.nombre' => ['required'],
            '*.tipoAnimal' => ['required'],
            '*.raza' => ['required'],
            '*.sexo' => ['required', Rule::in(['Macho', 'Hembra'])],
            '*.edad' => ['required', 'numeric'],
        ];
    }

    protected function prepareForValidation()
    {
        $data = [];

        foreach ($this->toArray() as $obj) {
            $obj['customer_id'] = $obj['customerId'] ?? null;
            $obj['tipo_animal'] = $obj['tipoAnimal'] ?? null;

            $data[] = $obj;
        }

        $this->merge($data);
    }
}
