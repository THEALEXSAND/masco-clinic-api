<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalHistoryResource extends JsonResource
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
            'petId' => $this->pet_id,
            'record' => $this->antecedentes,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,

            'consultations' => $this->consultations,
        ];
    }
}
