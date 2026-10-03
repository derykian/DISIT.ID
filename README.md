# DISIT.ID
website penjualan pakaian distro
# Dokumen SRS Draft & Backlog Proyek - DISIT.ID
**Matakuliah:** Capstone Project / Proyek Sistem Informasi
**Progress:** Pertemuan 4 (Analisis Kebutuhan Sistem)

---

## 1. Analisis Kebutuhan Sistem (SRS Draft)

### A. Kebutuhan Fungsional (Functional Requirements)
Kebutuhan fungsional mendefinisikan fitur-fitur utama yang wajib beroperasi di dalam sistem e-commerce DISIT.ID:

* **Autentikasi Pengguna:** Sistem harus mendukung pendaftaran akun (*Register*), masuk log (*Login*), dan keluar log (*Logout*) menggunakan sistem keamanan Laravel Breeze.
* **Manajemen Profil (Biodata):** Pengguna yang telah login dapat mengubah informasi nama lengkap dan alamat email secara terpadu melalui satu halaman akun.
* **Katalog Produk Dinamis:** Sistem menampilkan daftar pakaian distro (Kaos Oversize, Hoodie, Tas) lengkap dengan halaman detail untuk memilih varian ukuran (S/M/L/XL) dan warna.
* **Keranjang Belanja (Session Cart):** Pembeli dapat menambah, memantau jumlah, dan menghapus barang dari keranjang belanja secara *real-time* berbasis session sebelum checkout.
* **Checkout dengan Integrasi Google Maps API:** Pembeli dapat menandai titik lokasi rumah secara akurat pada peta interaktif Google Maps. Sistem secara otomatis mengubah titik koordinat (*Reverse Geocoding*) menjadi teks alamat jalan, kota, dan kode pos untuk mempermudah pengisian formulir.
* **Sistem Pembayaran & Bukti Transfer:** Sistem menyediakan opsi metode pembayaran (Transfer BCA, Mandiri, QRIS) dan menyediakan form unggah (*upload*) berkas bukti pembayaran.
* **Riwayat & Pelacakan Transaksi Berjalan:** Halaman Dashboard Akun pembeli wajib memuat riwayat nota invoice belanja yang pernah dilakukan beserta status pesanan yang dinamis (misal: *Menunggu Verifikasi Admin*).

### B. Kebutuhan Non-Fungsional (Non-Functional Requirements)
Kebutuhan non-fungsional mendefinisikan batasan kualitas, performa, dan antarmuka sistem:

* **Konsistensi UI (Antarmuka):** Komponen *Header/Navbar* atas sistem harus dikunci secara statis (*fixed height & padding*). Posisi menu navigasi harus diam di tempat dan tidak bergeser 1 piksel pun saat berpindah halaman.
* **Performa Kecepatan:** Waktu tunggu pemrosesan aksi tambah keranjang belanja dan *render* halaman di browser harus di bawah 2 detik.
* **Keamanan Data:** Kata sandi pengguna wajib dienkripsi dengan algoritma bawaan Laravel (*Bcrypt*) dan pengiriman form dilindungi dari serangan *Cross-Site Request Forgery* via token `@csrf`.
* **Ketersediaan Dokumen:** Repositori GitHub proyek harus selalu diperbarui dengan pesan komit (*commit history*) yang jelas pada setiap tahapan pertemuan.
* **Ketersediaan Dokumen:** Menambahkan waktu pada saat upload bukti pembayaran pada sisi user.
* **Ketersediaan Dokumen:** Menambahkan sisa stok dan sudah terjual berapa pada sisi user. 

---

## 2. Product Backlog Prioritas (Priority Backlog)

Daftar urutan pengerjaan fitur berdasarkan tingkat kepentingan dan ketergantungan sistem:

| Prioritas | ID Fitur | Deskripsi Fitur / Modul | Status saat Ini | Target Pertemuan |
| :--- | :--- | :--- | :--- | :--- |
| **1 (Tinggi)** | F-01 | Setup Otentikasi Akun (Laravel Breeze) | Selesai | Pertemuan 9 (BE) |
| **2 (Tinggi)** | F-02 | Logika Session Keranjang Belanja | Selesai | Pertemuan 9 (BE) |
| **3 (Tinggi)** | F-03 | Rute Pengalihan Nota Transaksi & Dashboard Akun | Selesai | Pertemuan 9 (BE) |
| **4 (Sedang)** | F-04 | Desain Kunci UI Navbar Universal (Konsisten & Statis) | Selesai | Pertemuan 6 (UI) |
| **5 (Sedang)** | F-05 | Integrasi Peta Google Maps API pada Formulir Checkout | Siap Diimplementasikan | Pertemuan 11 (FE) |
| **6 (Rendah)**| F-06 | Dashboard Panel Admin untuk Verifikasi Status Pesanan| Rencana Pengembangan | Pertemuan 13 (Evaluasi)|

---
*Dokumen ini disusun untuk memenuhi indikator penilaian capaian tugas Pertemuan 4 dan telah diunggah ke repositori GitHub.*
