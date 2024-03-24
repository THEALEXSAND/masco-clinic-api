<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnimalBreedRequest extends FormRequest
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
            'animalTypeId' => ['required', 'integer'],
            'raza' => ['required', 'unique:animal_breeds']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'animal_type_id' => $this->animalTypeId
        ]);
    }
}
