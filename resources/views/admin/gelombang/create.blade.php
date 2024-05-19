@extends('layouts.main')
@section('title', 'Tambah Gelombang')
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
                <form role="form" action="{{ route('gelombang.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="roles">Tahun Angkatan</label>
                            <input type="number"
                                class="form-control col-lg-6 @error('tahun_angkatan') is-invalid @enderror"
                                name="tahun_angkatan" placeholder="Tahun Angkatan" value="{{ old('tahun_angkatan') }}">
                            <span class="invalid-feedback">
                                @error('tahun_angkatan')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="roles">Gekombang</label>
                            <input type="number" class="form-control col-lg-6 @error('gelombang') is-invalid @enderror"
                                name="gelombang" placeholder="Gelombang" value="{{ old('gelombang') }}">
                            <span class="invalid-feedback">
                                @error('gelombang')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="roles">Kuota</label>
                            <input type="number" class="form-control col-lg-6 @error('kuota') is-invalid @enderror"
                                name="kuota" placeholder="Kuota" value="{{ old('kuota') }}">
                            <span class="invalid-feedback">
                                @error('kuota')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="roles">Buka</label>
                            <input type="date" class="form-control col-lg-6 @error('buka') is-invalid @enderror"
                                name="buka" placeholder="Buka" value="{{ old('buka') }}">
                            <span class="invalid-feedback">
                                @error('buka')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="roles">Tutup</label>
                            <input type="date" class="form-control col-lg-6 @error('tutup') is-invalid @enderror"
                                name="tutup" placeholder="Tutup" value="{{ old('tutup') }}">
                            <span class="invalid-feedback">
                                @error('tutup')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ route('gelombang.index') }}" class="btn btn-secondary"><i
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
