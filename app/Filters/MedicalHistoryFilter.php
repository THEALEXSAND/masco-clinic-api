<?php

namespace App\Filters;

use App\Filters\ApiFilter;

class MedicalHistoryFilter extends ApiFilter
{
    protected $safeParams = [
        'petId' => ['eq'],
        'antecedentes' => ['eq'],
    ];

    protected $columnMap = [
        'petId' => 'pet_id',
    ];
}
