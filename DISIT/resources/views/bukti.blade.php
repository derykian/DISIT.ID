<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Bukti Pembayaran - DISIT ID</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #ffffff; color: #000000; }
        
        /* HEADER HITAM UTAMA KONSISTEN */
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

        /* CONTAINER UTAMA */
        .upload-container { max-width: 650px; margin: 60px auto; padding: 40px; border: 1px solid #ced6e0; border-radius: 8px; background-color: #ffffff; }
        .upload-main-title { font-size: 22px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 25px; text-align: center; border-bottom: 2px solid #000000; padding-bottom: 15px; }
        
        /* Box Instruksi Rekening / QRIS */
        .bank-instruction-box { background-color: #f8f9fa; border: 1px dashed #000000; border-radius: 6px; padding: 25px; margin-bottom: 30px; text-align: center; }
        .bank-badge { display: inline-block; background-color: #000000; color: #ffffff; padding: 5px 12px; font-size: 11px; font-weight: bold; border-radius: 4px; text-transform: uppercase; margin-bottom: 12px; }
        .account-number { font-size: 24px; font-weight: 900; color: #ff4757; letter-spacing: 1px; margin: 8px 0; }
        .total-amount-bold { font-size: 18px; font-weight: 800; color: #000000; margin-top: 10px; }
        
        /* Form Area Upload */
        .form-group { margin-bottom: 25px; }
        .form-group label { display: block; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #2f3542; margin-bottom: 10px; }
        .file-input-wrapper { border: 2px dashed #ced6e0; border-radius: 6px; padding: 30px; text-align: center; cursor: pointer; transition: 0.2s; position: relative; }
        .file-input-wrapper:hover { border-color: #000000; background-color: #f8f9fa; }
        .file-input-real { position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer; }
        .upload-icon { font-size: 32px; margin-bottom: 8px; display: block; }
        
        .btn-finish-transaksi { display: block; width: 100%; background-color: #000000; color: #ffffff; text-align: center; padding: 15px; border-radius: 4px; border: none; font-weight: bold; font-size: 14px; text-transform: uppercase; letter-spacing: 1px; cursor: pointer; transition: 0.3s; }
        .btn-finish-transaksi:hover { background-color: #ff4757; }
        
        .qris-placeholder-img { width: 180px; height: 180px; margin: 15px auto; display: block; border: 1px solid #ced6e0; padding: 5px; border-radius: 4px; background: #fff; }
    </style>
</head>
<body>

    @php
        $subtotal = 0;
        foreach($keranjang as $item) {
            $subtotal += $item['harga'] * $item['jumlah'];
        }
    @endphp

    <!-- HEADER KONSISTEN -->
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


    <main class="upload-container">
        <h1 class="upload-main-title">Selesaikan Pembayaran</h1>
        
        <!-- LOGIKA DILAKUKAN SECARA DINAMIS BERDASARKAN PILIHAN DI HALAMAN SEBELUMNYA -->
        <div class="bank-instruction-box">
            <span class="bank-badge">Metode Pembayaran: {{ $metodeTerpilih }}</span>
            
            @if($metodeTerpilih == 'BCA')
                <p style="font-size: 14px; color: #57606f;">Silakan transfer manual ke rekening resmi BCA kami:</p>
                <div class="account-number">8040-1234-5678</div>
                <p style="font-size: 12px; color: #747d8c;">Atas Nama: <strong>PT DISTRO DISIT INDONESIA</strong></p>
            @elseif($metodeTerpilih == 'BNI')
                <p style="font-size: 14px; color: #57606f;">Silakan transfer manual ke rekening resmi BNI kami:</p>
                <div class="account-number">0234-5678-9012</div>
                <p style="font-size: 12px; color: #747d8c;">Atas Nama: <strong>PT DISTRO DISIT INDONESIA</strong></p>
            @else
                <p style="font-size: 14px; color: #57606f;">Silakan scan kode QRIS menggunakan e-wallet Anda:</p>
                <!-- Simulasi kotak gambar barcode QRIS e-wallet -->
                <div class="qris-placeholder-img" style="display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: bold; color: #747d8c; text-transform: uppercase; background: #e4e5ea;">
                     [BARCODE QRIS DISIT]
                </div>
            @endif
            
            <div class="total-amount-bold">
                Total Tagihan: <span style="color: #ff4757;">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- Form Aksi Unggah Bukti Transaksi -->
        <form action="{{ route('transaksi.selesai') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Unggah Bukti Transfer / Screenshot Pembayaran</label>
                <div class="file-input-wrapper" id="dropzone">
                    <span class="upload-icon"></span>
                    <strong id="file-label-text" style="font-size: 14px; color: #2f3542;">Pilih berkas foto atau seret ke sini...</strong>
                    <p style="font-size: 11px; color: #a4b0be; margin-top: 4px;">Mendukung format JPG, JPEG, PNG (Maks. 2MB)</p>
                    <input type="file" name="bukti_foto" class="file-input-real" onchange="tampilkanNamaFile(this)" required>
                </div>
            </div>

            <button type="submit" class="btn-finish-transaksi">Konfirmasi & Selesaikan Transaksi</button>
        </form>
    </main>

    <script>
        // Fungsi interaktif menampilkan nama file foto yang dipilih pembeli di layar
        function tampilkanNamaFile(inputElemen) {
            const namaBerkas = inputElemen.files[0].name;
            document.getElementById('file-label-text').innerText = " Terpilih: " + namaBerkas;
            document.getElementById('dropzone').style.borderColor = "#2ed573";
            document.getElementById('dropzone').style.backgroundColor = "#f1f9f5";
        }
    </script>
</body>
</html>
