<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request...
        $fields = $request->validate([
            'username' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'phone_no' => 'required|string',
        ]);

        $user = User::create([
            'username' => $fields['username'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'phone_no' => $fields['phone_no'],
        ]);

        $token = $user->createToken('connect_inc_token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        // Validate the request...
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where(
            'email', $fields['email'],
        ) -> first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => "Bad request"
            ], 401);
        }

        $token = $user->createToken('connect_inc_token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return $response;
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return[
            'message' => 'Logged out'
        ];
    }
}
