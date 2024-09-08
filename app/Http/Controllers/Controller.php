<?php

namespace App\Http\Controllers;

use App\Filters\ApiFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

abstract class Controller
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected static $modelRef;

    protected function baseIndex(Request $request, ApiFilter $filter, Model $modelRef)
    {
        $queryItems = $filter->transform($request);

        $collection = $modelRef::where($queryItems);

        $orderBy = $request->query('orderBy');

        if ($orderBy) $collection = $collection->orderBy($filter->transformParam($orderBy));

        return $collection;
    }

    protected function baseUpdate(FormRequest $updateRequest, Model $model)
    {
        $model->update($updateRequest->all());

        return response([
            'message' => $model::class . ' updated successfully',
        ]);
    }


    protected function baseDestroy(Model $model)
    {
        $isDeleted = $model->delete();

        if (!$isDeleted) return response([
            'message' => 'Error deteling ' . $model::class
        ], 404);

        return response([
            'message' => $model::class . ' deleted successfully'
        ]);
    }
}
