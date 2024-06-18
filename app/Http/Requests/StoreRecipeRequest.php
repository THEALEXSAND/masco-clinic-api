<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecipeRequest extends FormRequest
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
                'consulta_id' => ['required', 'integer'],
                'medicacion_id' => ['required', 'integer'],
                'cantidad' => ['required', 'integer'],
                'indicacion' => ['required', 'string'],
            ];
        } else {
            return [
                'consulta_id' => ['sometimes', 'integer'],
                'medicacion_id' => ['sometimes', 'integer'],
                'cantidad' => ['sometimes', 'integer'],
                'indicacion' => ['sometimes', 'string'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->consultationId || $this->medicineId) {
            $this->merge([
                'consulta_id' => $this->consultationId,
                'medicacion_id' => $this->medicineId,
            ]);
        }
    }
}
