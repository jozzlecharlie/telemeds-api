<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $validated['email'])
            ->first();

        if(!$user){
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        if (!Hash::check($validated['password'], $user->password)) {
            return response()->json(['error' => 'Invalid Password'], 401);
        }

        $token = $user->createToken('auth_token')
            ->plainTextToken;

        $user->token = $token;
        return response()->json($user);
    }
}
