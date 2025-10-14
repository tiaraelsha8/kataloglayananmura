@extends('frontend.layout.app')
@section('title', 'Layanan Pendidikan')

@section('carousel')
    <div class="carousel-slide active">
        <img src="{{ asset('templateadmin/dist/img/layanan1.jpg') }}" alt="Layanan">
    </div>
    <div class="carousel-slide">
        <img src="{{ asset('templateadmin/dist/img/layanan2.jpg') }}" alt="Layanan">
    </div>
    <div class="carousel-slide">
        <img src="{{ asset('templateadmin/dist/img/layanan3.jpg') }}" alt="Layanan">
    </div>
    <div class="carousel-slide">
        <img src="{{ asset('templateadmin/dist/img/layanan4.jpg') }}" alt="Layanan">
    </div>
    <div class="carousel-slide">
        <img src="{{ asset('templateadmin/dist/img/layanan5.jpg') }}" alt="Layanan">
    </div>
@endsection
@section('content')
    <div class="title-wrapper">
        <h1 class="section-title">Layanan Pendidikan</h1>
        <p>Informasi program pendidikan, bantuan sekolah, dan kegiatan literasi masyarakat.</p>
    </div>
    <section class="icon-section">
        <div class="icon-grid">
            <div class="icon-item">
                <img src="{{ asset('templateadmin/dist/img/layananpendidikan1.png') }}" class="icon-image" alt="Icon 1">
                <p class="icon-title">Pendidikan</p>
            </div>
            <div class="icon-item">
                <img src="{{ asset('templateadmin/dist/img/layananpendidikan2.png') }}" class="icon-image" alt="Icon 2">
                <p class="icon-title">Kesehatan</p>
            </div>
            <div class="icon-item">
                <img src="{{ asset('templateadmin/dist/img/layananpendidikan3.png') }}" class="icon-image" alt="Icon 3">
                <p class="icon-title">Sosial</p>
            </div>
            <div class="icon-item">
                <img src="{{ asset('templateadmin/dist/img/layananpendidikan4.png') }}" class="icon-image" alt="Icon 4">
                <p class="icon-title">Umum</p>
            </div>
            <div class="icon-item">
                <img src="{{ asset('templateadmin/dist/img/layananpendidikan5.png') }}" class="icon-image" alt="Icon 5">
                <p class="icon-title">Transportasi</p>
            </div>
        </div>
    </section>
@endsection
