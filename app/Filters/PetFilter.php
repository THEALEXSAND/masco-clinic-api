<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class PetFilter extends ApiFilter
{
    protected $safeParams = [
        'customer_id' => ['eq'],
        'nombre' => ['eq'],
        'raza' => ['eq'],
        'tipo_animal' => ['eq'],
        'sexo' => ['eq'],
        'edad' => ['eq', 'gt', 'lt'],
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
