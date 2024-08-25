<?php

namespace App\Filters;

class ConsultationFilter extends ApiFilter
{
    protected $safeParams = [
        'medicalHistoryId' => ['eq', 'like'],
        'userIdCard' => ['eq', 'like'],
        'description' => ['eq', 'like'],
        'observation' => ['eq', 'like'],
        'diagnostic' => ['eq', 'like'],
    ];

    protected $columnMap = [
        'medicalHistoryId' => 'medical_history_id',
        'userIdCard' => 'user_cedula',
        'description' => 'descripcion',
        'observation' => 'observacion',
        'diagnostic' => 'diagnostico',
    ];
}
