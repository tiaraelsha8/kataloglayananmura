@extends('backend.layouts.master')

@section('judul')
    Halaman Tambah Pegawai
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">

                    <div class="form-group">
                        <label>Nama Layanan</label>
                        <input type="text" class="form-control" name="nama_layanan" placeholder="Isikan Nama Layanan">
                    </div>
                    @error('nama_layanan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori_id" class="form-control" id="">
                            <option value="">-- Pilih kategori --</option>
                            @forelse ($kategoris as $item)
                                <option value="{{ $item->id }}"> {{ $item->nama_kategori }} </option>
                            @empty
                                <option value="">Tidak Ada Data Kategori</option>
                            @endforelse
                        </select>
                    </div>
                    @error('bidang_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label>Link Layanan</label>
                        <input type="text" class="form-control" name="link" placeholder="Isikan Link Layanan">
                    </div>
                    @error('link')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="image">Foto</label>
                        <input type="file" class="form-control-file" name="foto" accept="image/*">
                    </div>
                    @error('foto')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('layanan.index') }}" class="btn btn-default">Kembali</a>
                    </div>
            </form>
        </div>
    </div>
@endsection
