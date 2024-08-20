<?php

namespace App\Filters;

class CustomerFilter extends ApiFilter
{
    protected $safeParams = [
        'idCard' => ['eq', 'like'],
        'name' => ['eq', 'like'],
        'lastName' => ['eq', 'like'],
        'address' => ['eq', 'like'],
        'phone' => ['eq', 'like', 'gt', 'lt'],
    ];

    protected $columnMap = [
        'idCard' => 'cedula',
        'name' => 'nombre',
        'lastName' => 'apellido',
        'address' => 'direccion',
        'phone' => 'telefono',
    ];
}
