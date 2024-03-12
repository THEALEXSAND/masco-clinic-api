<?php

namespace App\Filters;

class ConsultationFilter extends ApiFilter
{
    protected $safeParams = [
        'medicalHistoryId' => ['eq'],
        'description' => ['eq'],
        'receta' => ['eq'],
        'tratamiento' => ['eq'],
    ];

    protected $columnMap = [
        'medicalHistoryId' => 'medical_history_id',
    ];
}
