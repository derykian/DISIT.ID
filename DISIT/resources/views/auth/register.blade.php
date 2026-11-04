<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama Lengkap -->
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
            @if($errors->has('name'))
                <div class="error-msg">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <!-- Email -->
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
            @if($errors->has('email'))
                <div class="error-msg">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <!-- Password -->
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required autocomplete="new-password" />
            @if($errors->has('password'))
                <div class="error-msg">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <!-- Konfirmasi Password -->
        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        <button type="submit" class="btn-submit" style="margin-top: 10px;">Daftar Sekarang</button>

        <div class="footer-text">
            Sudah punya akun? <a href="{{ route('login') }}">Login Masuk</a>
        </div>
    </form>
</x-guest-layout>
