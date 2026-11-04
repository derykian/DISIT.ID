<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    // Menguji endpoint: GET /api/v1/barang-masuk
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Berhasil mengambil semua data barang masuk.',
            'data' => [
                ['id' => 1, 'nama_barang' => 'Kaos Oversize Black', 'jumlah' => 50, 'kategori_id' => 96]
            ]
        ], 200);
    }

    // Menguji endpoint: POST /api/v1/barang-masuk
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string',
            'jumlah' => 'required|integer',
            'kategori_id' => 'required|integer'
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Data sediaan barang masuk berhasil direkam ke gudang!',
            'data' => [
                'id' => rand(2, 99),
                'nama_barang' => $request->nama_barang,
                'jumlah' => $request->jumlah,
                'kategori_id' => $request->kategori_id
            ]
        ], 201);
    }
}
