@extends('frontend.layout.app')
@section('title', 'Layanan Kesehatan')

@section('content')

    {{-- === Hero Section (pakai class global)  === --}}
    <div class="layanan-hero">
        <div class="layanan-overlay"></div>
        <div class="layanan-hero-content">
            <h1>{{ $kategoris->nama_kategori }}</h1>
            <p>Beranda > Layanan > {{ $kategoris->nama_kategori }}</p>
        </div>
    </div>

    {{-- === Konten utama (pakai class global) === --}}
    <div>
        <h1 class="section-title">{{ $kategoris->nama_kategori }}</h1>
    </div>

    <section class="global-section">
        <div class="icon-grid">
            @forelse ($kategoris->layanans as $item)
                <a href="{{ $item->link }}">
                    <div class="icon-item">
                        <img src="{{ $item->foto ? asset('storage/layanan/' . $item->foto) : asset('asset/lambang_mura.png') }}"
                            class="icon-image" alt="Icon 1">
                        <p class="icon-title">{{ $item->nama_layanan }}</p>
                    </div>
                </a>
            @empty
                <p>Belum ada data</p>
            @endforelse
        </div>
    </section>
@endsection
