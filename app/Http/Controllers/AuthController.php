<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('correo', $request->input('email'))->first();

        $isPasswordValid = Hash::check($request->input('password'), $user->contraseña);

        if (! $user || ! $isPasswordValid) {
            return response()->json([
                'message' => __('auth.failed'),
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => new UserResource($user),
        ]);
    }

    public function user(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'user' => new UserResource($user),
        ]);
    }
}
