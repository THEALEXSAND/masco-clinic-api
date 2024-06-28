<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\AppointmentCollection;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $includePets = $request->query('includePets');
        $includeUser = $request->query('includeUser');

        $appointments = Appointment::query();

        if ($includePets) {
            $appointments->with('mascota');
        }

        if ($includeUser) {
            $appointments->with('usuario');
        }

        return new AppointmentCollection($appointments->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        $appointment = Appointment::create($request->all());
        return new AppointmentResource($appointment);
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        $includePets = request()->query('includePets');
        $includeUser = request()->query('includeUser');

        if ($includePets) {
            $appointment->loadMissing('mascota');
        }

        if ($includeUser) {
            $appointment->loadMissing('usuario');
        }

        return new AppointmentResource($appointment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update($request->all());
        return new AppointmentResource($appointment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return response()->noContent();
    }
}
