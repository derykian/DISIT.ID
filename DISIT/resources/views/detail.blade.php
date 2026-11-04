@php
    // Logika otomatis membaca parameter dari URL
    $namaProduk = "BAJU OVERSIZE TEE MONO";
    $hargaProduk = "Rp 149.000";
    $gambarProduk = "produk-kaos.png";
    // Tambahkan variabel deskripsi default (untuk Kaos)
    $deskripsiProduk = "Kaos oversize premium dengan potongan rileks khas urban streetwear. Menggunakan bahan 100% Cotton Combed 24s heavy-weight yang tebal namun tetap adem, serta dilengkapi sablon Plastisol High-Density yang anti-pecah dan tahan lama.";

    if ($produk == 'hoodie') {
        $namaProduk = "HEAVYWEIGHT STREET HOODIE";
        $hargaProduk = "Rp 299.000";
        $gambarProduk = "produk-hoodie.png";
        $deskripsiProduk = "Hoodie streetwear esensial dengan potongan drop-shoulder yang tebal dan nyaman. Dibuat menggunakan material Cotton Fleece 330gsm premium yang lembut di bagian dalam, lengkap dengan kantong kangguru depan dan tali hoodie berbahan katun rajut tebal.";
    } elseif ($produk == 'tas') {
        $namaProduk = "EXCLUSIVE SLING BAG";
        $hargaProduk = "Rp 125.000";
        $gambarProduk = "produk-tas.png";
        $deskripsiProduk = "Tas selempang taktis minimalis untuk menampung barang esensial harian Anda. Menggunakan material Cordura anti-air (water-resistant) berkualitas tinggi, ritsleting YKK yang kokoh, serta strap nilon tebal yang mudah disesuaikan ukurannya.";
    }
