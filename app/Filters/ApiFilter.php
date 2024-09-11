<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter
{
    protected $safeParams = [];
    protected $columnMap = [];

    protected $operatorMap = [
        'eq' => '=',
        'like' => 'LIKE',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
    ];

    public function transformParam(string $param)
    {
        return $this->columnMap[$param] ?? head(array_keys($this->safeParams));
    }

    public function transform(Request $req)
    {
        $eloQuery = [];

        foreach ($this->safeParams as $param => $operators) {
            $query = $req->query($param);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$param] ?? $param;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}
