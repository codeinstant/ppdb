@extends('layouts.main')
@section('title','Edit Pengguna')
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
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST">
            @csrf
            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="ulangi_password">Ulangi Password</label>
                <input type="password" class="form-control @error('ulangi_password') is-invalid @enderror" name="ulangi_password">
                @error('ulangi_password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <button class="btn btn-primary"> Ubah</button>
            <a href="{{ route('pengguna.index') }}" class="btn btn-secondary"> Kembali</a>
        </form>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection