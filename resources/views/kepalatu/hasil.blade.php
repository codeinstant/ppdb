@extends('layouts.main')
@section('title', 'Data Hasil')
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
                            <a href="{{ route('hasil.rekap') }}" class="btn btn-success">Rekap</a>
                            <hr>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Gelombang</th>
                                        <th>Tahun Angkatan</th>
                                        <th>Jurusan</th>
                                        <th>Skor</th>
                                        <th>Hasil</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($pendaftar as $i => $pendaf)
                                        {{-- @if ($pendaf->status == 1) --}}
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pendaf->nik }}</td>
                                            <td>{{ $pendaf->user->name }}</td>
                                            <td>{{ $pendaf->penerimaan->gelombang }}</td>
                                            <td>{{ $pendaf->penerimaan->tahun_angkatan }}</td>
                                            <td>{{ $pendaf->jurusan->nama }}</td>
                                            @php
                                                $skor_akhir = 0;
                                                foreach ($pendaf->hasil_kuis as $i => $hk) {
                                                    if ($hk->Jawaban->kunci === 'benar') {
                                                        $skor_akhir += 1;
                                                    }
                                                }
                                                if ($skor_akhir != 0) {
                                                    $skor_akhir = ($skor_akhir * 100) / $pendaf->hasil_kuis->count();
                                                }
                                            @endphp
                                            <td>{{ $skor_akhir }}</td>
                                            @if ($pendaf->status == 4)
                                                <td class="bg-warning">Belum dicek</td>
                                            @elseif($pendaf->status == 5)
                                                <td class="bg-success">Lulus</td>
                                            @elseif($pendaf->status == 6)
                                                <td class="bg-danger">Tidak Lulus</td>
                                            @else
                                                <td class="bg-dark">Belum Test</td>
                                            @endif
                                        </tr>
                                        {{-- @endif --}}
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
        $(function() {
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
