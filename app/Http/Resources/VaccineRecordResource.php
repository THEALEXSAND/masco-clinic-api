<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VaccineRecordResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'historia_medica_id' => $this->historia_medica_id,
            'nombre_vacuna' => $this->nombre_vacuna,
            'fecha_aplicacion' => $this->fecha_aplicacion,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
