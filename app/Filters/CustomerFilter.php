<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class CustomerFilter extends ApiFilter
{
    protected $safeParams = [
        'nombre' => ['eq'],
        'apellido' => ['eq'],
        'cedula' => ['eq', 'gt', 'lt'],
        'direccion' => ['eq'],
        'telefono' => ['eq', 'gt', 'lt'],
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
    ];
}
