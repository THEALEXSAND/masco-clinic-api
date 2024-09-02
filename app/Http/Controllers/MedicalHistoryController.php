<?php

namespace App\Http\Controllers;

use App\Filters\MedicalHistoryFilter;
use App\Models\MedicalHistory;
use App\Http\Requests\StoreMedicalHistoryRequest;
use App\Http\Requests\UpdateMedicalHistoryRequest;
use App\Http\Resources\MedicalHistoryCollection;
use App\Http\Resources\MedicalHistoryResource;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $filter = new MedicalHistoryFilter();

        $medicalHistories = parent::baseIndex($req, $filter, new MedicalHistory);

        $includeConsultations = $req->query('includeConsultations');
        $includePet = $req->query('includePet');

        if ($includePet) $medicalHistories = $medicalHistories->with('pet');
        if ($includeConsultations) $medicalHistories = $medicalHistories->with('consultations');

        return new MedicalHistoryCollection($medicalHistories->paginate()->appends($req->query()));
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
    public function store(StoreMedicalHistoryRequest $req)
    {
        return new MedicalHistoryResource(MedicalHistory::create($req->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalHistory $medicalHistory, Request $req)
    {
        $includePet = $req->query('includePet');
        $includeConsultations = $req->query('includeConsultations');

        if ($includePet) $medicalHistory = $medicalHistory->loadMissing('pet');
        if ($includeConsultations) $medicalHistory = $medicalHistory->loadMissing('consultations');

        return new MedicalHistoryResource($medicalHistory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalHistory $medicalHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicalHistoryRequest $req, MedicalHistory $medicalHistory)
    {
        return parent::baseUpdate($req, $medicalHistory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalHistory $medicalHistory)
    {
        return parent::baseDestroy($medicalHistory);
    }
}
