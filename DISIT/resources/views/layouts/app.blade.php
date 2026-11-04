<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dashboard User - DISIT ID</title>
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
            body { background-color: #0c0c0e; color: #ffffff; min-height: 100vh; }
            nav { bg-color: #16161a; background-color: #16161a; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #24242b; }
            .nav-logo { font-size: 1.5rem; font-weight: 900; color: #ffffff; letter-spacing: 2px; text-decoration: none; }
            .nav-logo span { color: #ff4757; }
            .nav-user { display: flex; align-items: center; gap: 15px; }
            .user-name { font-weight: 600; color: #a4b0be; }
            .btn-logout { padding: 6px 15px; background-color: #ff4757; color: #ffffff; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; transition: 0.3s; }
            .btn-logout:hover { background-color: #ff6b81; }
            main { padding: 40px 20px; max-width: 800px; margin: 50px auto 0 auto; text-align: center; }
            .card { background-color: #16161a; border: 1px solid #24242b; padding: 40px; border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
            h1 { font-size: 2rem; margin-bottom: 10px; color: #ffffff; }
            p { color: #a4b0be; font-size: 16px; margin-bottom: 30px; line-height: 1.6; }
            .btn-shop { display: inline-block; padding: 12px 30px; background-color: #ff4757; color: #ffffff; text-decoration: none; border-radius: 4px; font-weight: bold; transition: 0.3s; box-shadow: 0 4px 15px rgba(255, 71, 87, 0.3); }
            .btn-shop:hover { background-color: #ff6b81; transform: translateY(-2px); }
        </style>
    </head>
    <body>
        <nav>
            <a href="/" class="nav-logo">DISIT<span>.ID</span></a>
            <div class="nav-user">
                <span class="user-name">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout">Keluar</button>
                </form>
            </div>
        </nav>

        <main>
            <div class="card">
                <h1>Selamat Datang di DISIT ID!</h1>
                <p>Akun Anda berhasil diverifikasi. Langkah selanjutnya sesuai dengan alur sistem belanja Anda adalah memilih pakaian distro impianmu di halaman katalog.</p>
                <a href="{{ route('home') }}" class="btn-shop">Mulai Belanja</a>
            </div>
        </main>
    </body>
</html>
