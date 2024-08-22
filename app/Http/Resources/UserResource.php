<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idCard' => $this->cedula,
            'userTypeId' => $this->user_type_id,

            'name' => $this->nombre,
            'lastName' => $this->apellido,
            'email' => $this->correo,
            'password' => $this->contraseña,
            'type' => $this->userType->nombre,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,

            'consultations' => ConsultationResource::make($this->whenLoaded('consultations'))
        ];
    }
}
