<?php

namespace App\Filters;

class PetFilter extends ApiFilter
{
    protected $safeParams = [
        'id' => ['eq', 'like'],
        'customerIdCard' => ['eq', 'like'],
        'breedId' => ['eq', 'like'],
        'breed' => ['eq', 'like'],
        'specie' => ['eq', 'like'],
        'name' => ['eq', 'like'],
        'gender' => ['eq', 'like'],
    ];

    protected $columnMap = [
        'customerIdCard' =>  'customer_cedula',
        'breedId' =>  'breed_id',
        'breed' =>  'breeds.nombre',
        'specie' =>  'species.nombre',
        'name' =>  'nombre',
        'gender' =>  'sexo',
    ];
}
