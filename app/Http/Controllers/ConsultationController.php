<?php

namespace App\Http\Controllers;

use App\Filters\ConsultationFilter;
use App\Models\Consultation;
use App\Http\Requests\StoreConsultationRequest;
use App\Http\Requests\UpdateConsultationRequest;
use App\Http\Resources\ConsultationCollection;
use App\Http\Resources\ConsultationResource;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $filter = new ConsultationFilter();

        $consultations = parent::baseIndex($req, $filter, new Consultation);

        $orderByLatest = $req->query('latest');
        $includeUser = $req->query('includeUser');
        $includePet = $req->query('includePet');

        if ($orderByLatest) $consultations = $consultations->latest('id');
        if ($includeUser) $consultations = $consultations->with('user');
        if ($includePet) $consultations = $consultations->with('medicalHistory.pet');

        return new ConsultationCollection($consultations->paginate()->appends($req->query()));
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
    public function store(StoreConsultationRequest $req)
    {
        return new ConsultationResource(Consultation::create($req->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation, Request $req)
    {
        $includeUser = $req->query('includeUser');
        $includePet = $req->query('includePet');

        if ($includeUser) $consultation = $consultation->loadMissing('user');
        if ($includePet) $consultation = $consultation->loadMissing('medicalHistory.pet');

        return new ConsultationResource($consultation);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsultationRequest $req, Consultation $consultation)
    {
        return parent::baseUpdate($req, $consultation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultation $consultation)
    {
        return parent::baseDestroy($consultation);
    }
}
