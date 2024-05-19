@extends('layouts.main')
@section('title', 'Tambah jawaban')
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
                <form role="form" action="{{ route('jawaban.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group col-md-6">
                            <label for="">Soal</label>
                            <select class="form-control select2bs4 @error('soal_id') is-invalid @enderror"
                                style="width: 100%;" name="soal_id">
                                <option selected="selected" disabled>Soal</option>
                                @foreach ($soal as $sek)
                                    <option value="{{ $sek->id }}" {{ old('soal_id') == $sek->id ? 'selected' : '' }}>
                                        {{ $sek->soal }}
                                    </option>
                                @endforeach
                            </select>
                            @error('soal_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="roles">Jawaban</label>
                            <textarea class="form-control col-lg-6 @error('jawaban') is-invalid @enderror" name="jawaban">{{ old('jawaban') }}</textarea>
                            <span class="invalid-feedback">
                                @error('jawaban')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="kc">Kunci</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="kunci" class="custom-control-input"
                                    value="benar" required @if (old('kunci')) checked @endif>
                                <label class="custom-control-label" for="customRadio1">benar</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="kunci" class="custom-control-input"
                                    value="salah" @if (old('kunci')) checked @endif>
                                <label class="custom-control-label" for="customRadio2">salah</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ route('jawaban.index') }}" class="btn btn-secondary"><i
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
