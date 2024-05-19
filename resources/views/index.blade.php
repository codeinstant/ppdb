@extends('layout.master')
@section('title', 'Dashboard')
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
            <p>Situs ini dipersiapkan sebagai pengganti pusat informasi dan pengolahan seleksi data siswa peserta PPDB
                Provinsi Sumatera Selatan Periode 2024 / 2025 secara online real time process untuk pelaksanaan PPDB Online.
            </p>

            @foreach ($gelombang as $key => $sek)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gelombang ke {{ $sek['gelombang'] }}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Tahun angkatan {{ $sek['tahun_angkatan'] }}</p>
                        <p>Open at {{ $sek['buka'] }}</p>
                        @if ($can_daftar[$key])
                            <p><a href="/form/{{ $sek['id'] }}" class="btn btn-primary">Daftar Sekarang!</a></p>
                        @endif
                        <p>Close at {{ $sek['tutup'] }}</p>
                    </div>
                </div>
                <!-- /.card -->
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
