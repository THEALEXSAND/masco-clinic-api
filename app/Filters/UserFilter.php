<?php

namespace App\Filters;

class UserFilter extends ApiFilter
{
    protected $safeParams = [
        'idCard' => ['eq', 'like'],
        'userTypeId' => ['eq', 'like'],
        'name' => ['eq', 'like'],
        'lastName' => ['eq', 'like'],
        'email' => ['eq', 'like'],
        'password' => ['eq', 'like']
    ];

    protected $columnMap = [
        'idCard' => 'cedula',
        'userTypeId' => 'user_type_id',
        'name' => 'nombre',
        'lastName' => 'apellido',
        'email' => 'correo',
        'password' => 'contraseña',
    ];
}
