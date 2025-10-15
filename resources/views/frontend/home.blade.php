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
            padding: 20px 10px;
            background: none;
            border: none;
            cursor: pointer;
            opacity: 0;
            transform: translateY(30px);
            text-align: center;
        }

        .service-item:hover {
            transform: translateY(-5px);
        }

        .service-item.visible {
            opacity: 1;
            transform: translateY(0);
            transition: transform 0.25s ease, opacity 0.25s ease;
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
            margin-top: 10px;
            font-weight: 600;
            color: #555;
            font-family: inherit;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .service-item:hover .service-name {
            color: #08075a;
        }

        /* === Style untuk Berita & Pengumuman === */
        .card-elev {
            border: 0;
            border-radius: 14px;
            transition: transform .25s, box-shadow .25s;
        }

        .card-elev:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, .12);
        }

        .card-img-top {
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 14px;
            border-top-right-radius: 14px;
        }

        .link-anim {
            position: relative;
            text-decoration: none;
        }

        .link-anim::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 100%;
            height: 2px;
            background: currentColor;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .25s;
        }

        .link-anim:hover::after {
            transform: scaleX(1);
        }

        .clamp-2 {
            -webkit-line-clamp: 2;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .clamp-3 {
            -webkit-line-clamp: 3;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    {{-- === Carousel === --}}
@section('carousel')
    <div class="carousel-slide active">
        <img src="{{ asset('templateadmin/dist/img/slide1.jpg') }}" alt="Slide 1">
    </div>
    <div class="carousel-slide">
        <img src="{{ asset('templateadmin/dist/img/slide2.jpg') }}" alt="Slide 2">
    </div>
    <div class="carousel-slide">
        <img src="{{ asset('templateadmin/dist/img/slide3.jpg') }}" alt="Slide 3">
    </div>
    <div class="carousel-slide">
        <img src="{{ asset('templateadmin/dist/img/slide4.jpg') }}" alt="Slide 4">
    </div>
    <div class="carousel-slide">
        <img src="{{ asset('templateadmin/dist/img/slide5.jpg') }}" alt="Slide 5">
    </div>
@endsection

{{-- === Kategori Layanan === --}}
<div class="title-wrapper">
    <h2 class="section-title text-center">Layanan</h2>
    <div class="service-grid">
        @php
            $layananStatis = [
                ['icon' => '🏛️', 'nama' => 'Kependudukan'],
                ['icon' => '🎓', 'nama' => 'Pendidikan'],
                ['icon' => '🏥', 'nama' => 'Kesehatan'],
                ['icon' => '⚖️', 'nama' => 'Hukum'],
                ['icon' => '🧾', 'nama' => 'Pajak & Retribusi'],
                ['icon' => '🌴', 'nama' => 'Pariwisata'],
                ['icon' => '💼', 'nama' => 'Penanaman Modal'],
                ['icon' => '🛒', 'nama' => 'Perdagangan'],
                ['icon' => '🏠', 'nama' => 'Pemerintahan'],
                ['icon' => '✨', 'nama' => 'Lainnya'],
            ];
        @endphp
        @foreach ($kategoris as $item)
            @php $slug = Str::slug($item['nama']); @endphp
            <a href="{{ route('Layanan.read', $item->id) }}" class="service-item" style="text-decoration:none;">
                <img src="{{ $item->foto ? asset('storage/kategori/' . $item->foto) : asset('asset/lambang_mura.png') }}"
                                                style="width:300px; height:200px; object-fit:contain;">
                <p class="service-name">{{ $item->nama_kategori }}</p>
            </a>
        @endforeach
    </div>
</div>

{{-- === Berita Terbaru Murung Raya === --}}
<div class="title-wrapper">
    <h2 class="section-title text-center">Berita Terbaru Murung Raya</h2>
    <div class="row g-3">
        @forelse($berita ?? [] as $it)
            @php $delay = ($loop->index % 6) * 80; @endphp
            <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                <div class="card card-elev h-100">
                    @if ($it['image'])
                        <img src="{{ $it['image'] }}" class="card-img-top" alt="{{ $it['title'] }}" loading="lazy">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <div class="small text-muted mb-1">{{ $it['date'] }}</div>
                        <h2 class="h6 mb-2 clamp-2">
                            <a class="stretched-link link-anim" href="">
                                {{ $it['title'] }}
                            </a>
                        </h2>
                        <p class="text-secondary mb-0 clamp-3">{{ $it['excerpt'] }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">Belum ada berita.</p>
            </div>
        @endforelse
    </div>
</div>

{{-- === Pengumuman Terbaru Murung Raya === --}}
<div class="bg-light py-5">
    <div class="title-wrapper">
        <h2 class="section-title text-center">Pengumuman Terbaru Murung Raya</h2>
        <div class="row g-3">
            @forelse($pengumuman ?? [] as $item)
                @php
                    $title = strip_tags(data_get($item, 'title.rendered', 'Tanpa Judul'));
                    $id = data_get($item, 'id');
                    $img = data_get($item, '_embedded.wp:featuredmedia.0.source_url');
                    $dateRaw = data_get($item, 'date');
                    $date = $dateRaw ? \Carbon\Carbon::parse($dateRaw)->translatedFormat('d M Y') : '-';
                    $excerpt = \Illuminate\Support\Str::limit(strip_tags(data_get($item, 'excerpt.rendered', '')), 160);
                @endphp
                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="card h-100 shadow-sm border-0">
                        @if ($img)
                            <img src="{{ $img }}" class="card-img-top" alt="{{ $title }}"
                                loading="lazy">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <div class="small text-muted mb-1">{{ $date }}</div>
                            <h2 class="h6">
                                <a href=""
                                    class="stretched-link text-decoration-none">
                                    {{ $title }}
                                </a>
                            </h2>
                            <p class="text-secondary mb-0">{{ $excerpt }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada pengumuman.</p>
            @endforelse
        </div>
    </div>
</div>

{{-- === Script AOS === --}}
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        once: true,
        duration: 650,
        offset: 80,
        easing: 'ease-out-cubic'
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
