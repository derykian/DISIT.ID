<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - DISIT ID</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #ffffff; color: #000000; }
        
        /* HEADER HITAM UTAMA */
        nav { 
            background-color: #16161a; 
            padding: 15px 40px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            border-bottom: 1px solid #24242b; 
            height: 70px; 
            box-sizing: border-box;
        }
        .nav-logo { 
            display: flex;
            align-items: center;
            text-decoration: none; 
        }
        .nav-logo span { color: #ff4757; }
        .nav-user { 
            display: flex; 
            align-items: center; 
            gap: 0; 
        }
        .user-name { font-weight: 600; color: #a4b0be; font-size: 14px; }
        
        .btn-auth { display: inline-block; padding: 6px 15px; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 14px; cursor: pointer; transition: 0.3s; }
        .btn-logout { background-color: #ff4757; color: #ffffff; border: none; }
        .btn-logout:hover { background-color: #ff6b81; }

        /* CONTAINER KERANJANG */
        .cart-container { max-width: 1200px; margin: 50px auto; padding: 0 40px; }
        .cart-title { font-size: 24px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 30px; border-bottom: 2px solid #000000; padding-bottom: 10px; }
        .cart-content { display: flex; gap: 40px; align-items: flex-start; }
        
        /* Tabel Rincian Barang */
        .cart-table-area { flex-grow: 1; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #747d8c; padding-bottom: 15px; border-bottom: 1px solid #e1e8ed; }
        td { padding: 20px 0; border-bottom: 1px solid #f1f2f6; vertical-align: center; }
        
        .cart-item { display: flex; align-items: center; gap: 15px; }
        .cart-item-img { width: 80px; height: 80px; background-color: #f5f6fa; border: 1px solid #e1e8ed; border-radius: 4px; padding: 5px; }
        .cart-item-img img { width: 100%; height: 100%; object-fit: contain; }
        .cart-item-details h4 { font-size: 15px; font-weight: 700; color: #000000; }
        .cart-item-details p { font-size: 12px; color: #747d8c; margin-top: 4px; }
        
        .quantity-control { font-weight: bold; font-size: 14px; }
        .item-price { font-weight: 700; font-size: 15px; }
        
        /* Kotak Rincian Harga Pembayaran */
        .cart-summary { width: 350px; background-color: #f8f9fa; border: 1px solid #e1e8ed; border-radius: 6px; padding: 25px; }
        .summary-title { font-size: 16px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 20px; color: #000000; }
        .summary-row { display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 14px; color: #57606f; }
        .summary-total { display: flex; justify-content: space-between; margin-top: 20px; padding-top: 15px; border-top: 1px dashed #ced6e0; font-size: 16px; font-weight: bold; color: #000000; }
        
        .btn-checkout { display: block; width: 100%; background-color: #000000; color: #ffffff; text-align: center; padding: 14px; border-radius: 4px; text-decoration: none; font-weight: bold; font-size: 14px; text-transform: uppercase; letter-spacing: 1px; margin-top: 20px; transition: 0.3s; border: none; cursor: pointer; }
        .btn-checkout:hover { background-color: #ff4757; }
        
        .btn-continue { display: inline-block; color: #747d8c; text-decoration: none; font-size: 14px; font-weight: 600; margin-top: 20px; }
        .btn-continue:hover { color: #000000; }

        .btn-hapus-real { background: transparent; border: none; color: #ff4757; font-weight: bold; cursor: pointer; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; }
        .btn-hapus-real:hover { color: #ff6b81; }
        .empty-text { font-size: 15px; color: #747d8c; font-weight: 600; padding: 20px 0; }
    </style>
</head>
<body>

    @php
        // Hitung total harga item di dalam keranjang belanja
        $subtotal = 0;
        foreach($keranjang as $item) {
            $subtotal += $item['harga'] * $item['jumlah'];
        }
        $totalItem = count($keranjang);
    @endphp

    <!-- Header Hitam Utama Dinamis -->
    <nav>
    <!-- Sisi Kiri: Logo Brand Bawaan Anda -->
    <a href="/" class="nav-logo">
        <img src="{{ asset('logo.png') }}" alt="Logo DISIT ID" style="height: 40px; width: auto; object-fit: contain; display: block;">
    </a>

    <!-- Sisi Kanan: Menu Navigasi Berurutan Sesuai Request -->
    <div class="nav-user" style="display: flex; align-items: center;">
        @if (Route::has('login'))
            @auth
                <!-- 1. Menu HOME -->
                <a href="/" style="color: #ffffff; text-decoration: none; font-size: 14px; font-weight: 600; margin-right: 25px;">HOME</a>

                <!-- 2. Ikon KERANJANG Belanja (Sekaligus Berfungsi Mengakses Riwayat Pesanan) -->
                <a href="{{ route('keranjang') }}" style="text-decoration: none; display: flex; align-items: center; gap: 8px; margin-right: 25px;">
                    <img src="{{ asset('cart.png') }}" alt="Cart" style="height: 20px; width: auto; object-fit: contain; filter: brightness(0) invert(1);">
                    <span style="color: #a4b0be; font-size: 14px; font-weight: 600;">({{ count(session()->get('cart', [])) }})</span>
                </a>

                <!-- 3. Ikon AKUN Asli (Didekatkan Tepat di Samping Nama Pengguna Mengarah ke Edit Biodata) -->
                                <!-- Perbaikan rute profil.user menjadi akun -->
                                <a href="{{ route('akun') }}" style="text-decoration: none; display: flex; align-items: center; margin-right: 8px;">
                    <img src="{{ asset('akun.png') }}" alt="Akun" style="height: 20px; width: auto; object-fit: contain; filter: brightness(0) invert(1);">
                </a>

                
                <!-- 4. Tampilan Nama Pengguna & Tombol Keluar Bawaan Anda -->
                <span class="user-name" style="margin-right: 15px; color: #ffffff; font-size: 14px; font-weight: 600;">{{ Auth::user()->name }}</span>
                
                <form method="POST" action="{{ route('logout') }}" style="display: inline; margin: 0;">
                    @csrf
                    <button type="submit" class="btn-auth btn-logout">Keluar</button>
                </form>
            @else
                <!-- Tampilan Jika Belum Login Bawaan Anda -->
                <a href="{{ route('login') }}" class="btn-auth btn-login" style="margin-right: 10px;">Login Masuk</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-auth btn-register">Daftar Akun</a>
                @endif
            @endauth
        @endif
    </div>
</nav>

    <!-- Area Utama Keranjang Belanja -->
    <main class="cart-container">
        <h1 class="cart-title">Keranjang Belanja</h1>
        
        <div class="cart-content">
            <!-- Kiri: Daftar Tabel Item Baju -->
            <div class="cart-table-area">
                @if($totalItem > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th style="text-align: right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keranjang as $id => $item)
                        <tr>
                            <td>
                                <div class="cart-item">
                                    <div class="cart-item-img">
                                        <img src="{{ asset($item['gambar']) }}" alt="Baju">
                                    </div>
                                    <div class="cart-item-details">
                                        <h4>{{ $item['nama'] }}</h4>
                                        <p>Ukuran: {{ $item['ukuran'] }} | Warna: {{ $item['warna'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="quantity-control">{{ $item['jumlah'] }}x</td>
                            <td class="item-price">Rp {{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</td>
                            <td style="text-align: right;">
                                <!-- Form Hapus Resmi Mengarah ke Server Laravel -->
                                <form action="{{ route('keranjang.hapus', $id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus permanen produk ini?')">
                                    @csrf
                                    <button type="submit" class="btn-hapus-real">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p class="empty-text">Keranjang belanja Anda kosong.</p>
                @endif
                <a href="/" class="btn-continue">← Lanjut Belanja</a>
            </div>
            
            <!-- Kanan: Ringkasan Total Pembayaran -->
            <div class="cart-summary">
                <h3 class="summary-title">Ringkasan Pesanan</h3>
                <div class="summary-row">
                    <span>Subtotal Produk</span>
                    <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
                <div class="summary-row">
                    <span>Pengiriman (Ongkir)</span>
                    <span style="{{ $subtotal > 0 ? 'color: #2ed573; font-weight: bold;' : '' }}">{{ $subtotal > 0 ? 'Gratis' : 'Rp 0' }}</span>
                </div>
                <div class="summary-total">
                    <span>Total Pembayaran</span>
                    <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
                
                <!-- Perbaikan Link Tombol Menuju Halaman Langkah 7 -->
        <a href="{{ route('formulir') }}" class="btn-checkout">Lanjut Isi Formulir</a>

            </div>
        </div>
    </main>

</body>
</html>
