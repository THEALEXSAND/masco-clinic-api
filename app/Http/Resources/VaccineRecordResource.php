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
            'creadoEn' => $this->created_at,
            'actualizadoEn' => $this->updated_at,
        ];
    }
}
