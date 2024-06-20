<?php

namespace App\Filters;

class ConsultationFilter extends ApiFilter
{
    protected $safeParams = [
        'medicalHistoryId' => ['eq'],
        'motivo' => ['eq'],
        'description' => ['eq'],
        'receta' => ['eq'],
        'tratamiento' => ['eq'],
        'diagnostico' => ['eq'],
    ];

    protected $columnMap = [
        'medicalHistoryId' => 'medical_history_id',
    ];
}
