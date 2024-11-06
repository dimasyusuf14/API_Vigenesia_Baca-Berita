<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Mencari pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Memastikan pengguna ditemukan
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        // Mencoba autentikasi pengguna
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if (!auth()->attempt($credentials)) {
            return response()->json(['success' => false, 'message' => 'Invalid Email or Password'], 401);
        }

        // Jika autentikasi berhasil, buat token
        $token = $user->createToken('auth_token')->plainTextToken;

        // Kembalikan response sukses dengan data pengguna dan token
        return response()->json([
            'success' => true,
            'data' => [
                'email' => $user->email,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ],
            'message' => 'User login successfully',
        ], 200);
    }
    public function logout(Request $request)
    {
        // Revoke the token that was used to authenticate the current user
        $request->user()->currentAccessToken()->delete();

        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'User logout successfully',
            'data' => null
        ], 200);
    }
}
