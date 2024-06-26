@extends('layouts.main')
@section('title', 'Detail Hasil Test')
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
                        <div class="card-header">
                            <h3 class="card-title">@yield('title')</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-striped mb-5">
                                <tbody>
                                    <tr>
                                        <td>Gelombang Ke</td>
                                        <td>: {{ $detail->penerimaan->gelombang }}</td>
                                        <td>Tahun Angkatan</td>
                                        <td>: {{ $detail->penerimaan->tahun_angkatan }}</td>
                                    </tr>
                                    <tr>
                                        <td>NIK</td>
                                        <td>: {{ $detail->nik }}</td>
                                        <td>Nama</td>
                                        <td>: {{ $detail->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @php
                                        $skor_akhir = 0;
                                    @endphp
                                    @foreach ($detail->hasil_kuis as $i => $hk)
                                        <tr>
                                            <td>Soal No {{ $i + 1 }}</td>
                                            <td>: {{ $hk->Jawaban->soal->soal }}</td>
                                            <td>Jawaban</td>
                                            <td>: {{ $hk->Jawaban->jawaban }} ( {{ $hk->Jawaban->kunci }} )</td>
                                        </tr>
                                        @php
                                            if ($hk->Jawaban->kunci === 'benar') {
                                                $skor_akhir += 1;
                                            }
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><b>Penilaian</b></td>
                                        <td>: Jumlah Benar * 100 / Jumlah Soal</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Skor Akhir</td>
                                        <td>: {{ ($skor_akhir * 100) / $detail->hasil_kuis->count() }}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            @if ($detail->status == 4)
                                <!-- Jika status = 4 -->
                                <form action="{{ route('pendaftar.updatelulus', $detail->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <button class="btn btn-success"
                                        onclick="return confirm('Apakah anda ingin meluluskan?')">
                                        <i class="fas fa-check-circle"></i> Lulus
                                    </button>
                                </form>
                                <form action="{{ route('pendaftar.updatetidaklulus', $detail->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Apakah anda ingin tidak meluluskan?')">
                                        <i class="fas fa-times-circle"></i> Tidak Lulus
                                    </button>
                                </form>
                            @elseif ($detail->status == 5)
                                <!-- Jika status = 5 atau 6 -->
                                <!-- Tombol untuk memicu modal -->
                                <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal{{ $detail->id }}">
                                    Ubah Status
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal{{ $detail->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="modalTitle{{ $detail->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle{{ $detail->id }}">Ubah Status</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Isi modal, seperti form untuk mengubah status -->
                                                <form action="{{ route('pendaftar.updatetidaklulus', $detail->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Apakah anda ingin tidak meluluskan?')">
                                                        <i class="fas fa-times-circle"></i> Tidak Lulus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($detail->status == 6)
                                <!-- Jika status = 5 atau 6 -->
                                <!-- Tombol untuk memicu modal -->
                                <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal{{ $detail->id }}">
                                    Ubah Status
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal{{ $detail->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="modalTitle{{ $detail->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle{{ $detail->id }}">Ubah Status</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Isi modal, seperti form untuk mengubah status -->
                                                <form action="{{ route('pendaftar.updatelulus', $detail->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    <button class="btn btn-success"
                                                        onclick="return confirm('Apakah anda ingin meluluskan?')">
                                                        <i class="fas fa-check-circle"></i> Lulus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
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
