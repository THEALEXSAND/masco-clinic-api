<?php

namespace App\Filters;

use App\Filters\ApiFilter;

class AppointmentFilter extends ApiFilter
{
    protected $safeParams = [
        'fecha' => ['eq', 'gt', 'lt'],
        'hora' => ['eq', 'gt', 'lt'],
        'mascota_id' => ['eq'],
        'usuario_cedula' => ['eq'],
        'asunto' => ['eq'],
    ];
}
