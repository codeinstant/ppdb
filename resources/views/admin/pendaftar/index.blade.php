@extends('layouts.main')
@section('title','Data Pendaftar')
@push('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush
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
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            @if (session('sukses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('sukses') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            @if (session('tolak'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('tolak') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <div class="card-header">
              <h3 class="card-title">@yield('title')</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th>Alamat</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 
                  @foreach ($pendaftar as $pendaf)
                  @if ($pendaf->status == 1)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pendaf->user->name }}</td>
                    <td>{{ $pendaf->jurusan->nama }}</td>
                    <td> {{ $pendaf->alamat }}</td>
                    <td>
                      <a href="{{ route('pendaftar.detail',$pendaf->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Detail</a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                  
                  
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@push('js')
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endpush