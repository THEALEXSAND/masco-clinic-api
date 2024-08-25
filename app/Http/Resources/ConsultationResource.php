<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsultationResource extends JsonResource
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
            'medicalHistoryId' => $this->medical_history_id,
            'userIdCard' => $this->user_cedula,

            'description' => $this->descripcion,
            'observation' => $this->observacion,
            'diagnostic' => $this->diagnostico,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,

            'medicalHistory' => MedicalHistoryResource::make($this->whenLoaded('medicalHistory')),
            'veterinarian' => UserResource::make($this->whenLoaded('user'))
        ];
    }
}
