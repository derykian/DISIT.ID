<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - DISIT ID</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Montserrat', sans-serif; }
        body { background-color: #121212; color: #fff; padding: 40px 20px; }
        .header { text-align: center; margin-bottom: 40px; }
        .header h1 { font-size: 2.5rem; letter-spacing: 2px; }
        .header h1 span { color: #ff4757; }
        .header p { color: #a4b0be; margin-top: 5px; }
        .catalog-container { display: flex; justify-content: center; gap: 30px; flex-wrap: wrap; max-width: 1200px; margin: 0 auto; }
        .product-card { background: #1e1e1e; border-radius: 8px; overflow: hidden; width: 280px; box-shadow: 0 4px 10px rgba(0,0,0,0.3); transition: 0.3s; }
        .product-card:hover { transform: translateY(-5px); }
        .product-image { height: 250px; background: #2f3542; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #747d8c; }
        .product-info { padding: 20px; }
        .product-name { font-size: 1.2rem; font-weight: bold; margin-bottom: 8px; }
        .product-price { color: #ff4757; font-weight: bold; font-size: 1.1rem; margin-bottom: 15px; }
        .btn-buy { display: block; text-align: center; background: #ff4757; color: white; padding: 10px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: 0.3s; }
        .btn-buy:hover { background: #ff6b81; }
    </style>
</head>
<body>
    <div class="header">
        <h1>KATALOG<span> PRODUK</span></h1>
        <p>Koleksi Pakaian Terbaik dari DISIT ID</p>
    </div>
    <div class="catalog-container">
        <!-- Produk 1 -->
        <div class="product-card">
            <div class="product-image">KAOS OVERSIDE DISIT</div>
            <div class="product-info">
                <div class="product-name">DISIT Black T-Shirt</div>
                <div class="product-price">Rp 149.000</div>
                <a href="#" class="btn-buy">Pilih Varian</a>
            </div>
        </div>
        <!-- Produk 2 -->
        <div class="product-card">
            <div class="product-image">HOODIE DISIT</div>
            <div class="product-info">
                <div class="product-name">DISIT Street Hoodie</div>
                <div class="product-price">Rp 299.000</div>
                <a href="#" class="btn-buy">Pilih Varian</a>
            </div>
        </div>
    </div>
</body>
</html>
