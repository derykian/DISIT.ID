<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewApiController extends Controller
{
    // Mengambil daftar ulasan produk (Untuk GET)
    public function index($product_id)
    {
        return response()->json([
            'status' => true,
            'message' => "Berhasil memuat ulasan untuk produk ID #{$product_id}",
            'data' => []
        ], 200);
    }

    // Menerima masukan ulasan baru pembeli (Untuk POST sesuai gambar Anda)
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'komentar' => 'required|string',
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Ulasan Anda berhasil dikirim! Menunggu persetujuan sistem.'
        ], 200);
    }
        // [UPDATE] Mengubah ulasan yang sudah pernah ditulis oleh Pembeli
        public function update(Request $request, $id)
        {
            $request->validate([
                'rating' => 'required|integer|between:1,5',
                'komentar' => 'required|string',
            ]);
    
            return response()->json([
                'status' => true,
                'message' => "Ulasan ID #{$id} berhasil diperbarui oleh pelanggan!",
                'updated_data' => $request->all()
            ], 200);
        }
    
}
