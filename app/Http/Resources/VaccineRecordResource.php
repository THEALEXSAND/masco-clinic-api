<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VaccineRecordResource extends JsonResource
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
            'vaccineName' => $this->nombre_vacuna,
            'observation' => $this->observacion,
            'applicationDate' => $this->fecha_aplicacion,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,

            'medicalHistory' => MedicalHistoryResource::make($this->whenLoaded('medicalHistory'))
        ];
    }
}
