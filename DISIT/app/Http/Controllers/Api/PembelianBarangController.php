<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembelianBarangController extends Controller
{
    // Menguji endpoint: GET /api/v1/pembelian-barang
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Berhasil memuat semua riwayat pembelian barang.',
            'data' => [
                ['id' => 1, 'nama_barang' => 'Hoodie Navy', 'total_beli' => 20, 'supplier' => 'Vendor Konveksi Malang']
            ]
        ], 200);
    }

    // Menguji endpoint: POST /api/v1/pembelian-barang
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string',
            'total_beli' => 'required|integer',
            'supplier' => 'required|string',
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Transaksi pembelian barang baru berhasil dicatat untuk dimasukkan ke barang masuk!',
            'data' => [
                'id' => rand(2, 99),
                'nama_barang' => $request->nama_barang,
                'total_beli' => $request->total_beli,
                'supplier' => $request->supplier
            ]
        ], 201);
    }
}
