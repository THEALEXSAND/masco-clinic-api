<?php

namespace App\Filters;

class MedicalHistoryFilter extends ApiFilter
{
    protected $safeParams = [
        'id' => ['eq', 'like'],
        'petId' => ['eq', 'like'],
        'record' => ['eq', 'like'],
    ];

    protected $columnMap = [
        'petId' => 'pet_id',
        'record' => 'antecedentes',
    ];
}
