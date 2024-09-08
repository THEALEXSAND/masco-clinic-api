<?php

namespace App\Http\Controllers;

use App\Filters\AppointmentFilter;
use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Http\Resources\AppointmentCollection;
use App\Http\Resources\AppointmentResource;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $filter = new AppointmentFilter();

        $appointments = parent::baseIndex($req, $filter, new Appointment);

        $includePet = $req->query('includePet');
        $includeUser = $req->query('includeUser');

        if ($includePet) $appointments = $appointments->with('pet');
        if ($includeUser) $appointments = $appointments->with('user');

        return new AppointmentCollection($appointments->paginate()->appends($req->query()));
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
    public function store(StoreAppointmentRequest $req)
    {
        return new AppointmentResource(Appointment::create($req->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment, Request $req)
    {
        $includePet = $req->query('includePet');
        $includeUser = $req->query('includeUser');

        if ($includePet) $appointment = $appointment->loadMissing('pet');
        if ($includeUser) $appointment = $appointment->loadMissing('user');

        return new AppointmentResource($appointment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $req, Appointment $appointment)
    {
        return parent::baseUpdate($req, $appointment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        return parent::baseDestroy($appointment);
    }
}
