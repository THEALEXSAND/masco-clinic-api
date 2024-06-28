<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'cedula' => $this->cedula,
            'tipo_usuario_id' => $this->tipo_usuario_id,
            'nombre' => $this->nombre,
            'correo' => $this->correo,
            'creado_en' => $this->created_at,
            'actualizado_en' => $this->updated_at,
            'tipo_usuario' => $this->whenLoaded('userType'),];
    }
}
 