@extends('backend.layouts.master')

@section('judul')
    Halaman Edit Layanan
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('layanan.update', $layanans->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">

                    <div class="form-group">
                        <label>Nama Layanan</label>
                        <input type="text" class="form-control" name="nama_layanan" value="{{ $layanans->nama_layanan }}">
                    </div>
                    @error('nama_layanan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori_id" class="form-control" id="">
                            <option value="">-- Pilih Kategori --</option>
                            @forelse ($kategoris as $item)
                                @if ($item->id === $layanans->kategori_id)
                                    <option value="{{ $item->id }}" selected> {{ $item->nama_kategori }} </option>
                                @else
                                    <option value="{{ $item->id }}"> {{ $item->nama_kategori }} </option>
                                @endif
                            @empty
                                <option value="">Tidak Ada Data Kategori</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" class="form-control" name="link" value="{{ $layanans->link }}">
                    </div>
                    @error('link')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="image">Foto</label>
                        <input type="file" class="form-control-file" name="foto" accept="image/*">
                        <p>png. max 2 MB</p>
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
