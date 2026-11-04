<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Saya - DISIT ID</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #ffffff; color: #000000; }
        
        /* NAVBAR UNIVERSAL DISIT.ID */
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
        .btn-auth { background-color: #ff4757; color: #ffffff; border: none; padding: 8px 16px; font-size: 12px; font-weight: bold; border-radius: 4px; cursor: pointer; transition: 0.2s; }
        .btn-auth:hover { background-color: #ff6b81; }

        /* NOTIFIKASI BANNER SUKSES */
        .alert-success { max-width: 1200px; margin: 30px auto 0; padding: 15px 20px; background-color: #2ed573; color: #ffffff; border-radius: 4px; font-weight: bold; font-size: 14px; text-align: center; }

        /* TATA LETAK DASHBOARD AKUN */
        .account-container { max-width: 1200px; margin: 40px auto; padding: 0 40px; display: flex; gap: 50px; }
        
        /* Menu Navigasi Samping (Sidebar) */
        .account-sidebar { width: 280px; border-right: 1px solid #e1e8ed; padding-right: 30px; }
        .sidebar-user-info { margin-bottom: 30px; }
        .sidebar-user-info h3 { font-size: 18px; font-weight: 800; color: #000000; }
        .sidebar-user-info p { font-size: 13px; color: #747d8c; margin-top: 2px; }
        
        .menu-tab-btn { display: block; width: 100%; text-align: left; background: none; border: none; padding: 12px 15px; font-size: 14px; font-weight: 700; color: #747d8c; cursor: pointer; border-radius: 4px; margin-bottom: 8px; transition: 0.2s; text-transform: uppercase; letter-spacing: 0.5px; }
        .menu-tab-btn:hover { background-color: #f8f9fa; color: #000000; }
        .menu-tab-btn.active { background-color: #000000; color: #ffffff; }

        /* Area Konten Utama Kanan */
        .account-main-content { flex-grow: 1; }
        .content-section { display: none; }
        .content-section.active { display: block; }
        .section-title { font-size: 22px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 25px; border-bottom: 2px solid #000000; padding-bottom: 10px; }

        /* KOTAK NOTA RIWAYAT PESANAN */
        .order-card { border: 1px solid #ced6e0; border-radius: 6px; margin-bottom: 20px; overflow: hidden; }
        .order-card-header { background-color: #f8f9fa; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ced6e0; }
        .invoice-id { font-weight: bold; font-size: 14px; color: #000000; }
        .order-date { font-size: 12px; color: #747d8c; }
        
        /* Status Badge Pesanan */
        .status-badge { background-color: #ffa502; color: #ffffff; padding: 5px 12px; font-size: 11px; font-weight: bold; border-radius: 20px; text-transform: uppercase; }
        
        .order-card-body { padding: 20px; }
        .order-item-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; font-size: 14px; }
        .order-item-info strong { color: #000000; }
        .order-item-info p { font-size: 12px; color: #747d8c; margin-top: 2px; }
        
        .order-card-footer { padding: 15px 20px; background-color: #ffffff; border-top: 1px dashed #ced6e0; display: flex; justify-content: space-between; align-items: center; }
        .total-pay-text { font-size: 15px; font-weight: bold; color: #000000; }

        /* FORM BIODATA PROFIL */
        .profile-form-box { max-width: 600px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #2f3542; margin-bottom: 8px; }
        .form-group input { width: 100%; padding: 12px 15px; border: 1px solid #ced6e0; border-radius: 4px; font-size: 14px; outline: none; background-color: #ffffff; }
        .form-group input:focus { border-color: #000000; }
        
        .btn-save-profile { background-color: #000000; color: #ffffff; border: none; padding: 14px 30px; font-size: 13px; font-weight: bold; border-radius: 4px; cursor: pointer; text-transform: uppercase; letter-spacing: 1px; transition: 0.2s; }
        .btn-save-profile:hover { background-color: #ff4757; }
        
                /* MODAL STYLES (STRUK NOTA DISTRO) */
                .modal-overlay {
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;
        }
        .invoice-card {
            background-color: #ffffff; width: 100%; max-width: 450px; border-radius: 8px;
            padding: 30px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); border: 1px solid #e1e8ed;
        }
        .invoice-header { text-align: center; border-bottom: 2px dashed #e1e8ed; padding-bottom: 15px; margin-bottom: 15px; }
        .invoice-title { font-size: 20px; font-weight: 800; letter-spacing: 1px; color: #16161a; }
        .invoice-meta { font-size: 12px; color: #747d8c; margin-top: 5px; }
        .invoice-table { width: 100%; margin: 15px 0; border-bottom: 1px solid #f1f2f6; }
        .invoice-row { display: flex; justify-content: space-between; font-size: 13px; color: #57606f; margin-bottom: 10px; }
        .invoice-total-row { display: flex; justify-content: space-between; font-size: 15px; font-weight: bold; color: #ff4757; margin-top: 10px; padding-top: 10px; border-top: 2px dashed #e1e8ed; }
        .btn-close-invoice { display: block; width: 100%; background-color: #16161a; color: #ffffff; border: none; padding: 12px; text-align: center; font-weight: bold; font-size: 13px; border-radius: 4px; cursor: pointer; text-decoration: none; margin-top: 20px; transition: 0.2s; }
        .btn-close-invoice:hover { background-color: #24242b; }


        .empty-history-text { text-align: center; color: #a4b0be; padding: 50px 0; font-size: 15px; font-weight: 600; }


/* CSS BARU: MENGATUR EFEK KURSOR DAN HOVER NOMOR INVOICE SECARA GLOBAL */
.invoice-trigger {
    cursor: pointer;
    transition: color 0.2s ease-in-out;
}
.invoice-trigger:hover {
    color: #ff4757 !important; /* Berubah menjadi warna merah khas distro saat disentuh kursor */
    text-decoration: underline;
}
</style>

</head>
<body>

    <!-- NAVBAR UNIVERSAL SESUAI REQUEST -->
    <nav>
        <a href="/" class="nav-logo">
            <img src="{{ asset('logo.png') }}" alt="Logo DISIT ID" style="height: 40px; width: auto; object-fit: contain; display: block;">
        </a>

        <div class="nav-user" style="display: flex; align-items: center;">
            @auth
                <!-- 1. Menu HOME -->
                <a href="/" style="color: #ffffff; text-decoration: none; font-size: 14px; font-weight: 600; margin-right: 25px;">HOME</a>

                <!-- 2. Ikon KERANJANG (Murni Hanya ke Halaman Keranjang Belanja) -->
                <a href="{{ route('keranjang') }}" style="text-decoration: none; display: flex; align-items: center; gap: 8px; margin-right: 25px;">
                    <img src="{{ asset('cart.png') }}" alt="Cart" style="height: 20px; width: auto; object-fit: contain; filter: brightness(0) invert(1);">
                    <span style="color: #a4b0be; font-size: 14px; font-weight: 600;">({{ count(session()->get('cart', [])) }})</span>
                </a>

                <!-- 3. Ikon AKUN (Mengarah ke Halaman Akun Terpadu ini) -->
                               <!-- 3. Ikon AKUN (Mengarah ke Halaman Akun Terpadu) -->
                               <a href="{{ route('akun') }}" style="text-decoration: none; display: flex; align-items: center; margin-right: 25px;">
                    <img src="{{ asset('akun.png') }}" alt="Akun" style="height: 20px; width: auto; object-fit: contain; filter: brightness(0) invert(1);">
                </a>
                
                <!-- 4. Tampilan Nama Pengguna & Tombol Keluar Merah Konsisten -->
                <span style="margin-right: 15px; color: #ffffff; font-size: 14px; font-weight: 600;">{{ Auth::user()->name }}</span>
                
                <form method="POST" action="{{ route('logout') }}" style="margin: 0; padding: 0;">
                    @csrf
                    <button type="submit" class="btn-auth">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" style="color: #ffffff; text-decoration: none; font-size: 14px; font-weight: 600; margin-right: 15px;">Login Masuk</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-auth">Daftar Akun</a>
                @endif
            @endauth
        </div>
    </nav>

    <!-- NOTIFIKASI BERHASIL DISIMPAN -->
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- TATA LETAK UTAMA DASHBOARD -->
    <div class="account-container">
        
        <!-- Sisi Kiri: Sidebar Menu -->
        <div class="account-sidebar">
            <div class="sidebar-user-info">
                <h3>{{ Auth::user()->name }}</h3>
                <p>{{ Auth::user()->email }}</p>
            </div>
            
            <button class="menu-tab-btn active" onclick="switchTab(event, 'riwayat')">Riwayat & Transaksi</button>
            <button class="menu-tab-btn" onclick="switchTab(event, 'biodata')">Biodata Akun</button>
        </div>
        
        <!-- Sisi Kanan: Konten Utama Dinamis -->
        <div class="account-main-content">
            
            <!-- SECTION 1: RIWAYAT TRANSAKSI -->
            <div id="riwayat" class="content-section active">
                <h2 class="section-title">Transaksi Berjalan & Riwayat</h2>
                
                <!-- Kotak Transaksi Kartu Distro -->
                <div class="order-card">
                    <div class="order-card-header">
                        <div>
                            <!-- Menerapkan class invoice-trigger sesuai instruksi CSS global baru Anda -->
                            <div class="invoice-trigger" style="font-weight: bold;" onclick="openInvoice()">INV/20261022/327</div>
                            <div class="order-date">22 Okt 2026 - 10:00 WIB</div>
                        </div>
                        <span class="status-badge">Menunggu Verifikasi Admin</span>
                    </div>
                    
                    <div class="order-card-body">
                        <div class="order-item-row">
                            <div class="order-item-info">
                                <strong>BAJU OVERSIZE TEE MONO</strong>
                                <p>Varian: L / Hitam (1x)</p>
                            </div>
                            <div style="font-weight: 600;">Rp 149.000</div>
                        </div>
                    </div>
                    
                    <div class="order-card-footer">
                        <div style="font-size: 12px; color: #747d8c;">Metode: Transfer BCA</div>
                        <div class="total-pay-text">Total Bayar: <span style="color: #ff4757;">Rp 149.000</span></div>
                    </div>
                </div>
            </div>
            
            <!-- SECTION 2: BIODATA PROFIL -->
            <div id="biodata" class="content-section">
                <h2 class="section-title">Biodata Akun</h2>
                
                <form action="{{ route('profile.update') }}" method="POST" class="profile-form-box">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Alamat Email</label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}" disabled style="background-color: #f1f2f6; color: #747d8c; cursor: not-allowed;">
                    </div>
                    
                    <div class="form-group">
                        <label>Nomor Telepon / WhatsApp</label>
                        <input type="text" name="phone" value="+62 812-3456-7890">
                    </div>
                    
                    <div class="form-group">
                        <label>Alamat Pengiriman Cargo</label>
                        <input type="text" name="address" value="Jl. Lowokwaru No. 45, Kota Malang, Jawa Timur">
                    </div>
                    
                    <button type="submit" class="btn-save-profile">Simpan Perubahan</button>
                </form>
            </div>
            
        </div>
    </div>

    <!-- MODAL POPUP STRUK NOTA DIGITAL -->
    <div id="invoiceModal" class="modal-overlay">
        <div class="invoice-card">
            <div class="invoice-header">
                <div class="invoice-title">DISIT<span>.ID</span></div>
                <div class="invoice-meta">STREETWEAR MOVEMENT</div>
                <div style="font-size: 13px; font-weight: bold; color: #000000; margin-top: 15px;">NOTA PEMESANAN RESMI</div>
                <div class="invoice-meta" style="margin-top: 2px;">No: INV/20261022/327</div>
                <div class="invoice-meta">Tanggal: 22 Okt 2026 - 10:00 WIB</div>
            </div>

            <div style="font-size: 12px; margin-bottom: 15px; color: #57606f; line-height: 1.5;">
                <strong>Tujuan Pengiriman:</strong><br>
                Nama: {{ Auth::user()->name }}<br>
                Alamat: Jl. Lowokwaru No. 45, Kota Malang, Jawa Timur
            </div>

            <div style="font-size: 12px; font-weight: bold; text-transform: uppercase; color: #16161a; border-bottom: 1px solid #16161a; padding-bottom: 5px;">Rincian Barang</div>
            <div class="invoice-table">
                <div class="invoice-row" style="margin-top: 10px;">
                    <div>
                        <strong>BAJU OVERSIZE TEE MONO</strong><br>
                        <span style="font-size: 11px; color:#747d8c;">Ukuran: L / Warna: Hitam (1x)</span>
                    </div>
                    <div style="font-weight: 600; color: #16161a;">Rp 149.000</div>
                </div>
            </div>

            <div class="invoice-row">
                <div style="color: #747d8c;">Subtotal Produk</div>
                <div>Rp 149.000</div>
            </div>
            <div class="invoice-row">
                <div style="color: #747d8c;">Ongkos Kirim</div>
                <div style="color: #2ed573; font-weight: 600;">Rp 0 (FREE)</div>
            </div>

            <div class="invoice-total-row">
                <div>TOTAL BAYAR</div>
                <div>Rp 149.000</div>
            </div>

            <div style="font-size: 11px; color: #a4b0be; text-align: center; margin-top: 15px; line-height: 1.4;">
                Metode: Transfer Bank BCA<br>
                <span style="color: #ffa502; font-weight: bold;">Status: Menunggu Verifikasi Admin</span>
            </div>

            <button class="btn-close-invoice" onclick="closeInvoice()">TUTUP NOTA</button>
        </div>
    </div>

    <!-- SCRIPT TABS DAN POPUP INTERAKTIF -->
    <script>
        // Fungsi Penukaran Tab Halaman Kiri
        function switchTab(evt, sectionId) {
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });
            document.querySelectorAll('.menu-tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            document.getElementById(sectionId).classList.add('active');
            evt.currentTarget.classList.add('active');
        }

        // Fungsi Buka-Tutup Modal Nota
        function openInvoice() {
            document.getElementById('invoiceModal').style.display = 'flex';
        }
        function closeInvoice() {
            document.getElementById('invoiceModal').style.display = 'none';
        }
        window.onclick = function(event) {
            var modal = document.getElementById('invoiceModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>

