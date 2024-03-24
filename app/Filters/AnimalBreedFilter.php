<?php

namespace App\Filters;

class AnimalBreedFilter extends ApiFilter
{
    protected $safeParams = [
        'animalTypeId' => ['eq'],
        'raza' => ['eq'],
    ];

    protected $columnMap = [
        'animalTypeId' => 'animal_type_id',
    ];
}
