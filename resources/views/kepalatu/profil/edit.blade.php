@extends('layouts.main')
@section('title', 'Edit Tentang')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('title')</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <form role="form" action="{{ route('kepala.profil.update', $profil->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">


                            <label for="nama_sekolah">Nama Sekolah</label>
                            <input type="text" class="form-control col-lg-6 @error('nama_sekolah') is-invalid @enderror"
                                name="nama_sekolah" placeholder="Nama Sekolah"
                                value="{{ old('nama_sekolah', $profil->nama_sekolah) }}">

                            <label for="nama_kpl_sekolah">Nama Kepala Sekolah</label>
                            <input type="text"
                                class="form-control col-lg-6 @error('nama_kpl_sekolah') is-invalid @enderror"
                                name="nama_kpl_sekolah" placeholder="Nama Kepala Sekolah"
                                value="{{ old('nama_kpl_sekolah', $profil->nama_kpl_sekolah) }}">

                            <label for="nip_kpl_sekolah">NIP Kepala Sekolah</label>
                            <input type="text"
                                class="form-control col-lg-6 @error('nip_kpl_sekolah') is-invalid @enderror"
                                name="nip_kpl_sekolah" placeholder="NIP Kepala Sekolah"
                                value="{{ old('nip_kpl_sekolah', $profil->nip_kpl_sekolah) }}">

                            <label for="ttd_kpl_sekolah">TTD Kepala Sekolah</label>
                            <input type="img"
                                class="form-control col-lg-6 @error('ttd_kpl_sekolah') is-invalid @enderror"
                                name="ttd_kpl_sekolah" placeholder="TTD Kepala Sekolah"
                                value="{{ old('ttd_kpl_sekolah', $profil->ttd_kpl_sekolah) }}">

                            <label for="nama_ketua_ppdb">Nama Ketua PPDB</label>
                            <input type="text"
                                class="form-control col-lg-6 @error('nama_ketua_ppdb') is-invalid @enderror"
                                name="nama_ketua_ppdb" placeholder="Nama Ketua PPDB"
                                value="{{ old('nama_ketua_ppdb', $profil->nama_ketua_ppdb) }}">

                            <label for="nip_ppdb">NIP PPDB</label>
                            <input type="text" class="form-control col-lg-6 @error('nip_ppdb') is-invalid @enderror"
                                name="nip_ppdb" placeholder="NIP PPDB" value="{{ old('nip_ppdb', $profil->nip_ppdb) }}">

                            <label for="alamat_sekolah">Alamat Sekolah</label>
                            <input type="text"
                                class="form-control col-lg-6 @error('alamat_sekolah') is-invalid @enderror"
                                name="alamat_sekolah" placeholder="Alamat Sekolah"
                                value="{{ old('alamat_sekolah', $profil->alamat_sekolah) }}">

                            <label for="tel_sekolah">Telepon Sekolah</label>
                            <input type="text" class="form-control col-lg-6 @error('tel_sekolah') is-invalid @enderror"
                                name="tel_sekolah" placeholder="Telepon Sekolah"
                                value="{{ old('tel_sekolah', $profil->tel_sekolah) }}">

                            <label for="web_sekolah">Web Sekolah</label>
                            <input type="text" class="form-control col-lg-6 @error('web_sekolah') is-invalid @enderror"
                                name="web_sekolah" placeholder="Web Sekolah"
                                value="{{ old('web_sekolah', $profil->web_sekolah) }}">

                            <label for="email_sekolah">Email Sekolah</label>
                            <input type="text" class="form-control col-lg-6 @error('email_sekolah') is-invalid @enderror"
                                name="email_sekolah" placeholder="Email Sekolah"
                                value="{{ old('email_sekolah', $profil->email_sekolah) }}">

                            <label for="logo_sekolah">Logo Sekolah</label>
                            <input type="text" class="form-control col-lg-6 @error('logo_sekolah') is-invalid @enderror"
                                name="logo_sekolah" placeholder="Logo Sekolah"
                                value="{{ old('logo_sekolah', $profil->logo_sekolah) }}">

                            <span class="invalid-feedback">
                                @error('nama_sekolah')
                                    {{ $message }}
                                @enderror

                                @error('nama_kpl_sekolah')
                                    {{ $message }}
                                @enderror

                                @error('nip_kpl_sekolah')
                                    {{ $message }}
                                @enderror

                                @error('ttd_kpl_sekolah')
                                    {{ $message }}
                                @enderror

                                @error('nama_ketua_ppdb')
                                    {{ $message }}
                                @enderror

                                @error('nip_ppdb')
                                    {{ $message }}
                                @enderror

                                @error('alamat_sekolah')
                                    {{ $message }}
                                @enderror

                                @error('tel_sekolah')
                                    {{ $message }}
                                @enderror

                                @error('web_sekolah')
                                    {{ $message }}
                                @enderror

                                @error('email_sekolah')
                                    {{ $message }}
                                @enderror

                                @error('logo_sekolah')
                                    {{ $message }}
                                @enderror
                                @error('konten')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ route('kepala.profil.index') }}" class="btn btn-secondary"><i
                                class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
