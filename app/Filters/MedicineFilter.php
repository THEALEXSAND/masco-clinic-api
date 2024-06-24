<?php

namespace App\Filters;

use App\Filters\ApiFilter;

class MedicineFilter extends ApiFilter
{
    protected $safeParams = [
        'nombre_generico' => ['eq'],
        'nombre_comercial' => ['eq'],
        
    ];

    // protected $columnMap = [
    //     'consulta_id' => 'consulta_id',
    //     'medicamento_id' => 'medicamento_id',
    // ];
}
