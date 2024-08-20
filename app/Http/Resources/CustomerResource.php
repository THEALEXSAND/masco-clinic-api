<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'name' => $this->nombre,
            'lastName' => $this->apellido,
            'address' => $this->direccion,
            'phone' => $this->telefono,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,

            'pets' => PetResource::collection($this->whenLoaded('pets')),
        ];
    }
}
