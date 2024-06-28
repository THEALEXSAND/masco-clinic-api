<?php

namespace App\Http\Controllers;

use App\Models\VaccineRecord;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVaccineRecordRequest;
use App\Http\Requests\UpdateVaccineRecordRequest;
use App\Http\Resources\VaccineRecordCollection;
use App\Http\Resources\VaccineRecordResource;
use App\Filters\VaccineRecordFilter;
use Illuminate\Support\Facades\Log;

class VaccineRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $filter = new VaccineRecordFilter();
        $queryItems = $filter->transform($req);

        $vaccineRecords = VaccineRecord::where($queryItems);

        return new VaccineRecordCollection($vaccineRecords->paginate()->appends($req->query()));
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
        try {
            return new VaccineRecordResource($vaccineRecord);
        } catch (\Exception $e) {
            Log::error('Error fetching vaccine record: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching vaccine record'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVaccineRecordRequest $request, VaccineRecord $vaccineRecord)
    {
        try {
            $vaccineRecord->update($request->all());
            return ['message' => 'Vaccine record updated successfully'];
        } catch (\Exception $e) {
            Log::error('Error updating vaccine record: ' . $e->getMessage());
            return response()->json(['error' => 'Error updating vaccine record'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VaccineRecord $vaccineRecord)
    {
        try {
            $vaccineRecord->delete();
            return ['message' => 'Vaccine record deleted successfully'];
        } catch (\Exception $e) {
            Log::error('Error deleting vaccine record: ' . $e->getMessage());
            return response()->json(['error' => 'Error deleting vaccine record'], 500);
        }
    }
}
