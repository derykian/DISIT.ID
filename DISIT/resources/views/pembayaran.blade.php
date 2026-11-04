<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metode Pembayaran - DISIT ID</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #ffffff; color: #000000; }
        
        /* HEADER HITAM UTAMA (Konsisten Sesuai Halaman Keranjang) */
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

        /* CONTAINER UTAMA PEMBAYARAN */
        .pay-container { max-width: 1200px; margin: 50px auto; padding: 0 40px; }
        .pay-title-brand { font-size: 14px; font-weight: bold; color: #747d8c; letter-spacing: 1px; margin-bottom: 5px; }
        .pay-main-title { font-size: 26px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 30px; border-bottom: 2px solid #000000; padding-bottom: 10px; }
        
        .pay-content { display: flex; gap: 50px; align-items: flex-start; }
        
        /* Area Pilihan Metode (Sisi Kiri) */
        .payment-methods-area { flex-grow: 1; }
        .method-group { margin-bottom: 25px; }
        .method-group h4 { font-size: 13px; font-weight: 800; letter-spacing: 1px; color: #747d8c; text-transform: uppercase; margin-bottom: 12px; }
        
        /* Opsi Kotak List Pilihan */
        .method-option { display: flex; align-items: center; justify-content: space-between; border: 1px solid #ced6e0; padding: 16px 20px; border-radius: 6px; margin-bottom: 12px; cursor: pointer; transition: 0.2s; background: #ffffff; }
        .method-option:hover { border-color: #000000; background-color: #f8f9fa; }
        .method-option.selected { border-color: #000000; background-color: #f1f2f6; box-shadow: inset 0 0 0 1px #000000; }
        
        .option-left { display: flex; align-items: center; gap: 15px; }
        .option-radio { width: 18px; height: 18px; accent-color: #000000; cursor: pointer; }
        .option-text h5 { font-size: 15px; font-weight: 700; color: #000000; }
        .option-text p { font-size: 12px; color: #747d8c; margin-top: 2px; }
        
        /* Ringkasan Belanja Kanan */
        .summary-side-box { width: 400px; background-color: #f8f9fa; border: 1px solid #e1e8ed; border-radius: 6px; padding: 25px; }
        .summary-side-title { font-size: 16px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 20px; color: #000000; border-bottom: 1px solid #ced6e0; padding-bottom: 10px; }
        .row-calc { display: flex; justify-content: space-between; font-size: 14px; color: #57606f; margin-bottom: 12px; }
        .total-calc { display: flex; justify-content: space-between; font-size: 17px; font-weight: bold; color: #000000; margin-top: 15px; padding-top: 15px; border-top: 1px dashed #ced6e0; }
        
        .btn-pay-now { display: block; width: 100%; background-color: #000000; color: #ffffff; text-align: center; padding: 15px; border-radius: 4px; border: none; font-weight: bold; font-size: 14px; text-transform: uppercase; letter-spacing: 1px; margin-top: 25px; cursor: pointer; transition: 0.3s; text-decoration: none; }
        .btn-pay-now:hover { background-color: #ff4757; }
        .btn-back { display: inline-block; color: #747d8c; text-decoration: none; font-size: 14px; font-weight: 600; margin-top: 20px; }
        .btn-back:hover { color: #000000; }
    </style>
</head>
<body>

    @php
        $subtotal = 0;
        foreach($keranjang as $item) {
            $subtotal += $item['harga'] * $item['jumlah'];
        }
    @endphp

    <!-- HEADER HITAM UTAMA KONSISTEN -->
    <!-- NAVBAR KUNCI STATIS (KONSISTEN DIAM DI TEMPAT & TOMBOL LOGOUT MERAH) -->
<nav>
    <!-- Sisi Kiri: Logo Brand -->
    <a href="/" class="nav-logo">
        <img src="{{ asset('logo.png') }}" alt="Logo DISIT ID" style="height: 40px; width: auto; object-fit: contain; display: block;">
    </a>

    <!-- Sisi Kanan: Menu Navigasi Berurutan Sesuai Halaman Lain -->
    <div class="nav-user" style="display: flex; align-items: center;">
        @if (Route::has('login'))
            @auth
                <!-- 1. Menu HOME -->
                <a href="/" style="color: #ffffff; text-decoration: none; font-size: 14px; font-weight: 600; margin-right: 25px; line-height: 1;">HOME</a>

                <!-- 2. Ikon KERANJANG Belanja -->
                <a href="{{ route('keranjang') }}" style="text-decoration: none; display: flex; align-items: center; gap: 8px; margin-right: 25px; line-height: 1;">
                    <img src="{{ asset('cart.png') }}" alt="Cart" style="height: 20px; width: auto; object-fit: contain; filter: brightness(0) invert(1); display: block;">
                    <span style="color: #a4b0be; font-size: 14px; font-weight: 600;">({{ count(session()->get('cart', [])) }})</span>
                </a>

                <!-- 3. Ikon AKUN (Mengarah ke Halaman Akun Terpadu) -->
                <a href="{{ route('akun') }}" style="text-decoration: none; display: flex; align-items: center; margin-right: 8px; line-height: 1;">
                    <img src="{{ asset('akun.png') }}" alt="Akun" style="height: 20px; width: auto; object-fit: contain; filter: brightness(0) invert(1); display: block;">
                </a>
                
                <!-- 4. Tampilan Nama Pengguna & Tombol Keluar Merah Konsisten -->
                <span class="user-name" style="margin-right: 15px; color: #ffffff; font-size: 14px; font-weight: 600; line-height: 1; display: flex; align-items: center;">{{ Auth::user()->name }}</span>
                
                <form method="POST" action="{{ route('logout') }}" style="display: flex; align-items: center; margin: 0; padding: 0;">
                    @csrf
                    <button type="submit" style="background-color: #ff4757; color: #ffffff; border: none; padding: 8px 16px; font-size: 12px; font-weight: bold; border-radius: 4px; cursor: pointer; line-height: 1; height: 32px; display: flex; align-items: center; justify-content: center; box-sizing: border-box; transition: 0.2s;" onmouseover="this.style.backgroundColor='#ff6b81';" onmouseout="this.style.backgroundColor='#ff4757';">Keluar</button>
                </form>
            @else
                <!-- Tampilan Jika Belum Login -->
                <a href="{{ route('login') }}" style="color: #ffffff; text-decoration: none; font-size: 14px; font-weight: 600; margin-right: 10px; line-height: 1;">Login Masuk</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" style="background-color: #ff4757; color: #ffffff; text-decoration: none; padding: 8px 16px; font-size: 12px; font-weight: bold; border-radius: 4px; line-height: 1;">Daftar Akun</a>
                @endif
            @endauth
        @endif
    </div>
</nav>

    <main class="pay-container">
        <div class="pay-title-brand">DISIT ID</div>
        <h1 class="pay-main-title">Metode Pembayaran</h1>
        
        <!-- Perbaikan Aksi Form Menuju Langkah 9 Akhir (Upload Bukti) -->
        <form action="{{ route('bukti.proses') }}" method="POST">
            @csrf
            <div class="pay-content">
                
                <!-- KIRI: Daftar Opsi Pembayaran -->
                <div class="payment-methods-area">
                    
                    <div class="method-group">
                        <h4>Transfer Bank (Manual/Verifikasi)</h4>
                        
                        <div class="method-option selected" onclick="pilihMetode(this)">
                            <div class="option-left">
                                <input type="radio" name="payment_method" value="BCA" class="option-radio" checked>
                                <div class="option-text">
                                    <h5>Bank Central Asia (BCA)</h5>
                                    <p>Transfer manual ke Rek: 8040-XXXX-XXXX a/n DISIT ID</p>
                                </div>
                            </div>
                        </div>

                        <div class="method-option" onclick="pilihMetode(this)">
                            <div class="option-left">
                                <input type="radio" name="payment_method" value="BNI" class="option-radio">
                                <div class="option-text">
                                    <h5>Bank Negara Indonesia (BNI)</h5>
                                    <p>Transfer manual ke Rek: 0234-XXXX-XXXX a/n DISIT ID</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="method-group">
                        <h4>E-Wallet & QRIS Instan</h4>
                        
                        <div class="method-option" onclick="pilihMetode(this)">
                            <div class="option-left">
                                <input type="radio" name="payment_method" value="QRIS" class="option-radio">
                                <div class="option-text">
                                    <h5>QRIS (Gopay / OVO / Dana / LinkAja)</h5>
                                    <p>Scan kode QR otomatis menggunakan aplikasi e-wallet Anda</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('formulir') }}" class="btn-back">← Kembali ke Form Alamat</a>
                </div>
                
                <!-- KANAN: Total Akhir yang Harus Dibayar -->
                <div class="summary-side-box">
                    <h3 class="summary-side-title">Ringkasan Pembayaran</h3>
                    
                    <div class="row-calc">
                        <span>Total Belanja</span>
                        <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="row-calc">
                        <span>Ongkos Kirim</span>
                        <span style="color: #2ed573; font-weight: bold;">Gratis</span>
                    </div>
                    
                    <div class="total-calc">
                        <span>Total Tagihan</span>
                        <span style="color: #ff4757;">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    
                    <button type="submit" class="btn-pay-now">Lanjut Pembayaran</button>
                </div>
                
            </div>
        </form>
    </main>

    <script>
        function pilihMetode(elemenKotak) {
            document.querySelectorAll('.method-option').forEach(opt => {
                opt.classList.remove('selected');
                opt.querySelector('.option-radio').checked = false;
            });
            
            elemenKotak.classList.add('selected');
            elemenKotak.querySelector('.option-radio').checked = true;
        }
    </script>
</body>
</html>
