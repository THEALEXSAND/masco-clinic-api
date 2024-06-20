<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
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
            'consulta_id' => $this->consulta_id,
            'medicamento_id' => $this->medicamento_id,
            'cantidad' => $this->cantidad,
            'indicaciones' => $this->indicaciones,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
            // Aquí puedes incluir relaciones si las necesitas, por ejemplo:
            // 'consultation' => new ConsultationResource($this->whenLoaded('consultation')),
            // 'medicine' => new MedicineResource($this->whenLoaded('medicine')),
        ];
    }
}
