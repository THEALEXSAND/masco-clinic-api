<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnimalBreedRequest extends FormRequest
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
        $method = $this->method;

        if ($method === 'PUT') {
            return [
                'animalTypeId' => ['required', 'integer'],
                'raza' => ['required', 'unique:anime_breeds']
            ];
        } else {
            return [
                'animalTypeId' => ['sometimes', 'integer'],
                'raza' => ['sometimes', 'unique:animal_breeds']
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->animalTypeId) {
            $this->merge([
                'animal_type_id' => $this->animalTypeId
            ]);
        }
    }
}
