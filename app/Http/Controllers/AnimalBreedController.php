<?php

namespace App\Http\Controllers;

use App\Filters\AnimalBreedFilter;
use App\Models\AnimalBreed;
use App\Http\Requests\StoreAnimalBreedRequest;
use App\Http\Requests\UpdateAnimalBreedRequest;
use App\Http\Resources\AnimalBreedCollection;
use App\Http\Resources\AnimalBreedResource;
use Illuminate\Http\Request;

class AnimalBreedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $filter = new AnimalBreedFilter();
        $queryItems = $filter->transform($req);

        if (count($queryItems) === 0) return new AnimalBreedCollection(AnimalBreed::paginate());
        else {
            $animalBreeds = AnimalBreed::where($queryItems)->paginate();

            return new AnimalBreedCollection($animalBreeds->appends($req->query()));
        }
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
    public function store(StoreAnimalBreedRequest $req)
    {
        return new AnimalBreedResource(AnimalBreed::create($req->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(AnimalBreed $animalBreed)
    {
        return new AnimalBreedResource($animalBreed);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnimalBreed $animalBreed)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnimalBreedRequest $req, AnimalBreed $animalBreed)
    {
        $animalBreed->update($req->all());

        return ['message' => 'Breed updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnimalBreed $animalBreed)
    {
        $animalBreed->delete();

        return ['message' => 'Breed deleted successfully'];
    }
}
