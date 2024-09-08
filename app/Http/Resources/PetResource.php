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
            'customerIdCard' => $this->customer_cedula,
            'breedId' => $this->breed_id,

            'name' => $this->nombre,
            'gender' => $this->sexo,
            'birthdate' => $this->fecha_nacimiento,
            'breed' => $this->breed->nombre,
            'specie' => $this->breed->specie->nombre,

            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,

            'medicalHistory' => MedicalHistoryResource::make($this->whenLoaded('medicalHistory')),
            'appointments' => AppointmentResource::collection($this->whenLoaded('appointments')),
            'owner' => CustomerResource::make($this->whenLoaded('customer'))
        ];
    }
}
