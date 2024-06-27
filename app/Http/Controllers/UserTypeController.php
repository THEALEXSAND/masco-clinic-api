<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserTypeRequest;
use App\Http\Requests\UpdateUserTypeRequest;
use App\Http\Resources\UserTypeResource;
use App\Http\Resources\UserTypeCollection;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userTypes = UserType::all();
        return new UserTypeCollection($userTypes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserTypeRequest $request)
    {
        $userType = UserType::create($request->validated());
        return new UserTypeResource($userType);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserType $userType)
    {
        return new UserTypeResource($userType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserTypeRequest $request, UserType $userType)
    {
        $userType->update($request->validated());
        return new UserTypeResource($userType);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserType $userType)
    {
        $userType->delete();
        return response()->noContent();
    }
}
