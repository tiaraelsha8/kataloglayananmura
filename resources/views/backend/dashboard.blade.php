@extends('backend.layouts.master')

@section('judul')

    Halaman Admin
    <h1>Selamat Datang di Dashboard Admin <strong>{{ Auth::user()->name }}</strong></h1>

@endsection

@section('content')

<div class="container-fluid">


    <!-- Main row -->
    <div class="row">
      <section class="col-12">
        
      </section>
    </div>


  </div>

    
@endsection