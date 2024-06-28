<?php

namespace App\Filters;

use App\Filters\ApiFilter;

class VaccineRecordFilter extends ApiFilter
{
    protected $safeParams = [
        'id' => ['eq'],
        'historia_medica_id' => ['eq'],
        'nombre_vacuna' => ['eq'],
        'fecha_aplicacion' => ['eq', 'gt', 'lt'],
    ];
}
