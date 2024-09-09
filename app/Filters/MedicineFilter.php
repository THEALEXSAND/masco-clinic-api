<?php

namespace App\Filters;

class MedicineFilter extends ApiFilter
{
    protected $safeParams = [
        'id' => ['eq', 'like'],
        'genericName' => ['eq', 'like'],
        'commercialName' => ['eq', 'like'],
    ];

    protected $columnMap = [
        'genericName' => 'nombre_generic',
        'commercialName' => 'nombre_comercial',
    ];
}
