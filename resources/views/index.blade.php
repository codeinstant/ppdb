@extends('layout.master')
@section('title','Dashboard')
@section('content')
<div class="content-wrapper">
  <!-- Main content -->
  <style>
    .jumbotron {
      background-image: url("https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=1920,fit=crop/AzGRxyegrGSGN2G3/BACKGROUND-mxB3a4x0WvHvz2Kd.png");
      background-size: cover;
    }
  </style>
  <div class="jumbotron">
    <h1 class="display-4">Selamat Datang!</h1>
    <p class="lead">di PPDB </p>



    <hr class="my-4">
    <p>Situs ini dipersiapkan sebagai pengganti pusat informasi dan pengolahan seleksi data siswa peserta PPDB Provinsi DKI Jakarta Periode 2022 / 2023 secara online real time process untuk pelaksanaan PPDB Online.</p>
    @foreach($gelombang as $key => $sek)
      <hr>
      <h4>Gelombang ke {{$sek['gelombang']}}</h4>
      <p>Tahun angkatan {{$sek['tahun_angkatan']}}</p>
      @if($pendaftar == null)
        <p>Open at {{$sek['buka']}}</p>
        @if($can_daftar[$key])
        <p><a href="/form/{{$sek['id']}}" class="btn btn-primary">Daftar Sekarang!</a></p>
        @endif
        <p>Close at {{$sek['tutup']}}</p>
      @else
        @php
        $same = false;
        foreach ($pendaftar as $k => $p)
            if ($p['penerimaan_id'] === $sek['id']){
              $same = true;
            }
        @endphp
        @if ($same)
          <a href="/pengumuman/{{$sek['id']}}" class="btn btn-primary">Lihat Pengumuman</a>
        @else
          <p>Open at {{$sek['buka']}}</p>
          @if($can_daftar[$key])
            <p><a href="/form/{{$sek['id']}}" class="btn btn-primary">Daftar Sekarang!</a></p>
          @endif
          <p>Close at {{$sek['tutup']}}</p>
        @endif
      @endif
    @endforeach
    {{-- <p class="lead">
      @guest
      <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Log In</a>
      @endguest
    </p> --}}
  </div>
</div>

  <!-- /.content --> 
    
@endsection