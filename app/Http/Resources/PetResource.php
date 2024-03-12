<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'customerId' => $this->customer_id,
            'nombre' => $this->nombre,
            'tipoAnimal' => $this->tipo_animal,
            'raza' => $this->raza,
            'sexo' => $this->sexo,
            'edad' => $this->edad,
            'history' => MedicalHistoryResource::make($this->whenLoaded('medicalHistory')),
            'creadoEn' => $this->created_at,
            'actualizadoEn' => $this->updated_at,
        ];
    }
}
