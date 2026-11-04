<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ==========================================================
// 1. ALUR KATALOG & PILIH VARIAN (Langkah 1, 4 & 5 Flowchart)
// ==========================================================

// Halaman Utama Distro & Katalog Utama
Route::get('/', function () {
    return view('home');
})->name('home');

// Halaman Pilih Varian / Detail Produk secara Dinamis
Route::get('/detail/{produk}', function ($produk) {
    return view('detail', ['produk' => $produk]);
})->name('detail');


// ==========================================================
// 2. LOGIKA UTAMA SESSION KERANJANG BELANJA & CHECKOUT
// ==========================================================

// Tampilan Halaman Keranjang Belanja Dinamis (Murni Menampilkan Antrean Barang)
Route::get('/keranjang', function () {
    $keranjang = session()->get('cart', []);
    return view('keranjang', compact('keranjang'));
})->name('keranjang');

// Aksi Tambah Barang ke Keranjang (Langsung Balik Otomatis ke Katalog Utama)
Route::post('/keranjang/tambah/{produk}', function ($produk) {
    $keranjang = session()->get('cart', []);

    // Definisikan data barang berdasarkan parameter produk yang diklik pembeli
    $namaProduk = "BAJU OVERSIZE TEE MONO";
    $hargaProduk = 149000;
    $gambarProduk = "produk-kaos.png";

    if ($produk == 'hoodie') {
        $namaProduk = "HEAVYWEIGHT STREET HOODIE";
        $hargaProduk = 299000;
        $gambarProduk = "produk-hoodie.png";
    } elseif ($produk == 'tas') {
        $namaProduk = "EXCLUSIVE SLING BAG";
        $hargaProduk = 125000;
        $gambarProduk = "produk-tas.png";
    }

    // Membuat ID Unik untuk barang di dalam keranjang belanja
    $idBarang = 'item-' . $produk;

    // Masukkan data produk beserta pilihan varian ukuran & warna dari form pembeli
    $keranjang[$idBarang] = [
        'nama' => $namaProduk,
        'harga' => $hargaProduk,
        'gambar' => $gambarProduk,
        'ukuran' => request('ukuran', 'L'), 
        'warna' => request('warna', 'Hitam'), 
        'jumlah' => 1
    ];

    // Simpan data keranjang terbaru ke database session server
    session()->put('cart', $keranjang);

    // Bawa pembeli kembali ke halaman katalog utama secara otomatis
    return redirect()->route('home')->with('success', 'Produk berhasil dimasukkan ke keranjang!');
})->name('keranjang.tambah');

// Aksi Hapus Barang dari Keranjang Secara Permanen
Route::post('/keranjang/hapus/{id}', function ($id) {
    $keranjang = session()->get('cart', []);

    if(isset($keranjang[$id])) {
        unset($keranjang[$id]);
        session()->put('cart', $keranjang); 
    }

    return redirect()->route('keranjang')->with('success', 'Produk berhasil dihapus permanen!');
})->name('keranjang.hapus');

// Halaman Pengisian Formulir Alamat Pengiriman (Langkah 7 Flowchart)
Route::get('/formulir', function () {
    $keranjang = session()->get('cart', []);
    if (empty($keranjang)) {
        return redirect()->route('home')->with('error', 'Keranjang Anda masih kosong!');
    }
    return view('formulir', compact('keranjang'));
})->name('formulir');

// Halaman Pilihan Metode Pembayaran Menerima Data POST Dari Tombol Checkout (Langkah 8 Flowchart)
Route::post('/pembayaran', function () {
    $keranjang = session()->get('cart', []);
    if (empty($keranjang)) {
        return redirect()->route('home');
    }
    return view('pembayaran', compact('keranjang'));
})->name('pembayaran');

// Halaman Form Upload Bukti Pembayaran Dinamis (Langkah 9 Akhir Flowchart)
Route::post('/bukti-pembayaran', function () {
    $keranjang = session()->get('cart', []);
    if (empty($keranjang)) {
        return redirect()->route('home');
    }
    
    // Menangkap bank atau QRIS apa yang dipilih pembeli di halaman sebelumnya
    $metodeTerpilih = request('payment_method', 'BCA');
    
    return view('bukti', compact('keranjang', 'metodeTerpilih'));
})->name('bukti.proses');

// Halaman Sukses Transaksi Berhasil (Terpisah Mandiri, Mengalihkan Nota ke Memori Riwayat Session)
Route::post('/transaksi-selesai', function () {
    $keranjang = session()->get('cart', []);
    if (empty($keranjang)) {
        return redirect()->route('home');
    }

    $riwayat = session()->get('order_history', []);
    $noInvoice = 'INV/' . date('Ymd') . '/' . rand(100, 999);
    
    $riwayat[$noInvoice] = [
        'tanggal' => date('d M Y - H:i'),
        'items' => $keranjang,
        'metode' => request('payment_method', 'BCA'),
        'status' => 'Menunggu Verifikasi Admin'
    ];
    
    session()->put('order_history', $riwayat);
    session()->forget('cart');
    
    // Mengarahkan pembeli ke halaman khusus sukses bayar
    return view('transaksi-sukses', compact('noInvoice'));
})->name('transaksi.selesai');


// ==========================================================
// 3. RUTE DASHBOARD AKUN TERPADU (BIODATA & RIWAYAT TRANSAKSI)
// ==========================================================

// Pintu Masuk Dashboard Akun Utama Terpadu (Dipanggil Lewat Ikon akun.png)
Route::get('/akun', function () {
    $riwayatPesanan = session()->get('order_history', []);
    return view('akun', compact('riwayatPesanan'));
})->middleware(['auth'])->name('akun');

// Aksi Update Biodata Profil (Dialihkan balik ke halaman akun dengan pesan sukses)
Route::post('/akun/update-profil', [ProfileController::class, 'update'])
    ->middleware(['auth'])
    ->name('akun.update_profil');

// Halaman Pilih Varian / Detail Produk secara Dinamis (Mendukung Stok Sisa & Terjual)
Route::get('/detail/{produk}', function ($produk) {
    // 1. Definisikan basis data stok awal untuk masing-masing barang distro
    $stokAwal = [
        'kaos'   => ['total' => 150, 'terjual' => 84],
        'hoodie' => ['total' => 85,  'terjual' => 42],
        'tas'    => ['total' => 50,  'terjual' => 19],
    ];

    // Ambil data produk yang sesuai, jika tidak ada berikan nilai default (kaos)
    $dataStok = $stokAwal[$produk] ?? $stokAwal['kaos'];

    // 2. Hitung jumlah barang sejenis yang saat ini sedang mengantre di keranjang belanja pembeli
    $keranjang = session()->get('cart', []);
    $idBarang = 'item-' . $produk;
    $jumlahDiKeranjang = isset($keranjang[$idBarang]) ? $keranjang[$idBarang]['jumlah'] : 0;

    // 3. Kurangi stok total dengan jumlah terjual dan jumlah yang sudah dimasukkan ke keranjang
    $stokSisa = $dataStok['total'] - $dataStok['terjual'] - $jumlahDiKeranjang;
    $stokTerjual = $dataStok['terjual'];

    return view('detail', [
        'produk' => $produk,
        'stokSisa' => max(0, $stokSisa), // Memastikan nilai stok tidak pernah minus (< 0)
        'stokTerjual' => $stokTerjual
    ]);
})->name('detail');

// ==========================================================
// 4. ALUR AUTENTIKASI AKUN (LARAVEL BREEZE)
// ==========================================================

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
    ->middleware(['auth'])
    ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
