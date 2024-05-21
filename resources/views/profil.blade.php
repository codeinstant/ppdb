@extends('layout.master')
@section('title', 'Profil Sekolah')
@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <style>
        .boxout {
            padding: 20px;
            position: relative;
            align-items: center;
        }

        .boxmidle {
            padding: 20px;
        }

        .boxin {
            background-color: white;
            border-radius: 10px;
            padding: 10px;
        }

        .headerprofil {
            padding: 10px;

        }

        ul {
            padding: 0;
            margin: 0;
        }

        h4 {
            border-bottom: 2px solid #795353;
            padding: 10px;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .2);
        }

        .isi {
            width: 100%;
        }

        p {
            margin: 10px;
        }

        .logo img {
            box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.4);
            background-color: transparent;
            max-width: 100px;
            height: auto;
            position: relative;
            padding: 10px;
        }
    </style>
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
                            </div>
                            <div class="card-body">
                                <nav class="boxout">
                                    <nav class="boxmidle">
                                        <nav class="boxin">
                                            <nav class="headerprofil">
                                                <center>
                                                    <h2>Profil Sekolah</h2>
                                                </center>
                                            </nav>
                                            <nav class="isi">
                                                <nav class="logo">
                                                    <center><img src="{{ asset('uploads/' . $profil->logo_sekolah) }}"
                                                            alt=""></center>
                                                </nav>
                                                <nav class="tulisan">
                                                    <ul>
                                                        <h4>Nama Sekolah</h4>
                                                        <P>{{ $profil->nama_sekolah }}</P>
                                                    </ul>
                                                    <ul>
                                                        <h4>Alamat Sekolah</h4>
                                                        <p>{{ $profil->alamat_sekolah }}</p>
                                                    </ul>
                                                    <ul>
                                                        <h4>Sejarah Singkat</h4>
                                                        <p>{{ $profil->sejarah }}</p>
                                                    </ul>
                                                    <ul>
                                                        <h4>Akreditasi</h4>
                                                        <p>{{ $profil->akreditasi }}</p>
                                                    </ul>
                                                    <ul>
                                                        <h4>Kepala Sekolah</h4>
                                                        <p>{{ $profil->nama_kpl_sekolah }}</p>
                                                    </ul>
                                                    <ul>
                                                        <h4>Alamat Email</h4>
                                                        <p>{{ $profil->email_sekolah }}</p>
                                                    </ul>
                                                    <ul>
                                                        <h4>Website Sekkolah </h4>
                                                        <p>{{ $profil->web_sekolah }}</p>
                                                    </ul>
                                                    <ul>
                                                        <h4>Kontak Telepon</h4>
                                                        <p>"{{ $profil->tel_sekolah }}"</p>
                                                    </ul>
                                                </nav>
                                            </nav>
                                        </nav>
                                    </nav>
                                </nav>
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
@endpush
