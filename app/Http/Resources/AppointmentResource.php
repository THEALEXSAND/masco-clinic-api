<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'mascota_id' => $this->mascota_id,
            'usuario_cedula' => $this->usuario_cedula,
            'asunto' => $this->asunto,
            'creado_en' => $this->created_at,
            'actualizado_en' => $this->updated_at,
            'pets' => new PetResource($this->whenLoaded('mascota')),
            'usuario' => new UserResource($this->whenLoaded('usuario')),
        ];
    }
}
