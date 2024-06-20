<?php

namespace App\Http\Controllers;

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
    public function index(Request $request)
    {
        $medicines = Medicine::paginate()->appends($request->query());
        return new MedicineCollection($medicines);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicineRequest $request)
    {
        $medicine = Medicine::create($request->validated());
        return new MedicineResource($medicine);
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine)
    {
        return new MedicineResource($medicine);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicineRequest $request, Medicine $medicine)
    {
        $medicine->update($request->validated());
        return new MedicineResource($medicine);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return response()->noContent();
    }
}
