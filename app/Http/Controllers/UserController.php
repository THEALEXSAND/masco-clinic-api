<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Filters\UserFilter;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $filter = new UserFilter();
        $queryItems = $filter->transform($req);

        $includeUserType = $req->query('includeUserType');

        $users = User::where($queryItems);

        if ($includeUserType) {
            $users = $users->with('userType');
        }

        return new UserCollection($users->paginate()->appends($req->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $includeUserType = request()->query('includeUserType');

        if ($includeUserType) {
            return new UserResource($user->loadMissing('userType'));
        }

        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->noContent();
    }
}
