<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBreedRequest extends FormRequest
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
            'id' => ['sometimes', 'unique:breeds'],
            'specieId' => ['required', 'exists:species,id'],
            'name' => ['required', 'unique:breeds,nombre']
        ];
        else return [
            'id' => ['sometimes', 'unique:breeds'],
            'specieId' => ['sometimes', 'exists:species,id'],
            'name' => ['sometimes', 'unique:breeds,nombre']
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->specieId) $this->merge([
            'pet_id' => $this->specieId
        ]);

        if ($this->name) $this->merge([
            'nombre' => $this->name
        ]);
    }
}
