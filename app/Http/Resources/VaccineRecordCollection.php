<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class VaccineRecordCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($vaccineRecord) {
                return [
                    'id' => $vaccineRecord->id,
                    'medical_history_id' => $vaccineRecord->medical_history_id,
                    'nombre_vacuna' => $vaccineRecord->nombre_vacuna,
                    'fecha_aplicacion' => $vaccineRecord->fecha_aplicacion,
                    'created_at' => $vaccineRecord->created_at->toDateTimeString(),
                    'updated_at' => $vaccineRecord->updated_at->toDateTimeString(),
                ];
            }),
            'links' => [
                'self' => url('/api/vaccine-records'),
            ],
        ];
    }
}
