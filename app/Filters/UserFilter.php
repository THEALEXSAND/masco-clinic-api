<?php

namespace App\Filters;

use Illuminate\Http\Request;

class UserFilter extends ApiFilter
{
    protected $safeParams = [
        'nombre' => ['eq'],
        'correo' => ['eq'],
        'cedula' => ['eq', 'gt', 'lt'],
        'tipo_usuario_id' => ['eq'],
    ];

    protected $columnMap = [];
}
