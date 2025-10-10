@extends('backend.layouts.master')

@section('judul')
    Halaman Tambah Kategori
@endsection

@section('content')
    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box-body">

            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" placeholder="Isikan Nama Dinas">
            </div>
            @error('nama_kategori')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="form-group">
                <label for="image">Logo Kategori</label>
                <input type="file" class="form-control-file" name="foto" accept="image/*">
                <p>png. max 2 MB</p>
            </div>
            @error('foto')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route ('kategori.index') }}" class="btn btn-default">Kembali</a>
            </div>
    </form>
@endsection
