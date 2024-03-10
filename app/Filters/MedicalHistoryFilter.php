<?php

namespace App\Filters;

use App\Filters\ApiFilter;

class MedicalHistoryFilter extends ApiFilter
{
    protected $safeParams = [
        'petId' => ['eq'],
        'observacion' => ['eq'],
    ];

    protected $columnMap = [
        'petId' => 'pet_id',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
    ];
}
