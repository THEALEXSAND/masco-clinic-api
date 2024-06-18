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
                'consultaId' => ['required', 'integer'],
                'medicacionId' => ['required', 'integer'],
                'cantidad' => ['required', 'integer'],
                'indicacion' => ['required', 'string'],
            ];
        } else {
            return [
                'consultaId' => ['sometimes', 'integer'],
                'medicacionId' => ['sometimes', 'integer'],
                'cantidad' => ['sometimes', 'integer'],
                'indicacion' => ['sometimes', 'string'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->consultaId || $this->medicacionId) {
            $this->merge([
                'consulta_id' => $this->consultaId,
                'medicacion_id' => $this->medicacionId,
            ]);
        }
    }
}