@endphp


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Varian - DISIT ID</title>
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

        /* KONTEN DETAIL PRODUK */
        .detail-container { max-width: 1200px; margin: 50px auto; padding: 0 40px; display: flex; gap: 50px; }
        .product-image-large { width: 50%; height: 500px; background-color: #f5f6fa; border: 1px solid #e1e8ed; border-radius: 6px; overflow: hidden; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .product-image-large img { width: 100%; height: 100%; object-fit: contain; }
        
        .product-selection-info { width: 50%; display: flex; flex-direction: column; gap: 20px; }
        .product-brand { font-size: 12px; font-weight: bold; letter-spacing: 2px; color: #747d8c; text-transform: uppercase; }
        .product-title { font-size: 2.2rem; font-weight: 800; color: #000000; line-height: 1.2; }
        .product-price { font-size: 1.5rem; font-weight: bold; color: #ff4757; }
        
        .variant-section { margin-top: 10px; }
        .variant-section h4 { font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #2f3542; margin-bottom: 10px; font-weight: 700; }
        .variant-options { display: flex; gap: 10px; }
        
        .box-option { border: 1px solid #ced6e0; padding: 10px 18px; border-radius: 4px; font-size: 14px; font-weight: bold; cursor: pointer; transition: 0.2s; background: #ffffff; text-transform: uppercase; }
        .box-option:hover, .box-option.selected { border-color: #000000; background-color: #000000; color: #ffffff; }
        
        .btn-add-cart { display: block; width: 100%; max-width: 300px; background-color: #ff4757; color: white; border: none; padding: 15px; border-radius: 4px; font-size: 15px; font-weight: bold; cursor: pointer; text-align: center; text-decoration: none; transition: 0.3s; margin-top: 20px; box-shadow: 0 4px 15px rgba(255, 71, 87, 0.2); }
        .btn-add-cart:hover { background-color: #ff6b81; transform: translateY(-2px); }
        
        .btn-back { display: inline-block; color: #747d8c; text-decoration: none; font-size: 14px; font-weight: 600; margin-bottom: 20px; }
        .btn-back:hover { color: #000000; }
                /* 3. KOMPONEN ULASAN / REVIEW PRODUK */
                .reviews-wrapper { max-width: 1200px; margin: 30px auto 50px auto; padding: 0 40px; border-top: 1px solid #e1e8ed; padding-top: 40px; }
        .reviews-heading { font-size: 20px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 25px; display: flex; align-items: center; gap: 10px; }
        .reviews-heading span { font-size: 14px; color: #747d8c; font-weight: 600; }
        
        .review-card { padding: 20px 0; border-bottom: 1px solid #f1f2f6; display: flex; flex-direction: column; gap: 8px; }
        .review-header { display: flex; justify-content: space-between; align-items: center; }
        .review-user-info { display: flex; align-items: center; gap: 10px; }
        .review-avatar { width: 32px; height: 32px; background-color: #f5f6fa; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 12px; color: #2f3542; border: 1px solid #ced6e0; }
        .review-name { font-size: 14px; font-weight: 700; color: #2f3542; }
        .review-date { font-size: 12px; color: #a4b0be; }
        
        .stars-container { color: #ffa502; font-size: 14px; }
        .review-text { font-size: 14px; color: #57606f; line-height: 1.5; padding-left: 42px; }
        .review-variant-badge { font-size: 11px; font-weight: bold; background-color: #f1f2f6; color: #747d8c; padding: 3px 8px; border-radius: 3px; margin-left: 42px; width: fit-content; text-transform: uppercase; }

                /* 4. FORM INPUT ULASAN MODEREN STYLE SHOPEE */
                .add-review-box { background-color: #f8f9fa; border: 1px solid #e1e8ed; border-radius: 8px; padding: 25px; margin-bottom: 35px; }
        .add-review-title { font-size: 14px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 15px; color: #16161a; }
        .rating-select-group { display: flex; align-items: center; gap: 15px; margin-bottom: 15px; }
        .rating-stars-input { display: flex; flex-direction: row-reverse; gap: 5px; }
        .rating-stars-input input { display: none; }
        .rating-stars-input label { font-size: 22px; color: #ced6e0; cursor: pointer; transition: 0.2s; }
        .rating-stars-input input:checked ~ label, .rating-stars-input label:hover, .rating-stars-input label:hover ~ label { color: #ffa502; }
        .review-textarea { width: 100%; height: 90px; padding: 12px; border: 1px solid #ced6e0; border-radius: 4px; font-size: 13px; outline: none; resize: none; margin-bottom: 15px; font-family: inherit; }
        .review-textarea:focus { border-color: #000000; }
        .upload-photo-btn { display: inline-flex; align-items: center; gap: 8px; background-color: #ffffff; border: 1px dashed #ced6e0; padding: 8px 15px; border-radius: 4px; font-size: 12px; font-weight: bold; color: #57606f; cursor: pointer; transition: 0.2s; }
        .upload-photo-btn:hover { border-color: #ff4757; color: #ff4757; }
        .btn-submit-review { background-color: #16161a; color: #ffffff; border: none; padding: 10px 20px; font-size: 12px; font-weight: bold; border-radius: 4px; cursor: pointer; text-transform: uppercase; float: right; transition: 0.2s; }
        .btn-submit-review:hover { background-color: #ff4757; }
        
        /* Thumbnail Foto di Review List */
        .review-attached-photo { width: 70px; height: 70px; border-radius: 4px; object-fit: cover; margin-top: 8px; margin-left: 42px; border: 1px solid #e1e8ed; cursor: pointer; }

    </style>
</head>
<body>

    <!-- NAVBAR KUNCI STATIS DIAM DI TEMPAT -->
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

    <!-- KONTEN HALAMAN UTAMA DETAIL PRODUK -->
    <div class="detail-container">
        
        <!-- Sisi Kiri: Gambar Baju -->
        <div class="product-image-large">
            <img src="{{ asset($gambarProduk) }}" alt="{{ $namaProduk }}">
        </div>
        
        <!-- Sisi Kanan: Panel Form Varian & Stok -->
        <div class="product-selection-info">
            <a href="/" class="btn-back">← Kembali ke HOME</a>
            
            <span class="product-brand">DISIT ID</span>
            <h1 class="product-title">{{ $namaProduk }}</h1>
            <div class="product-price">{{ $hargaProduk }}</div>
            
            <!-- KOTAK MONITORING STOK DINAMIS (SUDAH DI PINDAHKAN KE AREA BODY KANAN) -->
            <div style="margin: 10px 0; padding: 15px; background-color: #f8f9fa; border: 1px solid #ced6e0; border-radius: 6px;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 13px;">
                    <span style="color: #57606f; font-weight: 600;">STATUS KETERSEDIAAN:</span>
                    @if($stokSisa > 0)
                        <span style="color: #2ed573; font-weight: bold; text-transform: uppercase;">Tersedia</span>
                    @else
                        <span style="color: #ff4757; font-weight: bold; text-transform: uppercase;">Stok Habis</span>
                    @endif
                </div>
                
                <!-- Informasi Baris Detail Stok Real-Time -->
                <div style="display: flex; justify-content: space-between; align-items: center; font-size: 14px;">
                    <div style="color: #2f3542;">
                        Sisa Stok: <strong style="color: #000000; font-size: 16px;">{{ $stokSisa }}</strong> Pcs
                    </div>
                    <div style="color: #747d8c; font-size: 12px; font-weight: 600;">
                        Sudah Terjual: <strong>{{ $stokTerjual }}</strong> Pcs
                    </div>
                </div>
            </div>

            <!-- Form Proses Tambah Keranjang Belanja -->
            <form action="{{ route('keranjang.tambah', $produk) }}" method="POST">
                @csrf
                
                <!-- Pemilihan Ukuran -->
                <div class="variant-section">
                    <h4>Ukuran</h4>
                    <div class="variant-options">
                        <label><input type="radio" name="ukuran" value="S" style="display:none;"><span class="box-option">S</span></label>
                        <label><input type="radio" name="ukuran" value="M" style="display:none;"><span class="box-option">M</span></label>
                        <label><input type="radio" name="ukuran" value="L" style="display:none;" checked><span class="box-option selected">L</span></label>
                        <label><input type="radio" name="ukuran" value="XL" style="display:none;"><span class="box-option">XL</span></label>
                        <label><input type="radio" name="ukuran" value="XXL" style="display:none;"><span class="box-option">XXL</span></label>
                    </div>
                </div>

                            <!-- KOTAK KETERANGAN DESKRIPSI PRODUK (BARU) -->
            <div class="product-description-box" style="margin-top: 15px; border-top: 1px dashed #e1e8ed; padding-top: 15px;">
                <h4 style="font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #2f3542; margin-bottom: 8px; font-weight: 700;">INFORMASI & SPESIFIKASI</h4>
                <p style="font-size: 13px; color: #57606f; line-height: 1.6; text-align: justify;">
                    {{ $deskripsiProduk }}
                </p>
                <ul style="list-style: none; font-size: 12px; color: #747d8c; margin-top: 10px; display: flex; flex-direction: column; gap: 4px;">
                    <li>• Model: UNISEX (Bisa dipakai Pria & Wanita)</li>
                    <li>• Standar Kualitas Distro Independent Premium</li>
                </ul>
            </div>

                
                <!-- Pemilihan Warna -->
                <div class="variant-section" style="margin-top: 20px;">
                    <h4>Warna</h4>
                    <div class="variant-options">
                        <label><input type="radio" name="warna" value="Hitam" style="display:none;" checked><span class="box-option selected">Hitam</span></label>
                        <label><input type="radio" name="warna" value="Putih" style="display:none;"><span class="box-option">Putih</span></label>
                        <label><input type="radio" name="warna" value="Biru" style="display:none;"><span class="box-option">Biru</span></label>
                        <label><input type="radio" name="warna" value="Merah" style="display:none;"><span class="box-option">Merah</span></label>
                    </div>
                </div>
                
                <!-- Proteksi Tombol Berdasarkan Sisa Stok -->
                @if($stokSisa > 0)
                    <button type="submit" class="btn-add-cart">Tambah Keranjang</button>
                @else
                    <button type="button" class="btn-add-cart" style="background-color: #747d8c; cursor: not-allowed; box-shadow: none;" disabled>Stok Habis</button>
                @endif
            </form>
            
        </div>
        </form>
            
            </div>
        </div>
    
        <!-- KOMPONEN ULASAN KONSISTEN DENGAN PRODUK DISTRO -->
        <div class="reviews-wrapper">
            <div class="reviews-heading">
                ULASAN PEMBELI <span>(3 Penilaian)</span>
            </div>
                <!-- FORM MASUKAN ULASAN BARU (INTERAKTIF & BISA UNGGAH FOTO) -->
                @auth
        <div class="add-review-box">
            <div class="add-review-title">Tulis Ulasan Produk Anda</div>
            <form action="#" method="POST" enctype="multipart/form-data" style="overflow: hidden;">
                @csrf
                <!-- Pilih Rating Bintang -->
                <div class="rating-select-group">
                    <span style="font-size: 13px; font-weight: bold; color: #57606f;">Rating Kualitas:</span>
                    <div class="rating-stars-input">
                        <input type="radio" id="star5" name="rating" value="5"><label for="star5">★</label>
                        <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
                        <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
                        <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
                        <input type="radio" id="star1" name="rating" value="1"><label for="star1">★</label>
                    </div>
                </div>

                <!-- Isi Teks Ulasan -->
                <textarea class="review-textarea" name="comment" placeholder="Bagikan penilaian Anda mengenai kualitas bahan, jahitan, atau ukuran produk DISIT.ID untuk membantu pembeli lain..."></textarea>

                <!-- Unggah Foto Produk -->
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <label class="upload-photo-btn">
                        📷 Tambah Foto Produk
                        <input type="file" name="review_photo" accept="image/*" style="display: none;" onchange="document.getElementById('file-chosen').textContent = this.files[0].name">
                    </label>
                    <span id="file-chosen" style="font-size: 12px; color: #747d8c; margin-left: 10px;">Belum ada foto terpilih</span>
                    
                    <button type="button" class="btn-submit-review" onclick="alert('Ulasan Anda berhasil dikirim! Menunggu persetujuan sistem.')">Kirim Ulasan</button>
                </div>
            </form>
        </div>
        @else
        <div style="background-color: #f1f2f6; text-align: center; padding: 15px; border-radius: 6px; font-size: 13px; font-weight: bold; color: #747d8c; margin-bottom: 35px;">
            Silakan <a href="{{ route('login') }}" style="color: #ff4757; text-decoration: none;">Login Masuk</a> terlebih dahulu untuk memberikan ulasan pada produk ini.
        </div>
        @endauth

            <!-- Ulasan 1 -->
            <div class="review-card">
                <div class="review-header">
                    <div class="review-user-info">
                        <div class="review-avatar">M</div>
                        <div>
                            <div class="review-name">Muhammad Arif</div>
                            <div class="stars-container">★★★★★ <span style="color:#747d8c; font-size:12px;">(5/5)</span></div>
                        </div>
                    </div>
                    <div class="review-date">10 Okt 2026</div>
                </div>
                <div class="review-variant-badge">Varian: L / Hitam</div>
                <div class="review-text">Bahannya tebal banget, sablonannya rapi sesuai standar distro premium. Pas dipake fitting-nya oversized-nya mantap!</div>
                <!-- Contoh penyisipan foto produk di review list bawah -->

<img src="{{ asset('produk-kaos.png') }}" class="review-attached-photo" alt="Bukti Foto Produk" onclick="alert('Membuka foto ukuran penuh!')">

            </div>
    
            <!-- Ulasan 2 -->
            <div class="review-card">
                <div class="review-header">
                    <div class="review-user-info">
                        <div class="review-avatar">A</div>
                        <div>
                            <div class="review-name">Aditya Pratama</div>
                            <div class="stars-container">★★★★★ <span style="color:#747d8c; font-size:12px;">(5/5)</span></div>
                        </div>
                    </div>
                    <div class="review-date">08 Okt 2026</div>
                </div>
                <div class="review-variant-badge">Varian: XL / Hitam</div>
                <div class="review-text">Pengiriman cepat, packing aman pakai kemasan ziplock rapi. Next bakal order lagi warna lainnya di DISIT ID.</div>
            </div>
    
            <!-- Ulasan 3 -->
            <div class="review-card">
                <div class="review-header">
                    <div class="review-user-info">
                        <div class="review-avatar">R</div>
                        <div>
                            <div class="review-name">Rian Hidayat</div>
                            <div class="stars-container">★★★★☆ <span style="color:#747d8c; font-size:12px;">(4/5)</span></div>
                        </div>
                    </div>
                    <div class="review-date">05 Okt 2026</div>
                </div>
                <div class="review-variant-badge">Varian: M / Putih</div>
                <div class="review-text">Bahan adem kain katunnya berkelas, cuman agak sedikit longgar karena emang model potongan kaosnya tee mono oversize. Overall oke banget kawan.</div>
            </div>
        </div>
    
    </div>

    <!-- Script JavaScript untuk Interaksi Klik Varian Box -->
    <script>
        document.querySelectorAll('.variant-options').forEach(group => {
            group.querySelectorAll('label').forEach(label => {
                label.addEventListener('click', function() {
                    // Reset kelas selected dari semua box di dalam kelompok yang sama
                    group.querySelectorAll('.box-option').forEach(box => box.classList.remove('selected'));
                    // Tambahkan kelas selected pada box yang sedang diklik
                    this.querySelector('.box-option').classList.add('selected');
                });
            });
        });
    </script>
</body>
</html>

