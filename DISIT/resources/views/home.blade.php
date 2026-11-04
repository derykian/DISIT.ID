<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISIT ID - Pemesanan Pakaian Distro</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #ffffff; color: #000000; }
        
        /* 1. HEADER HITAM KONSISTEN */
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
        
        /* Gaya Tombol di Header */
        .btn-auth { display: inline-block; padding: 6px 15px; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 14px; cursor: pointer; transition: 0.3s; }
        .btn-logout { background-color: #ff4757; color: #ffffff; border: none; }
        .btn-logout:hover { background-color: #ff6b81; }
        .btn-login { background-color: transparent; color: #ffffff; border: 1px solid #ffffff; }
        .btn-login:hover { background-color: #ffffff; color: #16161a; }
        .btn-register { background-color: #ff4757; color: #ffffff; border: 1px solid #ff4757; }
        .btn-register:hover { background-color: #ff6b81; }

        /* 2. KONTEN PUTIH MINIMALIS */
        .hero-banner { width: 100%; height: 400px; background-color: #f1f2f6; display: flex; align-items: center; justify-content: center; overflow: hidden; position: relative; }
        .hero-placeholder { text-align: center; }
        .hero-placeholder h2 { font-size: 3.5rem; font-weight: 900; letter-spacing: 4px; color: #000000; }
        .hero-placeholder h2 span { color: #ff4757; }
        .hero-placeholder p { font-size: 14px; letter-spacing: 6px; text-transform: uppercase; margin-top: 10px; color: #747d8c; }

        .main-content { display: flex; max-width: 1400px; margin: 40px auto; padding: 0 40px; gap: 40px; }
        
        /* Panel Filter Kiri */
        .filter-sidebar { width: 250px; flex-shrink: 0; }
        .filter-title { font-size: 18px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 25px; border-bottom: 2px solid #000000; padding-bottom: 5px; }
        .filter-group { margin-bottom: 30px; }
        .filter-group h4 { font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #000000; margin-bottom: 12px; font-weight: 700; }
        .filter-group ul { list-style: none; }
        .filter-group ul li { font-size: 14px; color: #57606f; margin-bottom: 8px; cursor: pointer; transition: 0.2s; }
        .filter-group ul li:hover { color: #000000; padding-left: 2px; }

        /* Panel Kisi Produk Kanan */
        .products-grid { 
            flex-grow: 1; 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); 
            gap: 30px; 
        }
        
        .product-card { 
            background-color: #ffffff; 
            position: relative; 
            overflow: hidden; 
            transition: 0.3s; 
            border: 1px solid #e1e8ed; 
            border-radius: 6px; 
            padding: 12px;
            display: flex;
            flex-direction: column;
            height: fit-content;
        }
        .product-card:hover { 
            transform: translateY(-5px); 
            border-color: #ff4757; 
            box-shadow: 0 6px 15px rgba(0,0,0,0.05); 
        }
        
        .product-image-slot { 
            width: 100%; 
            background-color: #f5f6fa; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            position: relative; 
            border-radius: 4px; 
            overflow: hidden; 
            padding: 15px; 
        }
        .product-image-slot img { width: 100%; height: auto; object-fit: contain; display: block; }

        /* CSS EFEK PERBAIKAN: PRODUK SOLD OUT INTENSITAS LEMBUT */
        .product-card.sold-out-card {
            position: relative;
        }
        /* Hanya slot gambar yang buram secara tipis */
        .product-card.sold-out-card .product-image-slot {
            filter: blur(2px);
            opacity: 0.45;
            pointer-events: none;
        }
        /* Area tulisan nama barang di bawah dibuat tetap tajam & tebal agar terbaca */
        .product-card.sold-out-card .product-info-area {
            opacity: 0.9;
            pointer-events: none;
        }
        .sold-out-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 6px;
        }
        .sold-out-badge-circle {
            width: 95px;
            height: 95px;
            background-color: #16161a;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            border: 2px solid #ff4757;
            padding: 5px;
            line-height: 1.3;
        }
    </style>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISIT ID - Pemesanan Pakaian Distro</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #ffffff; color: #000000; }
        
        /* 1. HEADER HITAM KONSISTEN */
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
        
        /* Gaya Tombol di Header */
        .btn-auth { display: inline-block; padding: 6px 15px; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 14px; cursor: pointer; transition: 0.3s; }
        .btn-logout { background-color: #ff4757; color: #ffffff; border: none; }
        .btn-logout:hover { background-color: #ff6b81; }
        .btn-login { background-color: transparent; color: #ffffff; border: 1px solid #ffffff; }
        .btn-login:hover { background-color: #ffffff; color: #16161a; }
        .btn-register { background-color: #ff4757; color: #ffffff; border: 1px solid #ff4757; }
        .btn-register:hover { background-color: #ff6b81; }

        /* 2. KONTEN PUTIH MINIMALIS */
        .hero-banner { width: 100%; height: 400px; background-color: #f1f2f6; display: flex; align-items: center; justify-content: center; overflow: hidden; position: relative; }
        .hero-placeholder { text-align: center; }
        .hero-placeholder h2 { font-size: 3.5rem; font-weight: 900; letter-spacing: 4px; color: #000000; }
        .hero-placeholder h2 span { color: #ff4757; }
        .hero-placeholder p { font-size: 14px; letter-spacing: 6px; text-transform: uppercase; margin-top: 10px; color: #747d8c; }

        .main-content { display: flex; max-width: 1400px; margin: 40px auto; padding: 0 40px; gap: 40px; }
        
        /* Panel Filter Kiri */
        .filter-sidebar { width: 250px; flex-shrink: 0; }
        .filter-title { font-size: 18px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 25px; border-bottom: 2px solid #000000; padding-bottom: 5px; }
        .filter-group { margin-bottom: 30px; }
        .filter-group h4 { font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #000000; margin-bottom: 12px; font-weight: 700; }
        .filter-group ul { list-style: none; }
        .filter-group ul li { font-size: 14px; color: #57606f; margin-bottom: 8px; cursor: pointer; transition: 0.2s; }
        .filter-group ul li:hover { color: #000000; padding-left: 2px; }

        /* Panel Kisi Produk Kanan */
        .products-grid { 
            flex-grow: 1; 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); 
            gap: 30px; 
        }
        
        .product-card { 
            background-color: #ffffff; 
            position: relative; 
            overflow: hidden; 
            transition: 0.3s; 
            border: 1px solid #e1e8ed; 
            border-radius: 6px; 
            padding: 12px;
            display: flex;
            flex-direction: column;
            height: fit-content;
        }
        .product-card:hover { 
            transform: translateY(-5px); 
            border-color: #ff4757; 
            box-shadow: 0 6px 15px rgba(0,0,0,0.05); 
        }
        
        .product-image-slot { 
            width: 100%; 
            background-color: #f5f6fa; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            position: relative; 
            border-radius: 4px; 
            overflow: hidden; 
            padding: 15px; 
        }
        .product-image-slot img { width: 100%; height: auto; object-fit: contain; display: block; }

        /* CSS EFEK KHUSUS UNTUK PRODUK SOLD OUT */
        .product-card.sold-out-card {
            position: relative;
        }
        .product-card.sold-out-card .product-image-slot,
        .product-card.sold-out-card .product-info-area {
            filter: blur(4px);
            opacity: 0.6;
            pointer-events: none;
        }
        .sold-out-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 6px;
        }
        .sold-out-badge-circle {
            width: 100px;
            height: 100px;
            background-color: #16161a;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            border: 2px solid #ff4757;
            padding: 5px;
            line-height: 1.3;
        }
    </style>
</head>
<body>

    <!-- NAVBAR ATAS UTAMA -->
    <nav>
        <a href="/" class="nav-logo">
            <img src="{{ asset('logo.png') }}" alt="Logo DISIT ID" style="height: 40px; width: auto; object-fit: contain; display: block;">
        </a>
        <div class="nav-user" style="display: flex; align-items: center;">
            @if (Route::has('login'))
                @auth
                    <a href="/" style="color: #ffffff; text-decoration: none; font-size: 14px; font-weight: 600; margin-right: 25px;">HOME</a>
                    <a href="{{ route('keranjang') }}" style="text-decoration: none; display: flex; align-items: center; gap: 8px; margin-right: 25px;">
                        <img src="{{ asset('cart.png') }}" alt="Cart" style="height: 20px; width: auto; object-fit: contain; filter: brightness(0) invert(1);">
                        <span style="color: #a4b0be; font-size: 14px; font-weight: 600;">({{ count(session()->get('cart', [])) }})</span>
                    </a>
                    <a href="{{ route('akun') }}" style="text-decoration: none; display: flex; align-items: center; margin-right: 8px;">
                        <img src="{{ asset('akun.png') }}" alt="Akun" style="height: 20px; width: auto; object-fit: contain; filter: brightness(0) invert(1);">
                    </a>
                    <span class="user-name" style="margin-right: 15px; color: #ffffff; font-size: 14px; font-weight: 600;">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline; margin: 0;">
                        @csrf
                        <button type="submit" class="btn-auth btn-logout">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn-auth btn-login" style="margin-right: 10px;">Login Masuk</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-auth btn-register">Daftar Akun</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>
    <!-- BANNER HERO GAMBAR ASLI DISTRO -->
        <div class="hero-banner" style="width: 40%; height: auto; margin: 30px auto 0 auto; background-color: #ffffff; display: flex; align-items: center; justify-content: center; overflow: hidden; position: relative; border-radius: 6px;">
        <img src="{{ asset('hero-banner.png') }}" alt="DISIT.ID Banner" style="width: 100%; height: auto; display: block; object-fit: cover;">
    </div>



    <!-- MAIN CONTENT AREA -->
    <div class="main-content">
        
        <!-- SIDEBAR FILTER KIRI -->
                <!-- SIDEBAR FILTER KIRI (SUDAH AKTIF) -->
                <div class="filter-sidebar">
            <h3 class="filter-title">DISIT.ID INVENTORY</h3>
            
            <!-- Tambahkan pilihan ALL PRODUCT untuk membatalkan filter -->
            <div class="filter-group">
                <ul style="margin-bottom: 15px;">
                    <li class="filter-btn active" data-filter="all" style="font-weight: bold; color: #ff4757;">ALL PRODUCTS</li>
                </ul>
            </div>

            <div class="filter-group">
                <h4>TOP</h4>
                <ul>
                    <li class="filter-btn" data-filter="t-shirt">T-SHIRT</li>
                    <li class="filter-btn" data-filter="shirt">SHIRT</li>
                    <li class="filter-btn" data-filter="polo">POLO</li>
                    <li class="filter-btn" data-filter="hoodie">HOODIE</li>
                    <li class="filter-btn" data-filter="longsleeves">LONGSLEEVES</li>
                </ul>
            </div>
            <div class="filter-group">
                <h4>BOTTOM</h4>
                <ul>
                    <li class="filter-btn" data-filter="short-pants">SHORT PANTS</li>
                    <li class="filter-btn" data-filter="long-pants">LONG PANTS</li>
                </ul>
            </div>
            <div class="filter-group">
                <h4>BAG</h4>
                <ul>
                    <li class="filter-btn" data-filter="backpack">BACKPACK</li>
                    <li class="filter-btn" data-filter="waistbag">WAISTBAG</li>
                    <li class="filter-btn" data-filter="slingbag">SLINGBAG</li>
                    <li class="filter-btn" data-filter="totebag">TOTEBAG</li>
                </ul>
            </div>
        </div>

        <!-- PANEL KISI PRODUK KANAN (DITAMBAHKAN ATRIBUT KATEGORI) -->
        <div class="products-grid">

            <!-- 1. KAOS (Kategori: t-shirt) -->
            <div class="product-card" data-category="t-shirt">
                <span class="badge-sale" style="position: absolute; top: 10px; right: 10px; background-color: #ff4757; color: white; padding: 4px 8px; font-size: 10px; font-weight: bold; border-radius: 3px; z-index: 5;">SALE</span>
                <div class="product-image-slot">
                    <a href="{{ route('detail', 'kaos') }}">
                        <img src="{{ asset('produk-kaos.png') }}" alt="Oversized T-Shirt Black">
                    </a>
                </div>
                <div class="product-info-area" style="text-align: center; margin-top: 15px;">
                    <div style="font-size: 11px; color: #747d8c; font-weight: bold;">DISIT ID</div>
                    <a href="{{ route('detail', 'kaos') }}" style="text-decoration: none; color: #000000; font-weight: bold; font-size: 14px; display: block; margin: 5px 0;">Oversized T-Shirt Black</a>
                    <div style="font-weight: bold; color: #ff4757; font-size: 14px;">Rp 149.000</div>
                </div>
            </div>

            <!-- 2. HOODIE (Kategori: hoodie) -->
            <div class="product-card sold-out-card" data-category="hoodie">
                <div class="sold-out-overlay">
                    <div class="sold-out-badge-circle">
                        <span>STOK</span>
                        <span>HABIS</span>
                    </div>
                </div>
                <div class="product-image-slot">
                    <img src="{{ asset('produk-hoodie.png') }}" alt="Heavyweight Street Hoodie">
                </div>
                <div class="product-info-area" style="text-align: center; margin-top: 15px;">
                    <div style="font-size: 11px; color: #747d8c; font-weight: bold;">DISIT ID</div>
                    <div style="font-weight: bold; color: #000000; font-size: 14px; display: block; margin: 5px 0;">Heavyweight Street Hoodie</div>
                    <div style="font-weight: bold; color: #ff4757; font-size: 14px;">Rp 299.000</div>
                </div>
            </div>

            <!-- 3. TAS (Kategori: slingbag) -->
            <div class="product-card" data-category="slingbag">
                <span class="badge-sale" style="position: absolute; top: 10px; right: 10px; background-color: #ff4757; color: white; padding: 4px 8px; font-size: 10px; font-weight: bold; border-radius: 3px; z-index: 5;">SALE</span>
                <div class="product-image-slot">
                    <a href="{{ route('detail', 'tas') }}">
                        <img src="{{ asset('produk-tas.png') }}" alt="Exclusive Sling Bag">
                    </a>
                </div>
                <div class="product-info-area" style="text-align: center; margin-top: 15px;">
                    <div style="font-size: 11px; color: #747d8c; font-weight: bold;">DISIT ID</div>
                    <a href="{{ route('detail', 'tas') }}" style="text-decoration: none; color: #000000; font-weight: bold; font-size: 14px; display: block; margin: 5px 0;">Exclusive Sling Bag</a>
                    <div style="font-weight: bold; color: #ff4757; font-size: 14px;">Rp 125.000</div>
                </div>
            </div>

        </div>

    </div>
        <!-- SECTION ABOUT & CONTACT US (BOX STYLE ABU-ABU TERANG MINIMALIS) -->
        <div style="max-width: 1400px; margin: 60px auto 40px auto; padding: 0 40px;">
        <div style="background-color: #f8f9fa; color: #16161a; border: 1px solid #e1e8ed; border-top: 4px solid #ff4757; border-radius: 12px; padding: 45px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.02); display: flex; gap: 50px; flex-wrap: wrap;">
            
            <!-- Kotak Kiri: About Us -->
            <div style="flex: 1; min-width: 300px; border-right: 1px solid #e1e8ed; padding-right: 40px;">
                <h3 style="font-size: 15px; font-weight: 800; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 20px; color: #16161a; display: flex; align-items: center; gap: 8px;">
                    <span style="color: #ff4757;"></span> ABOUT DISIT.ID
                </h3>
                <p style="font-size: 14px; color: #57606f; line-height: 1.7; text-align: justify; font-weight: 500;">
                    DISIT.ID adalah pergerakan fashion independent (<span style="color: #ff4757; font-weight: 600;">streetwear & distro movement</span>) yang focus menyediakan pakaian berkualitas premium dengan desain orisinal yang berani. Kami berkomitmen untuk mendukung kebebasan berekspresi generasi muda melalui lini pakaian yang nyaman digunakan untuk aktivitas harian urban kultur.
                </p>
            </div>

            <!-- Kotak Kanan: Contact Us -->
            <div style="flex: 1; min-width: 300px;">
                <h3 style="font-size: 15px; font-weight: 800; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 20px; color: #16161a; display: flex; align-items: center; gap: 8px;">
                    <span style="color: #ff4757;"></span> CONTACT US
                </h3>
                <ul style="list-style: none; font-size: 14px; color: #57606f; display: flex; flex-direction: column; gap: 16px;">
                    <!-- Alamat -->
                    <li style="display: flex; align-items: flex-start; gap: 12px;">
                        <span style="font-size: 18px; line-height: 1;"></span>
                        <div style="line-height: 1.5;">
                            <span style="font-weight: 700; color: #16161a; display: block; margin-bottom: 2px;">Official Store:</span>
                            Jl. Lowokwaru No. 45, Kota Malang, Jawa Timur
                        </div>
                    </li>
                    <!-- WhatsApp -->
                    <li style="display: flex; align-items: flex-start; gap: 12px;">
                        <span style="font-size: 18px; line-height: 1;"></span>
                        <div style="line-height: 1.5;">
                            <span style="font-weight: 700; color: #16161a; display: block; margin-bottom: 2px;">WhatsApp Hotline:</span>
                            <a href="https://wa.me" target="_blank" style="color: #ff4757; text-decoration: none; font-weight: 600; transition: 0.2s;" onmouseover="this.style.color='#ff6b81'; this.style.textDecoration='underline';" onmouseout="this.style.color='#ff4757'; this.style.textDecoration='none';">+62 812-3456-7890</a>
                        </div>
                    </li>
                    <!-- Email -->
                    <li style="display: flex; align-items: flex-start; gap: 12px;">
                        <span style="font-size: 18px; line-height: 1;"></span>
                        <div style="line-height: 1.5;">
                            <span style="font-weight: 700; color: #16161a; display: block; margin-bottom: 2px;">Email Support:</span>
                            <a href="mailto:support@disit.id" style="color: #57606f; text-decoration: none;" onmouseover="this.style.color='#ff4757';" onmouseout="this.style.color='#57606f';">support@disit.id</a>
                        </div>
                    </li>
                    <!-- Jam -->
                    <li style="display: flex; align-items: flex-start; gap: 12px;">
                        <span style="font-size: 18px; line-height: 1;"></span>
                        <div style="line-height: 1.5;">
                            <span style="font-weight: 700; color: #16161a; display: block; margin-bottom: 2px;">Jam Operasional:</span>
                            Setiap Hari (10:00 AM - 10:00 PM WIB)
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>


    <!-- FOOTER COPYRIGHT KECIL -->
    <div style="text-align: center; padding: 20px; font-size: 12px; color: #a4b0be; background-color: #16161a; margin-top: 40px;">
        &copy; 2026 DISIT.ID. All Rights Reserved.
    </div>
    <script>
        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', function() {
                // 1. Atur efek visual menu aktif (warna merah)
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.style.color = '#57606f';
                    btn.style.fontWeight = 'normal';
                });
                this.style.color = '#ff4757';
                this.style.fontWeight = 'bold';

                const targetFilter = this.getAttribute('data-filter');
                const products = document.querySelectorAll('.product-card');

                // 2. Logika memfilter kartu produk
                products.forEach(product => {
                    const productCategory = product.getAttribute('data-category');
                    
                    if (targetFilter === 'all' || targetFilter === productCategory) {
                        product.style.display = 'flex'; // Tampilkan produk yang cocok
                    } else {
                        product.style.display = 'none'; // Sembunyikan produk yang tidak cocok
                    }
                });
            });
        });
    </script>

</body>
</html>
