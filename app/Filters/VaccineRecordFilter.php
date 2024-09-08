<?php

namespace App\Filters;

class VaccineRecordFilter extends ApiFilter
{
    protected $safeParams = [
        'id' => ['eq', 'like'],
        'medicalHistoryId' => ['eq', 'like'],
        'vaccineName' => ['eq', 'like'],
        'observation' => ['eq', 'like'],
        'applicationDate' => ['eq', 'like'],
    ];

    protected $columnMap = [
        'medicalHistoryId' => 'medical_history_id',
        'vaccineName' => 'nombre_vacuna',
        'observation' => 'observacion',
        'applicationDate' => 'fecha_aplicacion',
    ];
}
