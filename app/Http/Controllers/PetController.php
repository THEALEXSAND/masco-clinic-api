<?php

namespace App\Http\Controllers;

use App\Filters\PetFilter;
use App\Models\Pet;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Http\Resources\PetCollection;
use App\Http\Resources\PetResource;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $filter = new PetFilter();
        $queryItems = $filter->transform($req);

        $pets = Pet::where($queryItems);

        $includeHistory = $req->query('includeHistory');
        $includeAppointments = $req->query('includeAppointments');

        if ($includeHistory) $pets = $pets->with('medicalHistory');

        if ($includeAppointments) $pets = $pets->with('appointments');


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
     * Store a newly created resource in storage.
     */
    public function store(StorePetRequest $req)
    {
        return new PetResource(Pet::create($req->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet, Request $req)
    {
        $includeOwner = $req->query('includeOwner');
        $includeHistory = $req->query('includeHistory');
        $includeAppointments = $req->query('includeAppointments');

        if ($includeOwner) $pet = $pet->loadMissing('customer');

        if ($includeHistory) $pet = $pet->loadMissing('medicalHistory');

        if ($includeAppointments) $pet = $pet->loadMissing('appointments');

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

        return response([
            'message' => 'Pet updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();

        return response([
            'message' => 'Pet deleted successfully'
        ]);
    }
}
