<?php

namespace App\Filters;

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
}
