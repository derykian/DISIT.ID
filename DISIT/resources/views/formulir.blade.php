<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Alamat - DISIT ID</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #ffffff; color: #000000; }
        
        /* KUNCI HEADER HITAM UTAMA (DIAM DI TEMPAT) */
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
        .nav-logo { display: flex; align-items: center; text-decoration: none; }
        .nav-user { display: flex; align-items: center; gap: 0; }

        /* CONTAINER CHECKOUT */
        .form-container { max-width: 1200px; margin: 50px auto; padding: 0 40px; }
        .pay-title-brand { font-size: 14px; font-weight: bold; color: #747d8c; letter-spacing: 1px; margin-bottom: 5px; }
        .form-title { font-size: 26px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 30px; border-bottom: 2px solid #000000; padding-bottom: 10px; }
        
        .form-content { display: flex; gap: 50px; align-items: flex-start; }
        .form-inputs-area { flex-grow: 1; }
        
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #2f3542; margin-bottom: 8px; }
        .form-group input, .form-group textarea { 
            width: 100%; padding: 12px 15px; border: 1px solid #ced6e0; border-radius: 4px; font-size: 14px; outline: none; transition: 0.2s; background-color: #ffffff; 
        }
        .form-group textarea { resize: none; background-color: #f1f2f6; color: #2f3542; font-weight: 600; }
        .form-group input:focus { border-color: #000000; }
        
        .form-row-split { display: flex; gap: 20px; margin-bottom: 20px; }
        .form-row-split .form-group { flex: 1; margin-bottom: 0; }

        /* BOX KOTAK MAPS GOOGLE INDEPENDEN */
        #google-maps-box {
            width: 100%;
            height: 320px;
            border: 1px solid #ced6e0;
            border-radius: 6px;
            margin-bottom: 15px;
            background-color: #f5f6fa;
        }

        .btn-maps-trigger {
            display: inline-flex;
            align-items: center;
            background-color: #f1f2f6;
            color: #000000;
            border: 1px solid #ced6e0;
            padding: 10px 16px;
            font-size: 13px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
            transition: 0.2s;
        }
        .btn-maps-trigger:hover {
            background-color: #e1e8ed;
        }
        
        /* RINGKASAN BELANJA KANAN */
        .order-summary-box { width: 400px; background-color: #f8f9fa; border: 1px solid #e1e8ed; border-radius: 6px; padding: 25px; }
        .summary-box-title { font-size: 16px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 20px; color: #000000; border-bottom: 1px solid #ced6e0; padding-bottom: 10px; }
        .summary-item { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; font-size: 14px; }
        
        .price-divider { border-top: 1px dashed #ced6e0; margin: 15px 0; }
        .row-calc { display: flex; justify-content: space-between; font-size: 14px; color: #57606f; margin-bottom: 10px; }
        .total-calc { display: flex; justify-content: space-between; font-size: 16px; font-weight: bold; color: #000000; margin-top: 15px; }
        
        .btn-submit-checkout { display: block; width: 100%; background-color: #000000; color: #ffffff; text-align: center; padding: 15px; border-radius: 4px; border: none; font-weight: bold; font-size: 14px; text-transform: uppercase; letter-spacing: 1px; margin-top: 25px; cursor: pointer; transition: 0.3s; }
        .btn-submit-checkout:hover { background-color: #ff4757; }
        .btn-back { display: inline-block; color: #747d8c; text-decoration: none; font-size: 14px; font-weight: 600; margin-top: 20px; }
    </style>
</head>
<body>

    <!-- NAVBAR KUNCI STATIS DIAM DI TEMPAT -->
    <nav>
        <a href="/" class="nav-logo">
            <img src="{{ asset('logo.png') }}" alt="Logo DISIT ID" style="height: 40px; width: auto; object-fit: contain; display: block;">
        </a>
        <div class="nav-user" style="display: flex; align-items: center;">
            @auth
                <a href="/" style="color: #ffffff; text-decoration: none; font-size: 14px; font-weight: 600; margin-right: 25px; line-height: 1;">HOME</a>
                
                <a href="{{ route('keranjang') }}" style="text-decoration: none; display: flex; align-items: center; gap: 8px; margin-right: 25px; line-height: 1;">
                    <img src="{{ asset('cart.png') }}" alt="Cart" style="height: 20px; width: auto; object-fit: contain; filter: brightness(0) invert(1); display: block;">
                    <span style="color: #a4b0be; font-size: 14px; font-weight: 600;">({{ count(session()->get('cart', [])) }})</span>
                </a>

                <a href="{{ route('akun') }}" style="text-decoration: none; display: flex; align-items: center; margin-right: 8px; line-height: 1;">
                    <img src="{{ asset('akun.png') }}" alt="Akun" style="height: 20px; width: auto; object-fit: contain; filter: brightness(0) invert(1); display: block;">
                </a>
                
                <span class="user-name" style="margin-right: 15px; color: #ffffff; font-size: 14px; font-weight: 600; line-height: 1; display: flex; align-items: center;">{{ Auth::user()->name }}</span>
                
                <form method="POST" action="{{ route('logout') }}" style="display: flex; align-items: center; margin: 0;">
                    @csrf
                    <button type="submit" style="background-color: #ff4757; color: #ffffff; border: none; padding: 8px 16px; font-size: 12px; font-weight: bold; border-radius: 4px; cursor: pointer; line-height: 1; height: 32px; display: flex; align-items: center; justify-content: center; box-sizing: border-box;">Keluar</button>
                </form>
            @endauth
        </div>
    </nav>

    <!-- FORM UTAMA -->
    <div class="form-container">
        <span class="pay-title-brand">DISIT ID</span>
        <h2 class="form-title">Checkout</h2>
        
        <form action="{{ route('pembayaran') }}" method="POST">
            @csrf
            <div class="form-content">
                
                <!-- SISI KIRI: DATA PENGIRIMAN & LOKASI PETA -->
                <div class="form-inputs-area">
                    <div class="form-group">
                        <label>Nama Lengkap Penerima</label>
                        <input type="text" name="nama_penerima" value="{{ Auth::user()->name }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Nomor HP Aktif</label>
                        <input type="text" name="nomor_hp" placeholder="Masukkan nomor handphone aktif..." required>
                    </div>

                    <!-- AREA PIN LOKASI MAPS (MENGGANTIKAN KOLOM MANUAL) -->
                    <div class="form-group">
                        <label>Lokasi Pengiriman Peta (Klik / Geser Pin Rumah Anda)</label>
                        <div id="google-maps-box"></div>
                        <button type="button" class="btn-maps-trigger" onclick="ambilLokasiGPSCurrentUser()">📍 Tandai Lokasi di Peta (Gunakan GPS Perangkat)</button>
                    </div>
                    
                    <!-- INPUT HIDDEN UNTUK DATA KOORDINAT -->
                    <input type="hidden" id="latitude-input" name="latitude">
                    <input type="hidden" id="longitude-input" name="longitude">

                    <!-- TEMPAT TULISAN ALAMAT HASIL AUTO-FILL DARI PETA -->
                    <div class="form-group">
                        <label>Alamat Pengiriman Terdeteksi</label>
                        <textarea id="alamat-textarea" name="alamat_lengkap" rows="3" placeholder="Silakan tandai atau klik peta di atas untuk memuat alamat rumah Anda..." readonly required></textarea>
                    </div>
                    
                    <div class="form-row-split">
                        <div class="form-group">
                            <label>Kota / Kabupaten</label>
                            <input type="text" id="kota-input" name="kota" readonly required>
                        </div>
                        <div class="form-group">
                            <label>Kode Pos</label>
                            <input type="text" id="kodepos-input" name="kode_pos" readonly required>
                        </div>
                    </div>
                    
                    <a href="{{ route('keranjang') }}" class="btn-back">← Kembali ke Keranjang</a>
                </div>
                
                <!-- SISI KANAN: RINGKASAN DATA BELANJA -->
                <div class="order-summary-box">
                    <h3 class="summary-box-title">Ringkasan Barang</h3>
                    
                    @php $subtotal = 0; @endphp
                    @foreach($keranjang as $id => $item)
                        @php $subtotal += $item['harga'] * $item['jumlah']; @endphp
                        <div class="summary-item">
                            <div>
                                <span style="font-weight: 600; font-size: 14px;">{{ $item['nama'] }}</span>

                                <div style="font-size: 11px; color: #747d8c; margin-top: 2px;">Varian: {{ $item['ukuran'] }} | {{ $item['warna'] }} (x{{ $item['jumlah'] }})</div>
                            </div>
                            <span style="font-size: 14px; font-weight: 600;">Rp {{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                    
                    <div class="price-divider"></div>
                    <div class="row-calc">
                        <span>Total Harga Barang</span>
                        <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="row-calc">
                        <span>Ongkos Kirim</span>
                        <span style="color: #2ed573; font-weight: bold;">Gratis</span>
                    </div>
                    <div class="total-calc">
                        <span>Total Pembayaran</span>
                        <span style="color: #ff4757;">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    
                    <button type="submit" class="btn-submit-checkout">Lanjut Ke Pembayaran</button>
                </div>
                
            </div>
        </form>
    </div>

    <script>
        let map, marker, geocoder;

        function initMap() {
            // Default awal koordinat (Pusat Jakarta) sebelum ditandai pembeli
            const posisiDefault = { lat: -6.2088, lng: 106.8456 };

            geocoder = new google.maps.Geocoder();

            map = new google.maps.Map(document.getElementById("google-maps-box"), {
                zoom: 14,
                center: posisiDefault,
                mapTypeControl: false,
                streetViewControl: false
            });

            marker = new google.maps.Marker({
                position: posisiDefault,
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP
            });

            // Klik langsung di area peta manapun
            map.addListener("click", (e) => {
                marker.setPosition(e.latLng);
                prosesDeteksiAlamatOtomatis(e.latLng);
            });

            // Geser pin merah secara manual
            marker.addListener("dragend", () => {
                prosesDeteksiAlamatOtomatis(marker.getPosition());
            });
        }

        // Tombol Deteksi GPS Perangkat Aktif
        function ambilLokasiGPSCurrentUser() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    const posUser = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(posUser);
                    map.setZoom(16);
                    marker.setPosition(posUser);
                    prosesDeteksiAlamatOtomatis(posUser);
                }, () => {
                    alert("Gagal mendeteksi GPS. Silakan klik langsung pada peta.");
                });
            } else {
                alert("Browser Anda tidak mendukung fitur GPS.");
            }
        }

        // Membongkar titik koordinat menjadi teks alamat otomatis
        function prosesDeteksiAlamatOtomatis(latLng) {
            const lokasi = { 
                lat: parseFloat(latLng.lat ? latLng.lat() : latLng.lat), 
                lng: parseFloat(latLng.lng ? latLng.lng() : latLng.lng) 
            };
            
            document.getElementById("latitude-input").value = lokasi.lat;
            document.getElementById("longitude-input").value = lokasi.lng;

            geocoder.geocode({ location: lokasi }, (results, status) => {
                if (status === "OK" && results) {
                    // Otomatis mengisi textarea alamat terdeteksi
                    document.getElementById("alamat-textarea").value = results.formatted_address;
                    
                    let kota = "";
                    let kodepos = "";
                    
                    for (const komponen of results.address_components) {
                        if (komponen.types.includes("administrative_area_level_2")) {
                            kota = komponen.long_name;
                        }
                        if (komponen.types.includes("postal_code")) {
                            kodepos = komponen.long_name;
                        }
                    }

                    document.getElementById("kota-input").value = kota ? kota : "Kota Tidak Terdeteksi";
                    document.getElementById("kodepos-input").value = kodepos ? kodepos : "-";
                }
            });
        }
    </script>

    <script src="https://googleapis.com" async defer></script>
</body>
</html>
