<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicineResource extends JsonResource
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
            'genericName' => $this->nombre_generico,
            'commercialName' => $this->nombre_comercial,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,

            'consultations' => ConsultationResource::collection($this->whenLoaded('consultations')),
            'recipe' => $this->whenNotNull(RecipeResource::make($this->recipe))
        ];
    }
}
