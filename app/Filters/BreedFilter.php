<?php

namespace App\Filters;

class BreedFilter extends ApiFilter
{
    protected $safeParams = [
        'id' => ['eq', 'like'],
        'specieId' => ['eq', 'like'],
        'name' => ['eq', 'like']
    ];

    protected $columnMap = [
        'name' => 'nombre',
        'specieId' => 'specie_id'
    ];
}
