<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Berhasil - DISIT ID</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #ffffff; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; }
        .success-card { max-width: 500px; width: 100%; border: 1px solid #ced6e0; border-radius: 8px; padding: 40px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .icon-check { font-size: 60px; color: #2ed573; margin-bottom: 20px; display: block; }
        h1 { font-size: 24px; font-weight: 800; text-transform: uppercase; margin-bottom: 15px; letter-spacing: 1px; }
        p { font-size: 14px; color: #57606f; line-height: 1.6; margin-bottom: 25px; }
        .invoice-box { background-color: #f8f9fa; border: 1px dashed #ced6e0; padding: 12px; font-weight: bold; border-radius: 4px; font-size: 15px; margin-bottom: 30px; color: #000000; }
        .btn-home { display: inline-block; background-color: #000000; color: #ffffff; text-decoration: none; padding: 14px 30px; font-weight: bold; font-size: 13px; border-radius: 4px; text-transform: uppercase; letter-spacing: 1px; transition: 0.2s; }
        .btn-home:hover { background-color: #ff4757; }
    </style>
</head>
<body>
    <div class="success-card">
        <span class="icon-check">🎉</span>
        <h1>Transaksi Berhasil!</h1>
        <p>Bukti pembayaran Anda telah berhasil diunggah ke sistem. Admin DISIT ID akan segera memverifikasi pembayaran Anda secepatnya.</p>
        <p>Anda bisa mengecek barang telah di pesan melalui Akun Anda</p>
        <div class="invoice-box">Nomor Nota: {{ $noInvoice }}</div>
        <a href="/" class="btn-home">Kembali ke HOME</a>
    </div>
</body>
</html>
