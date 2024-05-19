@extends('layouts.main')
@section('title', 'Edit Soal')
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
                <form role="form" action="{{ route('soal.update', $Soal->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="roles">Soal</label>
                            <textarea class="form-control col-lg-6 @error('soal') is-invalid @enderror" name="soal">{{ $Soal->soal }}</textarea>
                            <span class="invalid-feedback">
                                @error('soal')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="roles">Tipe Soal</label>
                            <input type="text" class="form-control col-lg-6 @error('tipe_soal') is-invalid @enderror"
                                name="tipe_soal" placeholder="Tipe Soal" value="{{ $Soal->tipe_soal }}">
                            <span class="invalid-feedback">
                                @error('tipe_soal')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ route('soal.index') }}" class="btn btn-secondary"><i
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
