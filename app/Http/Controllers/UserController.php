<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserData(Request $request): JsonResponse
    {
        $user = $request->user();
        return response()->json([
            'email' => $user->email,
            'name' => $user->name
        ]);
    }
}
