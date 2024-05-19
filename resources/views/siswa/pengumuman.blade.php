@extends('layout.master')
@section('title', 'Pengumuman Pendaftaran')
@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('title')</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <!-- /.col-md-6 -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title m-0">@yield('title') Gelombang
                                    ke-{{ $pendaftar->penerimaan->gelombang }} Tahun Angkatan
                                    {{ $pendaftar->penerimaan->tahun_angkatan }}</h5>
                            </div>
                            <div class="card-body">
                                @if ($pendaftar->status == 2)
                                    Selamat anda lolos administrasi silahkan kerjakan test berikut<a
                                        href="/test/{{ $pendaftar->penerimaan->id }}" class="btn btn-success">Test</a><br>
                                @elseif($pendaftar->status == 3)
                                    Maaf anda tidak lolos administrasi, silahkan untuk mendaftar di sekolah lainnya.
                                @elseif($pendaftar->status == 5)
                                    Selamat anda diterima silahkan <a
                                        href="{{ route('siswa.cetakformulir', $pendaftar->penerimaan->id) }}">Cetak
                                        Formulir</a><br>
                                @elseif($pendaftar->status == 6)
                                    Maaf anda tidak diterima, silahkan untuk mencoba gelombang berikutnya.
                                @else
                                    Menunggu Konfirmasi Admin
                                @endif
                            </div>

                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endpush
