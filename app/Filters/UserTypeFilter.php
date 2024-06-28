<?php

namespace App\Filters;

use App\Filters\ApiFilter;

class UserTypeFilter extends ApiFilter
{
    protected $safeParams = [
        'nombre' => ['eq'],
    ];
}
