<?php

namespace App\Filters;

class AnimalTypeFilter extends ApiFilter
{
    protected $safeParams = [
        'tipo' => ['eq'],
    ];
}
