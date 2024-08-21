<?php

namespace App\Filters;

class SpecieFilter extends ApiFilter
{
    protected $safeParams = [
        'id' => ['eq', 'like'],
        'name' => ['eq', 'like']
    ];

    protected $columnMap = [
        'name' => 'nombre'
    ];
}
