@extends('layouts.main')
@section('title','Profil')
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
            @if ($profil->count() == 0)
            <div class="card-header">
                <a href="{{ route('profil.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
            </div>
              @endif

            <!-- /.card-header -->
            <div class="card-body">
                
              <table class="table table-striped mb-5">
                <tbody>
                  @foreach ($profil as $detail)
                    <tr>
                        <td>Nama Sekolah</td>
                        <td>: {{ $detail->nama_sekolah }}</td>
                        <td>Nama Kepala Sekolah</td>
                        <td>: {{ $detail->nama_kpl_sekolah}}</td>
                    </tr>
                    <tr>
                        <td>NIP Kepala Sekolah</td>
                        <td>: {{ $detail->nip_kpl_sekolah }}</td>
                        <td>TTD Kepala Sekolah</td>
                        <td>: {{ $detail->ttd_kpl_sekolah }}</td>
                    </tr>
                    <tr>
                        <td>Nama Ketua PPDB</td>
                        <td>: {{ $detail->nama_ketua_ppdb }}</td>
                        <td>NIP PPDB</td>
                        <td>: {{ $detail->nip_ppdb }}</td>
                    </tr>
                    <tr>
                        <td>Telepon Sekolah</td>
                        <td>: {{ $detail->tel_sekolah }}</td>
                        <td>Web Sekolah</td>
                        <td>: {{ $detail->web_sekolah }}</td>
                    </tr>
                    <tr>
                        <td>Email Sekolah</td>
                        <td>: {{ $detail->email_sekolah }}</td> 
                        <td>Logo Sekolah</td>
                        <td>: {{ $detail->logo_sekolah }}</td>
                    </tr>
                    
                      <td>
                        <a href="{{ route('profil.edit',$detail->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Edit</a>
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