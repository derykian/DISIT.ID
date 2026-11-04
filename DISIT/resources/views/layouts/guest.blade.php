<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>DISIT ID - Authentication</title>
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
            body { background-color: #0c0c0e; color: #ffffff; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
            .login-box { width: 100%; max-width: 400px; padding: 30px; background-color: #16161a; border-radius: 8px; border: 1px solid #24242b; box-shadow: 0 10px 25px rgba(0,0,0,0.5); text-align: center; }
            .logo { font-size: 2rem; font-weight: 900; color: #ffffff; letter-spacing: 2px; text-decoration: none; display: block; margin-bottom: 25px; }
            .logo span { color: #ff4757; }
            .form-group { text-align: left; margin-bottom: 18px; }
            .form-group label { display: block; font-size: 14px; font-weight: 600; color: #a4b0be; margin-bottom: 6px; }
            .form-group input { width: 100%; padding: 10px 14px; background-color: #0c0c0e; border: 1px solid #24242b; border-radius: 4px; color: #ffffff; font-size: 15px; outline: none; transition: 0.3s; }
            .form-group input:focus { border-color: #ff4757; }
            .flex-actions { display: flex; justify-content: space-between; align-items: center; font-size: 13px; color: #a4b0be; margin-bottom: 20px; }
            .flex-actions a { color: #a4b0be; text-decoration: underline; }
            .flex-actions a:hover { color: #ff4757; }
            .btn-submit { width: 100%; padding: 12px; background-color: #ff4757; color: #ffffff; border: none; border-radius: 4px; font-weight: bold; font-size: 15px; cursor: pointer; transition: 0.3s; }
            .btn-submit:hover { background-color: #ff6b81; }
            .footer-text { margin-top: 20px; font-size: 14px; color: #a4b0be; }
            .footer-text a { color: #ff4757; text-decoration: none; font-weight: bold; }
            .footer-text a:hover { text-decoration: underline; }
            .error-msg { color: #ff4757; font-size: 13px; margin-top: 6px; text-align: left; font-weight: 600; }
        </style>
    </head>
    <body>
        <div class="login-box">
            <a href="/" class="logo">DISIT<span>.ID</span></a>
            {{ $slot }}
        </div>
    </body>
</html>
