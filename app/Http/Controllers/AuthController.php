<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('correo', $request->input('email'))->first();

        $isPasswordValid = Hash::check($request->input('password'), $user->contraseña);

        if (! $user || ! $isPasswordValid) {
            return response([
                'message' => __('auth.failed'),
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }
}
