<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate input
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'redirect' => $request->input('redirect', route('index')),
            ]);
        }

        // Authentication failed
        return response()->json([
            'success' => false,
            'message' => 'Invalid username or password',
        ], 422);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
