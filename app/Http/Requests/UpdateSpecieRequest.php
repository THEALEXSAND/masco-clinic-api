<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecieRequest extends FormRequest
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
            'id' => ['sometimes', 'unique:species'],
            'name' => ['required', 'unique:species,nombre'],
        ];
        else return [
            'id' => ['sometimes', 'unique:species'],
            'name' => ['sometimes', 'unique:species,nombre'],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->name) $this->merge([
            'nombre' => $this->name
        ]);
    }
}
