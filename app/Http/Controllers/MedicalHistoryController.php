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
        $includeVaccines = $req->query('includeVaccines');

        $medicalHistories = MedicalHistory::where($queryItems);

        if ($includeConsultations) {
            $medicalHistories = $medicalHistories->with('consultations');
        }

        if ($includeVaccines) {
            $medicalHistories = $medicalHistories->with('vaccineRecords');
        }

        return new MedicalHistoryCollection($medicalHistories->paginate()->appends($req->query()));
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
        $includeVaccines = request()->query('includeVaccines');

        if ($includeConsultations) {
            $medicalHistory->loadMissing('consultations');
        }

        if ($includeVaccines) {
            $medicalHistory->loadMissing('vaccineRecords');
        }

        return new MedicalHistoryResource($medicalHistory);
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
