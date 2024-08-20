<?php

namespace App\Filters;

class PetFilter extends ApiFilter
{
    protected $safeParams = [
        'id' => ['eq', 'like'],
        'customerIdCard' => ['eq', 'like'],
        'breedId' => ['eq', 'like'],
        'name' => ['eq', 'like'],
        'gender' => ['eq', 'like'],
    ];

    protected $columnMap = [
        'customerIdCard' =>  'customer_cedula',
        'breedId' =>  'breed_id',
        'name' =>  'nombre',
        'gender' =>  'sexo',
    ];
}
