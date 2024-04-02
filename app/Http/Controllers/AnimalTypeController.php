<?php

namespace App\Http\Controllers;

use App\Filters\AnimalTypeFilter;
use App\Models\AnimalType;
use App\Http\Requests\StoreAnimalTypeRequest;
use App\Http\Requests\UpdateAnimalTypeRequest;
use App\Http\Resources\AnimalTypeCollection;
use App\Http\Resources\AnimalTypeResource;
use Illuminate\Http\Request;

class AnimalTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $filter = new AnimalTypeFilter();
        $queryItems = $filter->transform($req);

        $includeBreeds = $req->query('includeBreeds');

        $animalTypes = AnimalType::where($queryItems);

        if ($includeBreeds) $animalTypes = $animalTypes->with('breeds');

        return new AnimalTypeCollection($animalTypes->paginate()->appends($req->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnimalTypeRequest $req)
    {
        return new AnimalTypeResource(AnimalType::create($req->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(AnimalType $animalType)
    {
        $includeBreeds = request()->query('includeBreeds');

        if ($includeBreeds) return new AnimalTypeResource($animalType->loadMissing('breeds'));

        return new AnimalTypeResource($animalType);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnimalType $animalType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnimalTypeRequest $req, AnimalType $animalType)
    {
        $animalType->update($req->all());

        return ['message' => 'Animal type updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnimalType $animalType)
    {
        $animalType->delete();

        return ['message' => 'Animal type deleted successfully'];
    }
}
