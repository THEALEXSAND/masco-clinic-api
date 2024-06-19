<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RecipeCollection extends ResourceCollection
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
            'data' => $this->collection->map(function($recipe) {
                return [
                    // 'id' => $recipe->id,
                    'consulta_id' => $recipe->consulta_id,
                    'medicamento_id' => $recipe->medicamento_id,
                    'cantidad' => $recipe->cantidad,
                    'indicaciones' => $recipe->indicaciones,
                    'created_at' => $recipe->created_at->toDateTimeString(),
                    'updated_at' => $recipe->updated_at->toDateTimeString(),
                ];
            }),
            'links' => [
                'self' => url('/api/recipes'),
            ],
        ];
    }
}
