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

        if (count($queryItems) === 0) return new MedicalHistoryCollection(MedicalHistory::paginate());
        else {
            $medicalHistory = MedicalHistory::where($queryItems)->paginate();
            return new MedicalHistoryCollection($medicalHistory->appends($req->query()));
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
    public function store(StoreMedicalHistoryRequest $req)
    {
        return new MedicalHistoryResource(MedicalHistory::create($req->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalHistory $medicalHistory)
    {
        //
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
    public function update(UpdateMedicalHistoryRequest $request, MedicalHistory $medicalHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalHistory $medicalHistory)
    {
        //
    }
}
