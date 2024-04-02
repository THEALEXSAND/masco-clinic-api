<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Http\Resources\PetCollection;
use Illuminate\Http\Request;
use App\Filters\PetFilter;
use App\Http\Requests\BulkStorePetRequest;
use App\Http\Resources\PetResource;
use Illuminate\Support\Arr;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $filter = new PetFilter();
        $queryItems = $filter->transform($req);

        $includeHistory = $req->query('includeHistory');

        $pets = Pet::where($queryItems);

        if ($includeHistory) {
            $pets = $pets->with('medicalHistory');
        }

        return new PetCollection($pets->paginate()->appends($req->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store an array of newly created resources in storage.
     */
    public function bulkStore(BulkStorePetRequest $req)
    {
        try {
            $bulk = collect($req->all())->map(function ($arr, $key) {
                return Arr::except($arr, ['customerId', 'tipoAnimal']);
            });
    
            Pet::insert($bulk->toArray());
    
            return response()->json(['message' => 'Pets created successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating pets: ' . $e->getMessage()], 500);
        }
    }
     

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        $includeHistory = request()->query('includeHistory');

        if ($includeHistory) return new PetResource($pet->loadMissing('medicalHistory'));

        return new PetResource($pet);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetRequest $req, Pet $pet)
    {
        $pet->update($req->all());

        return ['message' => 'Pet updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();

        return ['message' => 'Pet deleted successfully'];
    }
}
