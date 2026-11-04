<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Pastikan Model User di-import

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input JSON dari Postman
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 1. Cari user berdasarkan email di database
        $user = User::where('email', $request->email)->first();

        // 2. Validasi apakah user ada dan password-nya cocok
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'error_code' => 'AUTH_INVALID_CREDENTIALS',
                'message' => 'Email atau password yang Anda masukkan salah.'
            ], 401);
        }

        // 3. Tembak token Sanctum resmi ke database
        $token = $user->createToken('auth_token')->plainTextToken;

        // Respon sukses mengembalikan token asli
        return response()->json([
            'status' => true,
            'token' => $token,
            'user' => [
                'name' => $user->name,
                'role' => $user->role
            ]
        ], 200);
    }

    public function register(Request $request)
    {
        // 1. Validasi Input JSON dari Postman
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // 2. Buat User Baru di Database (Secara default rolenya 'customer')
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer', 
        ]);

        // 3. Tembak Token Sanctum Resmi untuk User Baru
        $token = $user->createToken('auth_token')->plainTextToken;

        // 4. Kembalikan Respon Sukses Beserta Token Registrasi
        return response()->json([
            'status' => true,
            'message' => 'Registrasi akun baru berhasil!',
            'token' => $token,
            'user' => [
                'name' => $user->name,
                'role' => $user->role
            ]
        ], 201);
    }
    public function updateProfile(Request $request)
{
    // 1. Ambil data user yang saat ini sedang login menggunakan token Bearer
    $user = $request->user();

    // 2. Validasi data input dari Postman
    $request->validate([
        'name' => 'required|string|max:255',
        // Jika Anda memiliki kolom phone di database, Anda bisa memvalidasinya di sini
    ]);

    // 3. Update data user
    $user->update([
        'name' => $request->name,
    ]);

    // 4. Kembalikan respons sukses berupa JSON
    return response()->json([
        'status' => true,
        'message' => 'Profil biodata pribadi Anda berhasil diperbarui!',
        'data' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role
        ]
    ], 200);
}

}
