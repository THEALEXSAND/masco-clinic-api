<?php

namespace App\Filters;

use App\Filters\ApiFilter;

class PetFilter extends ApiFilter
{
    protected $safeParams = [
        'customerId' => ['eq'],
        'nombre' => ['eq'],
        'raza' => ['eq'],
        'tipoAnimal' => ['eq'],
        'sexo' => ['eq'],
        'edad' => ['eq', 'gt', 'gte', 'lt', 'lte'],
    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'tipoAnimal' => 'tipo_animal',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
    ];
}
