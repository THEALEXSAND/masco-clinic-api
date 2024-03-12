<?php

namespace App\Http\Controllers;

use App\Models\AnimalType;
use App\Http\Requests\StoreAnimalTypeRequest;
use App\Http\Requests\UpdateAnimalTypeRequest;
use App\Http\Resources\AnimalTypeCollection;

class AnimalTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new AnimalTypeCollection(AnimalType::all());
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AnimalType $animalType)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnimalType $animalType)
    {
        //
    }
}
