<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah user sudah login dan memiliki kolom role bernilai 'admin'
        if ($request->user() && $request->user()->role === 'admin') {
            return $next($request);
        }

        // Tolak request dengan respon JSON jika akun yang digunakan adalah customer biasa
        return response()->json([
            'status' => false,
            'error_code' => 'AUTH_FORBIDDEN_ACCESS',
            'message' => 'Akses ditolak! Halaman ini hanya dikhususkan untuk akun Admin Distro/Inventaris.'
        ], 403);
    }
}
