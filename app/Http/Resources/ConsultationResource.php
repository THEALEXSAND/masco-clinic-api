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
            'motivo' => $this->motivo,
            'descripcion' => $this->descripcion,
            'receta' => $this->receta,
            'tratamiento' => $this->tratamiento,
            'creadoEn' => $this->created_at,
            'actualizadoEn' => $this->updated_at,
        ];
    }
}
