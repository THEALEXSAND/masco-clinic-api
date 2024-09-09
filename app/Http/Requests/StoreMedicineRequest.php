<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicineRequest extends FormRequest
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
            'genericName' => ['required', 'max:100'],
            'commercialName' => ['required', 'unique:medicines,nombre_comercial'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'nombre_generico' => $this->genericName,
            'nombre_comercial' => $this->commercialName,
        ]);
    }
}
