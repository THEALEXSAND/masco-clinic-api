<?php

namespace App\Filters;

use App\Filters\ApiFilter;

class RecipeFilter extends ApiFilter
{
    protected $safeParams = [
        'consulta_id' => ['eq'],
        'medicamento_id' => ['eq'],
        'cantidad' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'indicaciones' => ['eq'],
    ];

    protected $columnMap = [
        'consulta_id' => 'consulta_id',
        'medicamento_id' => 'medicamento_id',
    ];
}
