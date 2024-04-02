<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use App\Http\Requests\StoreMedicalHistoryRequest;
use App\Http\Requests\UpdateMedicalHistoryRequest;
use App\Http\Resources\MedicalHistoryCollection;
use Illuminate\Http\Request;
use App\Filters\MedicalHistoryFilter;
use App\Http\Resources\MedicalHistoryResource;

class MedicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $filter = new MedicalHistoryFilter();
        $queryItems = $filter->transform($req);

        $includeConsultations = $req->query('includeConsultations');

        $medicalHistories = MedicalHistory::where($queryItems);

        if ($includeConsultations) {
            $medicalHistories = $medicalHistories->with('consultations');
        }

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
    public function show(MedicalHistory $medicalHistory)
    {
        $includeConsultations = request()->query('includeConsultations');

        if ($includeConsultations) return new MedicalHistoryResource($medicalHistory->loadMissing('consultations'));

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
        $medicalHistory->update($req->all());

        return ['message' => 'Medical History updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalHistory $medicalHistory)
    {
        $medicalHistory->delete();

        return ['message' => 'Medical History deleted successfully'];
    }
}
