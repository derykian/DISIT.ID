<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    // Menguji endpoint: GET /api/v1/products
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => [
                [
                    'id' => 1,
                    'name' => 'Kaos Oversize Disit Black',
                    'slug' => 'kaos-oversize',
                    'price' => 85000,
                    'stock' => 24
                ],
                [
                    'id' => 2,
                    'name' => 'Hoodie Distro Navy',
                    'slug' => 'hoodie-distro-navy',
                    'price' => 175000,
                    'stock' => 10
                ]
            ]
        ], 200);
    }

    // Menguji endpoint: GET /api/v1/products/{slug}
    public function show($slug)
    {
        return response()->json([
            'status' => true,
            'data' => [
                'id' => 1,
                'name' => 'Kaos Oversize Disit Black',
                'slug' => $slug,
                'price' => 85000,
                'stock' => 24,
                'description' => 'Bahan Cotton Combed 24s premium sangat nyaman.'
            ]
        ], 200);
    }

    // Menguji endpoint: GET /api/v1/products/{slug}/stock
    public function checkStock($slug)
    {
        return response()->json([
            'status' => true,
            'slug' => $slug,
            'current_stock' => 24,
            'status_stok' => 'In Stock'
        ], 200);
    }

    // Menguji endpoint admin: POST /api/v1/admin/products
        // Menguji endpoint admin: POST /api/v1/admin/products
        public function store(Request $request)
        {
            return response()->json([
                'status' => true,
                'message' => 'Produk baru berhasil ditambahkan ke gudang!',
                'data' => $request->all()
            ], 201); // <-- UBAH DI SINI DARI 21 MENJADI 201
        }
    
}
