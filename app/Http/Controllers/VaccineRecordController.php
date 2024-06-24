<?php

namespace App\Http\Controllers;

use App\Models\VaccineRecord;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVaccineRecordRequest;
use App\Http\Requests\UpdateVaccineRecordRequest;
use App\Http\Resources\VaccineRecordCollection;
use App\Http\Resources\VaccineRecordResource;

class VaccineRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $vaccineRecords = VaccineRecord::paginate()->appends($request->query());
        return new VaccineRecordCollection($vaccineRecords);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVaccineRecordRequest $request)
    {
        
        return new VaccineRecordResource(VaccineRecord::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(VaccineRecord $vaccineRecord)
    {
        return new VaccineRecordResource($vaccineRecord);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVaccineRecordRequest $request, VaccineRecord $vaccineRecord)
    {
        $vaccineRecord->update($request->validated());
        return new VaccineRecordResource($vaccineRecord);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VaccineRecord $vaccineRecord)
    {
        $vaccineRecord->delete();
        return response()->noContent();
    }
}
