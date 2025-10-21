<header class="main-header">
    <div class="logo-container">
        <img src="{{ asset('templateadmin/dist/img/img.png') }}" alt="Logo" class="logo">
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

</header>
