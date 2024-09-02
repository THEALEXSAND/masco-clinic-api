<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
            'userIdCard' => $this->user_cedula,
            'subject' => $this->asunto,
            'dateTime' => $this->fecha_hora,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,

            'pet' => PetResource::make($this->whenLoaded('pet')),
            'user' => UserResource::make($this->whenLoaded('user')),
        ];
    }
}
