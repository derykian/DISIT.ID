<x-guest-layout>
    @if (session('status'))
        <div style="color: #2ed573; margin-bottom: 15px; font-size: 14px;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            @if($errors->has('email'))
                <div class="error-msg">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required autocomplete="current-password" />
            @if($errors->has('password'))
                <div class="error-msg">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <div class="flex-actions">
            <label style="display: flex; align-items: center; gap: 5px; cursor: pointer;">
                <input type="checkbox" name="remember" style="width: auto; cursor: pointer;"> Ingat saya
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Lupa password?</a>
            @endif
        </div>

        <button type="submit" class="btn-submit">Masuk Sistem</button>

        <div class="footer-text">
            Belum punya akun? <a href="{{ route('register') }}">Daftar Baru</a>
        </div>
    </form>
</x-guest-layout>
