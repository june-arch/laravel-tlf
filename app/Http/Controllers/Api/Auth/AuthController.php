<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $token = $request->user()->createToken('AuthToken')->plainTextToken;
            $saveUser = User::where('uuid', Auth::user()->uuid)->first();
            $saveUser->remember_token = $token;
            $saveUser->save();

            return response()->json(["data" => ['token' => $token]]);
        } else {
            // Authentication failed
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    public function logout(Request $request)
    {
            $saveUser = User::where('uuid', Auth::user()->uuid)->first();
            $saveUser->remember_token = '';
            $saveUser->save();

            return response()->json(["data" => 'success logout']);
    }
}
