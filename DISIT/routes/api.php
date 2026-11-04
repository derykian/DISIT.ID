<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AdminOrderController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ReviewApiController;

/*
|--------------------------------------------------------------------------
| API Routes - DISIT.ID Core System (Version 1) - 100% FULL RESTFUL CRUD
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {

    // ==========================================
    // 1. JALUR AKSES PUBLIK (TANPA TOKEN LOGIN)
    // ==========================================
    
    // Otentikasi Masuk & Daftar Akun Baru
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/auth/register', [AuthController::class, 'register']);

    // [READ - ALL & DETAIL] Katalog Produk Publik
    Route::get('/products', [ProductApiController::class, 'index']);
    Route::get('/products/{slug}', [ProductApiController::class, 'show']);
    Route::get('/products/{slug}/stock', [ProductApiController::class, 'checkStock']);

    // [READ] Melihat Ulasan Produk
    Route::get('/reviews/{product_id}', [ReviewApiController::class, 'index']);


    // ==========================================
    // 2. JALUR PROTEKSI TOKEN (BEARER TOKEN REQUIRED)
    // ==========================================
    Route::middleware('auth:sanctum')->group(function () {
        
        // --- HAK AKSES LEVEL: PEMBELI (CUSTOMER) ---
        
        // [UPDATE] Mengubah profil biodata pribadi pelanggan
        Route::put('/profile/update', [AuthController::class, 'updateProfile']);

        // --- FULL CRUD ULASAN (REVIEWS) OLEH PEMBELI ---
        // [CREATE] Mengirimkan komentar review baru
        Route::post('/reviews', [ReviewApiController::class, 'store']);
        // [UPDATE] Mengubah/mengedit isi ulasan yang pernah ditulis (DISEDIAKAN)
        Route::put('/reviews/{id}', [ReviewApiController::class, 'update']); 
        // [DELETE] Menghapus ulasan milik sendiri jika batal/salah tulis
        Route::delete('/reviews/{id}', [ReviewApiController::class, 'destroy']);

        // --- MANAJEMEN PESANAN OLEH PEMBELI ---
        // [CREATE] Membuat pesanan belanja baru (Checkout)
        Route::post('/orders', [AdminOrderController::class, 'store']);


        // --- HAK AKSES LEVEL: ADMIN DISTRO ---
        Route::middleware('admin')->group(function () {
            
            // --- 100% FULL CRUD KELOLA PESANAN (ORDERS) ---
            // [READ] Menampilkan rekap seluruh pesanan pembeli untuk dashboard admin
            Route::get('/admin/orders', [AdminOrderController::class, 'index']);
            // [UPDATE - PARSIAL] Aksi menyetujui/memvalidasi status transfer bank
            Route::patch('/admin/orders/{id}/validate', [AdminOrderController::class, 'validateOrder']);
            // [UPDATE - UTUH] Mengubah isi data pesanan secara menyeluruh (DISEDIAKAN)
            Route::put('/admin/orders/{id}', [AdminOrderController::class, 'update']); 
            // [DELETE] Menghapus data transaksi atau membatalkan riwayat order pelanggan
            Route::delete('/admin/orders/{id}', [AdminOrderController::class, 'destroy']);

            // --- 100% FULL CRUD KELOLA PRODUK (PRODUCTS) ---
            // [CREATE] Menambahkan pasokan suplai barang baru ke gudang
            Route::post('/admin/products', [ProductApiController::class, 'store']);
            // [UPDATE] Mengubah detail informasi produk atau harga katalog barang
            Route::put('/admin/products/{id}', [ProductApiController::class, 'update']);
            // [DELETE] Menghapus produk dari katalog secara permanen
            Route::delete('/admin/products/{id}', [ProductApiController::class, 'destroy']);
            
        });
    });
});
