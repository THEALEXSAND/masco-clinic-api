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
            'id' => $this->id,
            'cedula' => $this->cedula,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'creadoEn' => $this->created_at,
            'actualizadoEn' => $this->updated_at,
            'pets' => PetResource::collection($this->whenLoaded('pets')),
        ];
    }
}
