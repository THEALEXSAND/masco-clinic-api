<?php

namespace App\Http\Controllers;

use App\Filters\VaccineRecordFilter;
use App\Models\VaccineRecord;
use App\Http\Requests\StoreVaccineRecordRequest;
use App\Http\Requests\UpdateVaccineRecordRequest;
use App\Http\Resources\VaccineRecordCollection;
use App\Http\Resources\VaccineRecordResource;
use Illuminate\Http\Request;

class VaccineRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $filter = new VaccineRecordFilter();

        $vaccines = parent::baseIndex($req, $filter, new VaccineRecord);

        $includePet = $req->query('includePet');
        if ($includePet) $vaccines = $vaccines->with('medicalHistory.pet');

        return new VaccineRecordCollection($vaccines->paginate()->appends($req->query()));
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
    public function store(StoreVaccineRecordRequest $req)
    {
        return new VaccineRecordResource(VaccineRecord::create($req->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(VaccineRecord $vaccineRecord, Request $req)
    {
        $includePet = $req->query('includePet');
        if ($includePet) $vaccineRecord = $vaccineRecord->with('medicalHistory.pet');

        return new VaccineRecordResource($vaccineRecord);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VaccineRecord $vaccineRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVaccineRecordRequest $req, VaccineRecord $vaccineRecord)
    {
        return parent::baseUpdate($req, $vaccineRecord);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VaccineRecord $vaccineRecord)
    {
        return parent::baseDestroy($vaccineRecord);
    }
}
