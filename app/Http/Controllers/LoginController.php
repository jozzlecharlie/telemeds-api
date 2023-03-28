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

        $user = User::where('email', $validated['email'])->first();

        // if(!$user){
        //     return response()->json([
        //         'message' => 'User not found'
        //     ], 404);
        // }

        if ($user && Hash::check($validated['password'], $user->password)) {
            $user->token = $user->createToken('auth_token')->plainTextToken;
            return response()->json($user);
        }

        if(!Hash::check($validated['password'],$user->password)){
                 return response()->json(['message' => 'Invalid password'], 401);
        }

        //  return response()->json(['error' => 'Invalid credentials'], 401);
        $token = $user->createToken('auth_token')
            ->plainTextToken;

        $user->token = $token;
        return response()->json($user);
    }
}
