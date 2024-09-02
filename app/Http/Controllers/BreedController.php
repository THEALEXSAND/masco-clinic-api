<?php

namespace App\Http\Controllers;

use App\Filters\BreedFilter;
use App\Models\Breed;
use App\Http\Requests\StoreBreedRequest;
use App\Http\Requests\UpdateBreedRequest;
use App\Http\Resources\BreedCollection;
use App\Http\Resources\BreedResource;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $filter = new BreedFilter();
        $queryItems = $filter->transform($req);

        $includeSpecie = $req->query('includeSpecie');

        $breeds = Breed::where($queryItems);

        if ($includeSpecie) $breeds = $breeds->with('specie');

        return new BreedCollection($breeds->paginate()->appends($req->query()));
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
    public function store(StoreBreedRequest $req)
    {
        return new BreedResource(Breed::create($req->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Breed $breed)
    {
        return new BreedResource($breed);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Breed $breed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBreedRequest $req, Breed $breed)
    {
        $breed->update($req->all());

        return response([
            'message' => 'Breed updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Breed $breed)
    {
        $breed->delete();

        return response([
            'message' => 'Breed deleted successfully'
        ]);
    }
}
