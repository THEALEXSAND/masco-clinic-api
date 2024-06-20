<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MedicineCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($medicine) {
                return [
                    'id' => $medicine->id,
                    'nombre_generico' => $medicine->nombre_generico,
                    'nombre_comercial' => $medicine->nombre_comercial,
                    'created_at' => $medicine->created_at->toDateTimeString(),
                    'updated_at' => $medicine->updated_at->toDateTimeString(),
                    // Agregar más atributos según sea necesario
                ];
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
