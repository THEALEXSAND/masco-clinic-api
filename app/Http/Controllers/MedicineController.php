<?php

namespace App\Http\Controllers;

use App\Filters\MedicineFilter;
use App\Models\Medicine;
use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Http\Resources\MedicineCollection;
use App\Http\Resources\MedicineResource;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $filter = new MedicineFilter();

        $medicines = parent::baseIndex($req, $filter, new Medicine);

        $includeConsultations = $req->query('includeConsultations');
        if ($includeConsultations) $medicines = $medicines->with('consultations');

        return new MedicineCollection($medicines->paginate()->appends($req->query()));
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
    public function store(StoreMedicineRequest $req)
    {
        return new MedicineResource(Medicine::create($req->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine, Request $req)
    {
        $includeConsultations = $req->query('includeConsultations');
        if ($includeConsultations) $medicine = $medicine->with('consultations');

        return new MedicineResource($medicine);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicineRequest $req, Medicine $medicine)
    {
        return parent::baseUpdate($req, $medicine);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine)
    {
        return parent::baseDestroy($medicine);
    }
}
