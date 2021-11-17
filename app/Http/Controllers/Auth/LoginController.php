<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function authenticate(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only(['email','password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                'message' => 'Success',
            ]);
        }

        return response()->json(
            [
                "message" =>"The given data was invalid.",
                'errors' => [
                    'email' => ['The provided credentials do not match our records.'],
                ]
            ], 422);
    }

    public function logout(Request $request): JsonResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json([
            'message' => 'Success',
        ]);
    }
}
