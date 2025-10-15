@extends('frontend.layout.app')
@section('title', 'Layanan Kesehatan')

@section('content')
    <div class="title-wrapper">
        <h1 class="section-title">{{ $kategoris->nama_kategori }}</h1>
        {{-- <p>Pelayanan kesehatan masyarakat, program imunisasi, dan layanan puskesmas.</p> --}}
    </div>
    <section class="icon-section">
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
