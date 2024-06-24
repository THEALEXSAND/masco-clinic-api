<?php

// App\Filters\RecipeFilter.php

namespace App\Filters;

use Illuminate\Http\Request;

class RecipeFilter extends ApiFilter
{
    protected $safeParams = [
        'consulta_id' => ['eq'],
        'medicamento_id' => ['eq'],
        'cantidad' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'indicaciones' => ['eq'],
    ];

    protected $columnMap = [
        // No need for column mapping in this case, but if your query params
        // are different from your database columns, you can map them here.
    ];

    // Additional methods if needed...
}

