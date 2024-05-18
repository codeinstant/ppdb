@extends('layout.master')
@section('title', 'Formulir Ujian')
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
                                <h5 class="card-title m-0">@yield('title')</h5>
                            </div>
                            <div class="card-body">
                                @if (session('sukses'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('sukses') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="ml-3 mr-3">
                                    @if ($pendaftar->status == 2)
                                        <form action="{{ route('siswa.formtest') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="pendaftar" value="{{ $pendaftar->id }}">
                                            <span class="font-weight-bold mt-3 text-danger">Formulir Wajib Di Isi
                                                Semua*</span>
                                            <p class="font-weight-bold mt-3 bg-info ">A. Pilihan Ganda</p>
                                            @foreach ($soal as $i => $s)
                                                <div class="form-group">
                                                    <label for="soal">{{ $s->soal }}</label>
                                                    @foreach ($s->jawaban as $j => $jw)
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio"
                                                                id="customRadio{{ $i }}{{ $j }}"
                                                                name="jawaban{{ $i }}"
                                                                class="custom-control-input" value="{{ $jw->id }}"
                                                                required @if (old('jawaban' . $i)) checked @endif>
                                                            <label class="custom-control-label"
                                                                for="customRadio{{ $i }}{{ $j }}">{{ $jw->jawaban }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                            <div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    @elseif($pendaftar->status == 4 || $pendaftar->status == 5)
                                        <a href="/pengumuman/{{ $gelombang->id }}" class="btn btn-info">Lihat
                                            Pengumuman</a>
                                    @endif
                                </div>

                            </div>
                            <!-- /.col-md-6 -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
