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
            'consultationId' => $this->consultation_id,
            'medicineId' => $this->medicine_id,
            'quantity' => $this->cantidad,
            'instructions' => $this->indicaciones,
        ];
    }
}
