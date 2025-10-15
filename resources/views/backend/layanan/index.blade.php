@extends('backend.layouts.master')

@section('judul')
    Halaman Kelola Layanan
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif



    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Layanan</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="{{ route('layanan.create') }}" class="btn btn-primary btn-sm mb-3">Tambah</a>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Layanan</th>
                                    <th>Kategori</th>
                                    <th>Link</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($layanans as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->nama_layanan }}</td>
                                        <td>{{ $value->kategoris->nama_kategori }}</td>
                                        <td>{{ $value->link }}</td>

                                        <td>
                                            <img src="{{ $value->foto ? asset('storage/layanan/' . $value->foto) : asset('asset/lambang_mura.png') }}"
                                                style="width:300px; height:200px; object-fit:contain;">
                                        </td>
                                        <td>
                                            <form action="{{ route('layanan.destroy', $value->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('layanan.edit', $value->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada data layanan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
