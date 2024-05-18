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
                Provinsi DKI Jakarta Periode 2022 / 2023 secara online real time process untuk pelaksanaan PPDB Online.</p>

            @if ($pendaftar == null)
                @foreach ($gelombang as $key => $sek)
                    <hr>
                    <h4>Gelombang ke {{ $sek['gelombang'] }}</h4>
                    <p>Tahun angkatan {{ $sek['tahun_angkatan'] }}</p>
                    <p>Open at {{ $sek['buka'] }}</p>
                    @if ($can_daftar[$key])
                        <p><a href="/form/{{ $sek['id'] }}" class="btn btn-primary">Daftar Sekarang!</a></p>
                    @endif
                    <p>Close at {{ $sek['tutup'] }}</p>
                @endforeach
            @else
                @php
                    $sudah_lulus = false;
                    foreach ($pendaftar as $i => $p) {
                        if ($p->status == 4) {
                            $sudah_lulus = true;
                        }
                    }
                @endphp
                @if ($sudah_lulus)
                    <h4>Halo {{ Auth::user()->name }}</h4>
                @else
                    @foreach ($pendaftar as $i => $p)
                        @php
                            $print = true;
                        @endphp
                        @foreach ($gelombang as $j => $g)
                            @if ($p->penerimaan_id == $g['id'])
                                <hr>
                                <h4>Gelombang ke {{ $p->penerimaan->gelombang }}</h4>
                                <p>Tahun angkatan {{ $p->penerimaan->tahun_angkatan }}</p>
                                <p><a href="/pengumuman/{{ $g['id'] }}" class="btn btn-primary">Lihat Pengumuman</a></p>
                                @php
                                    $print = false;
                                    break;
                                @endphp
                            @else
                                <hr>
                                <h4>Gelombang ke {{ $g['gelombang'] }}</h4>
                                <p>Tahun angkatan {{ $g['tahun_angkatan'] }}</p>
                                <p>Open at {{ $g['buka'] }}</p>
                                @if ($can_daftar[$j])
                                    <p><a href="/form/{{ $g['id'] }}" class="btn btn-primary">Daftar Sekarang!</a></p>
                                @endif
                                <p>Close at {{ $g['tutup'] }}
                                    {{ $print }}</p>
                            @endif
                        @endforeach
                        @if ($print)
                            <hr>
                            <h4>Gelombang ke {{ $p->penerimaan->gelombang }}</h4>
                            <p>Tahun angkatan {{ $p->penerimaan->tahun_angkatan }}</p>
                            <p><a href="/pengumuman/{{ $p->penerimaan->id }}" class="btn btn-primary">Lihat Pengumuman</a>
                            </p>
                        @endif
                    @endforeach
                @endif
            @endif
            {{-- <p class="lead">
      @guest
      <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Log In</a>
      @endguest
    </p> --}}
        </div>
    </div>

    <!-- /.content -->

@endsection
