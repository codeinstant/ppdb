@extends('layouts.main')
@section('title','Data Pengguna')
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

      
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            @if (session('sukses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('sukses') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            @if (session('suksesEdit'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('suksesEdit') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            @if (session('delete'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('delete') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
          <!-- /.card -->
            <div class="card-header">
                 @yield('title')
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama </th>
                  <th>Role </th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($pengguna as $sek)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sek->name }}</td>
                    <td>{{ $sek->role->name }}</td>
                      <td>
                        <a href="{{ route('pengguna.edit',$sek->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Edit Password</a>
                    </td>
                  </tr>
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