<header class="main-header">
    <div class="logo-container" style="display: flex; align-items: center; gap: 10px;">
        <img src="{{ asset('image/tingang.png') }}" alt="Logo" class="logo" style="height: 60px; width: auto;">

        <a href="/" style="font-size: 16px; line-height: 1.2; color: #ffffff; text-decoration: none;">
            <b>Tempat Informasi dan<br>Gerbang Pelayanan Digital</b>
        </a>
    </div>
    <div class="nav-center">
        <a href="{{ route('beranda') }}" class="nav-link">Beranda</a>
    </div>

    <div class="nav-center">
        @auth
            {{-- Cek role user --}}
            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'superadmin')
                <a href="{{ route('backend.dashboard') }}" class="nav-link">Dashboard</a>
            @endif
        @endauth
    </div>

    <button id="toggle-dark-mode">
        <i class="bi bi-moon-fill"></i>
    </button>
</header>
