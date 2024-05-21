@extends('layouts.main')
@section('title', 'Riwayat Pendaftaran')
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
                                        <th>Gelombang</th>
                                        <th>Tahun Angkatan</th>
                                        <th>Jurusan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($pendaftar as $i => $pendaf)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pendaf->penerimaan->gelombang }}</td>
                                            <td>{{ $pendaf->penerimaan->tahun_angkatan }}</td>
                                            <td>{{ $pendaf->jurusan->nama }}</td>
                                            @if ($pendaf->status == 1)
                                                <td class="bg-warning">Proses Administrasi...</td>
                                                <td class="bg-dark"><a href="/formedit/{{ $pendaf->id }}"
                                                        class="btn btn-sm btn-warning">Edit</a>&nbsp;
                                                    <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                        data-target="#modal{{ $pendaf->id }}">
                                                        Ijasah
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal{{ $pendaf->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="modalTitle{{ $pendaf->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="modalTitle{{ $pendaf->id }}">Foto Izasah</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img src="{{ asset('uploads/' . $pendaf->ijasah) }}"
                                                                        width="100%">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('siswa.formulireditijasah') }}"
                                                                        method="POST" class="d-inline"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="form-group col-md-6">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $pendaf->id }}">
                                                                            <input type="file" name="ijasah"
                                                                                class="form-control-file @error('ijasah') is-invalid @enderror"
                                                                                id="exampleFormControlFile1" required>
                                                                            @error('ijasah')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <button class="btn btn-primary"
                                                                            onclick="return confirm('Apakah anda ingin mengganti ijasah?')">Ubah
                                                                            Ijasah
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            @elseif ($pendaf->status == 2)
                                                <td class="bg-success">Lolos Administrasi</td>
                                                <td class="bg-dark"><a href="/test/{{ $pendaf->penerimaan->id }}"
                                                        class="btn btn-sm btn-success">Kerjakan Test</a>
                                                </td>
                                            @elseif ($pendaf->status == 3)
                                                <td class="bg-danger">Gagal Administrasi</td>
                                                <td class="bg-dark"><a
                                                        href="{{ route('siswa.pengumuman', $pendaf->penerimaan_id) }}"
                                                        class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Detail</a>
                                                </td>
                                            @elseif ($pendaf->status == 4)
                                                <td class="bg-warning">Proses Penilaian...</td>
                                                <td class="bg-light">No Action</td>
                                            @elseif ($pendaf->status == 5)
                                                <td class="bg-success">Selamat Anda Lulus</td>
                                                <td class="bg-dark"><a
                                                        href="{{ route('siswa.pengumuman', $pendaf->penerimaan_id) }}"
                                                        class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Detail</a>
                                                </td>
                                            @elseif ($pendaf->status == 6)
                                                <td class="bg-danger">Maaf Anda Gagal</td>
                                                <td class="bg-dark"><a
                                                        href="{{ route('siswa.pengumuman', $pendaf->penerimaan_id) }}"
                                                        class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Detail</a>
                                                </td>
                                            @else
                                                <td class="bg-danger">Someting Wrong..</td>
                                                <td class="bg-danger">Someting Wrong..</td>
                                            @endif
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
