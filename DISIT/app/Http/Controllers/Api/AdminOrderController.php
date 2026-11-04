<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order; // Impor model database

class AdminOrderController extends Controller
{
    // Mengambil daftar rekap transaksi langsung dari MySQL
    public function index()
    {
        $orders = Order::all();
        return response()->json([
            'status' => true,
            'data' => $orders
        ], 200);
    }

    /**
     * TAMBAHKAN FUNGSI INI: Untuk menangani Checkout Pembeli
     * Menguji endpoint: POST /api/v1/orders
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk' => 'required|string',
            'total_bayar' => 'required|string',
            'nama_pembeli' => 'required|string',
        ]);

        // Menyimpan data pesanan baru langsung ke MySQL dengan mengisi bukti_transfer default
        $order = Order::create([
            'nama_pembeli' => $request->nama_pembeli,
            'produk' => $request->produk,
            'total_bayar' => $request->total_bayar,
            'status_pesanan' => 'PENDING',
            'bukti_transfer' => '-', // Mencegah error database karena kolom wajib diisi
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Pesanan (Checkout) Anda berhasil dibuat langsung di database!',
            'data' => $order
        ], 201);
    }

    // Aksi PATCH untuk mengubah status di database secara permanen
    public function validateOrder(Request $request, $id)
    {
        $request->validate([
            'status_validasi' => 'nullable|in:TERIMA,TOLAK',
            'nama_pembeli'    => 'nullable|string',
            'total_bayar'     => 'nullable|string',
            'produk'          => 'nullable|string',
        ]);

        $order = Order::find($id);

        if ($order) {
            if ($request->has('status_validasi')) {
                $order->status_pesanan = $request->status_validasi === 'TERIMA' ? 'DIPROSES' : 'DITOLAK';
            }
            
            if ($request->has('nama_pembeli')) {
                $order->nama_pembeli = $request->nama_pembeli;
            }

            if ($request->has('total_bayar')) {
                $order->total_bayar = $request->total_bayar;
            }

            if ($request->has('produk')) {
                $order->produk = $request->produk;
            }

            $order->save(); 

            return response()->json([
                'status' => true,
                'message' => "Data transaksi #{$id} berhasil diperbarui di database.",
                'data' => $order
            ], 200);
        }

        return response()->json([
            'status' => false,
            'error_code' => 'ORDER_NOT_FOUND',
            'message' => 'ID transaksi pesanan tidak ditemukan.'
        ], 404);
    }

    // [UPDATE] Mengubah data pesanan secara menyeluruh oleh Admin
    public function update(Request $request, $id)
    {
        // 1. Validasi input wajib dari Body Postman
        $request->validate([
            'nama_pembeli' => 'required|string',
            'produk' => 'required|string',
            'total_bayar' => 'required|string',
            'status_pesanan' => 'required|string',
        ]);

        // 2. Cari data pesanan berdasarkan ID di database
        $order = Order::find($id);

        if ($order) {
            // 3. Eksekusi pengubahan data secara menyeluruh
            $order->update([
                'nama_pembeli'   => $request->nama_pembeli,
                'produk'         => $request->produk,
                'total_bayar'    => $request->total_bayar,
                'status_pesanan' => $request->status_pesanan,
            ]);

            return response()->json([
                'status' => true,
                'message' => "Data transaksi pesanan #{$id} telah berhasil di-update secara menyeluruh di database.",
                'data' => $order // Mengembalikan data terbaru hasil update database
            ], 200);
        }

        // Respon jika ID pesanan tidak ditemukan di database
        return response()->json([
            'status' => false,
            'error_code' => 'ORDER_NOT_FOUND',
            'message' => 'ID transaksi pesanan tidak ditemukan.'
        ], 404);
    }
    
    /**
     * TAMBAHKAN FUNGSI INI: Untuk aksi hapus transaksi oleh Admin
     * Menguji endpoint: DELETE /api/v1/admin/orders/{id}
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->delete(); // Menghapus dari MySQL secara permanen
            return response()->json([
                'status' => true,
                'message' => "Data transaksi #{$id} telah berhasil dihapus dari database."
            ], 200);
        }

        return response()->json([
            'status' => false,
            'error_code' => 'ORDER_NOT_FOUND',
            'message' => 'ID transaksi pesanan tidak ditemukan.'
        ], 404);
    }
}
