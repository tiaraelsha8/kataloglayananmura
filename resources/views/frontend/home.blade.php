@extends('frontend.layout.app')

@section('title', 'Beranda')

@section('content')
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* === Carousel === */
        .carousel-container {
            position: relative;
            width: 100%;
            height: 88vh;
            overflow: hidden;
            margin-top: 75px;
            margin-bottom: 75px;
        }

        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 1.2s ease, transform 1.2s ease;
        }

        .carousel-slide.active {
            opacity: 1;
            transform: scale(1);
            z-index: 1;
        }

        .carousel-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* === Kategori Layanan === */
        .section-title::after {
            content: none;
        }

        .service-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 25px;
            width: calc(100% - 40px);
            justify-items: center;
        }

        .service-item {
            width: 100%;
            max-width: 250px;
            background: none;
            flex-direction: none;
            border: none;
            cursor: pointer;
            opacity: 0;
            transform: translateY(30px);
            text-align: center;
            transition: all 0.3s ease;
            animation: appearFromCenter 0.6s ease forwards;
        }

        .service-item:hover {
            transform: translateY(-5px) scale(1.02);
        }

        .service-item.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .service-item img {
            width: 65px;
            height: 65px;
            margin-bottom: 10px;
            background: none;
            object-fit: contain;
            transform-origin: center center;
            backface-visibility: hidden;
            will-change: transform;
            transition: transform 0.3s ease;
        }

        .service-item:hover img {
            transform: scale(1.1);
        }

        .icon-placeholder {
            font-size: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .service-item:hover .icon-placeholder {
            transform: scale(1.25);
        }

        .service-name {
            font-weight: 600;
            color: #000;
            font-family: inherit;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .service-item:hover .service-name {
            color: #08075a;
        }

        /* === Berita === */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }

        .card-wrapper {
            display: flex;
            justify-content: center;
        }

        .card-elev {
            border: 0;
            border-radius: 14px;
            transition: transform 0.25s, box-shadow 0.25s;
            overflow: hidden;
            background: #fff;
        }

        .card-elev:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.12);
        }

        .card-img-top {
            height: 180px;
            object-fit: cover;
            width: 100%;
            display: block;
        }

        .card-body {
            display: flex;
            flex-direction: column;
        }

        .card-date {
            font-size: 0.85rem;
            color: #888;
            margin-bottom: 6px;
        }

        .card-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .card-link {
            color: #000;
            text-decoration: none;
            position: relative;
        }

        .card-link::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 100%;
            height: 2px;
            background: currentColor;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.25s ease;
        }

        .card-link:hover::after {
            transform: scaleX(1);
        }

        .card-excerpt {
            color: #555;
            font-size: 0.9rem;
            line-height: 1.4;
            margin: 0;
        }

        .clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* === Pengumuman === */
        .announcement-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }

        .announcement-card {
            height: 100%;
            border: 0;
            border-radius: 14px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .announcement-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.12);
        }

        .announcement-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 14px;
            border-top-right-radius: 14px;
        }

        .announcement-body {
            display: flex;
            flex-direction: column;
        }

        .announcement-date {
            font-size: 0.9rem;
            color: #888;
            margin-bottom: 4px;
        }

        .announcement-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .announcement-link {
            text-decoration: none;
            color: #000;
            position: relative;
            display: inline-block;
        }

        .announcement-link:hover {
            text-decoration: none;
        }

        .announcement-excerpt {
            color: #6c757d;
            font-size: 0.95rem;
            margin: 0;
        }
    </style>

    {{-- === Carousel === --}}
@section('carousel')
    @forelse ($carousel as $item)
        <div class="carousel-slide">
            <img src="{{ $item->foto ? asset('storage/carousel/' . $item->foto) : asset('asset/lambang_mura.png') }}" alt="{{ $item->id }}">
        </div>
    @empty
        <p>Belum ada data</p>
    @endforelse
@endsection

    {{-- === Kategori Layanan === --}}
    <div>
        <h2 class="section-title">Layanan</h2>
    </div>
    <section class="global-section">
        <div class="service-grid">
            @foreach ($kategoris as $item)
                @php $slug = Str::slug($item['nama']); @endphp
                <a href="{{ route('Layanan.read', $item->id) }}" class="service-item">
                    <img
                        src="{{ $item->foto ? asset('storage/kategori/' . $item->foto) : asset('asset/lambang_mura.png') }}">
                    <p class="service-name">{{ $item->nama_kategori }}</p>
                </a>
            @endforeach
        </div>
    </section>

    {{-- === Berita === --}}
    <div>
        <h2 class="section-title">Berita Terbaru Murung Raya</h2>
    </div>
    <section class="global-section">
        <div class="card-grid">
            @forelse($berita ?? [] as $it)
                <div class="card-wrapper" data-aos="fade-up">
                    <div class="card card-elev">
                        @if ($it['image'])
                            <img src="{{ $it['image'] }}" class="card-img-top" alt="{{ $it['title'] }}" loading="lazy">
                        @endif
                        <div class="card-body">
                            <div class="card-date">{{ $it['date'] }}</div>
                            <h2 class="card-title clamp-2">
                                <a href="" class="card-link">{{ $it['title'] }}</a>
                            </h2>
                            <p class="card-excerpt clamp-3">{{ $it['excerpt'] }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada berita.</p>
            @endforelse
        </div>
    </section>

    {{-- === Pengumuman === --}}
    <div>
        <h2 class="section-title">Pengumuman Terbaru Murung Raya</h2>
    </div>
    <section class="global-section">
        <div class="announcement-grid">
            @forelse($pengumuman ?? [] as $it)

                <div class="card-wrapper" data-aos="fade-up">
                    <div class="announcement-card">
                        @if ($it['image'])
                            <img src="{{ $it['image'] }}" alt="{{ $it['title'] }}" loading="lazy"
                                class="announcement-img">
                        @endif
                        <div class="announcement-body">
                            <div class="announcement-date">{{ $it['date'] }}</div>
                            <h2 class="announcement-title">
                                <a href="" class="announcement-link">{{ $it['title'] }}</a>
                            </h2>
                            <p class="announcement-excerpt">{{ $it['excerpt'] }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada pengumuman.</p>
            @endforelse
        </div>
    </section>

    {{-- === Script AOS === --}}
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 650,
            offset: 80,
            easing: 'ease-out-cubic'
        });

        // === Carousel ===
        document.addEventListener("DOMContentLoaded", () => {
            const slides = document.querySelectorAll(".carousel-slide");
            let index = 0;
            setInterval(() => {
                slides[index].classList.remove("active");
                index = (index + 1) % slides.length;
                slides[index].classList.add("active");
            }, 4000);
        });

        document.addEventListener('beforeunload', () => {
            document.querySelectorAll('.icon-item').forEach(icon => {
                icon.style.animation = 'disappearToCenter 0.5s ease forwards';
            });
        });

        // Animasi muncul untuk kategori layanan
        const observer = new IntersectionObserver(entries => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    setTimeout(() => entry.target.classList.add('visible'), i * 100);
                }
            });
        }, {
            threshold: 0.2
        });
        document.querySelectorAll('.service-item').forEach(item => observer.observe(item));
    </script>
@endsection
