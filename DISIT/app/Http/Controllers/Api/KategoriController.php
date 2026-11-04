<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menguji endpoint: GET /api/v1/kategori
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Berhasil mengambil semua data kategori.',
            'data' => [
                ['id' => 1, 'nama_kategori' => 'Pakaian Pria'],
                ['id' => 2, 'nama_kategori' => 'Pakaian Wanita']
            ]
        ], 200);
    }

    // Menguji endpoint: POST /api/v1/kategori
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string',
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Kategori baru berhasil ditambahkan!',
            'data' => [
                'id' => rand(3, 99),
                'nama_kategori' => $request->nama_kategori
            ]
        ], 201);
    }
}
