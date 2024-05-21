@extends('layout.master')
@section('title', 'Formulir Data Diri')
@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
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
                                    <form action="{{ route('siswa.formuliredit') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <span class="font-weight-bold mt-3 text-danger">Formulir Wajib Di Isi
                                            Semua*</span>
                                        <p class="font-weight-bold mt-3 bg-info ">A. Data Calon Siswa</p>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="">Gelombang Ke</label>
                                                <input type="number" id="penerimaan_id" name="penerimaan_id"
                                                    value="{{ $pendaftar->penerimaan->id }}" hidden>
                                                <input type="text" class="form-control" id="gelombang"
                                                    placeholder="gelombang" value="{{ $pendaftar->penerimaan->gelombang }}"
                                                    readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Tahun Angkatan</label>
                                                <input type="text" class="form-control" id="tahun_angkatan"
                                                    placeholder="tahun_angkatan"
                                                    value="{{ $pendaftar->penerimaan->tahun_angkatan }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">NIK</label>
                                                <input type="number" name="nik"
                                                    class="form-control @error('nik') is-invalid @enderror" id=""
                                                    placeholder="nik" value="{{ $pendaftar->nik }}">
                                                @error('nik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Nama</label>
                                                <input type="hidden" name="id" value="{{ $pendaftar->id }}">
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    value="{{ $pendaftar->user->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jk">Jenis Kelamin</label>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="jenis_kelamin"
                                                    class="custom-control-input" value="Laki-Laki" required
                                                    @if ($pendaftar->jenis_kelamin == 'Laki-Laki') checked @endif>
                                                <label class="custom-control-label" for="customRadio1">Laki-Laki</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="jenis_kelamin"
                                                    class="custom-control-input" value="Perempuan"
                                                    @if ($pendaftar->jenis_kelamin == 'Perempuan') checked @endif>
                                                <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="">{{ $pendaftar->alamat }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="">Kecamatan</label>
                                                <input type="text" name="kecamatan"
                                                    class="form-control @error('kecamatan') is-invalid @enderror"
                                                    id="" placeholder="kecamatan"
                                                    value="{{ $pendaftar->kecamatan }}">
                                                @error('kecamatan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Kabupaten</label>
                                                <input type="text" name="kabupaten"
                                                    class="form-control @error('kabupaten') is-invalid @enderror"
                                                    id="" placeholder="kabupaten"
                                                    value="{{ $pendaftar->kabupaten }}">
                                                @error('kabupaten')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">provinsi</label>
                                                <input type="text" name="provinsi"
                                                    class="form-control @error('provinsi') is-invalid @enderror"
                                                    id="" placeholder="provinsi"
                                                    value="{{ $pendaftar->provinsi }}">
                                                @error('provinsi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="">Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    id="inputCity" placeholder="Tempat Lahir"
                                                    value="{{ $pendaftar->tempat_lahir }}">
                                                @error('tempat_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Tanggal Lahir</label>
                                                <input type="date" name="tanggal_lahir"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                    id="inputCity" value="{{ $pendaftar->tanggal_lahir }}">
                                                @error('tanggal_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="">Jurusan</label>
                                                <select
                                                    class="form-control select2bs4 @error('jurusan_id') is-invalid @enderror"
                                                    style="width: 100%;" name="jurusan_id">
                                                    <option selected="selected" disabled>Jurusan</option>
                                                    @foreach ($jurusan as $sek)
                                                        <option value="{{ $sek->id }}"
                                                            {{ $pendaftar->jurusan_id == $sek->id ? 'selected' : '' }}>
                                                            {{ $sek->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('no_telp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">No Telp</label>
                                                <input type="number" name="no_telp"
                                                    class="form-control @error('no_telp') is-invalid @enderror"
                                                    id="inputCity" value="{{ $pendaftar->no_telp }}">
                                                @error('no_telp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="exampleFormControlFile1">Matematika</label>
                                                <input type="number" name="matematika"
                                                    class="form-control @error('matematika') is-invalid @enderror"
                                                    placeholder="Nilai Matematika" value="{{ $pendaftar->matematika }}">
                                                @error('matematika')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleFormControlFile1">IPA</label>
                                                <input type="number" name="ipa"
                                                    class="form-control @error('ipa') is-invalid @enderror"
                                                    placeholder="Nilai IPA" value="{{ $pendaftar->ipa }}">
                                                @error('ipa')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleFormControlFile1">Bahasa Indonesia</label>
                                                <input type="number" name="bhs_indo"
                                                    class="form-control @error('bhs_indo') is-invalid @enderror"
                                                    placeholder="Nilai Bahasa Indonesia"
                                                    value="{{ $pendaftar->bhs_indo }}">
                                                @error('bhs_indo')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleFormControlFile1">Bahasa Inggris</label>
                                                <input type="number" name="bhs_inggris"
                                                    class="form-control @error('bhs_inggris') is-invalid @enderror"
                                                    placeholder="Nilai Bahasa Inggris"
                                                    value="{{ $pendaftar->bhs_inggris }}">
                                                @error('bhs_inggris')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <p class="font-weight-bold mt-3 bg-info ">B. Data Orang Tua</p>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="">Nama Ayah</label>
                                                <input type="text" name="nama_ayah"
                                                    class="form-control @error('nama_ayah') is-invalid @enderror"
                                                    id="" placeholder="Nama Ayah"
                                                    value="{{ $pendaftar->nama_ayah }}">
                                                @error('nama_ayah')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Nama Ibu</label>
                                                <input type="text" name="nama_ibu"
                                                    class="form-control @error('nama_ibu') is-invalid @enderror"
                                                    id="" placeholder="Nama Ibu"
                                                    value="{{ $pendaftar->nama_ibu }}">
                                                @error('nama_ibu')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="">Alamat Orang Tua</label>
                                            <textarea name="alamat_ortu" class="form-control @error('alamat_ortu') is-invalid @enderror">{{ $pendaftar->alamat_ortu }}</textarea>
                                            @error('alamat_ortu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="">No HP Orang Tua</label>
                                                <input type="number" name="no_hp_ortu"
                                                    class="form-control @error('no_hp_ortu') is-invalid @enderror"
                                                    id="" placeholder="No HP Orang Tua"
                                                    value="{{ $pendaftar->no_hp_ortu }}">
                                                @error('no_hp_ortu')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="">Pekerjaan Ayah</label>
                                                <input type="text" name="pekerjaan_ayah"
                                                    class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                                    id="" placeholder="Pekerjaan Ayah"
                                                    value="{{ $pendaftar->pekerjaan_ayah }}">
                                                @error('pekerjaan_ayah')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Pekerjaan Ibu</label>
                                                <input type="text" name="pekerjaan_ibu"
                                                    class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                                    id="" placeholder="Pekerjaan Ibu"
                                                    value="{{ $pendaftar->pekerjaan_ibu }}">
                                                @error('pekerjaan_ibu')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Penghasilan Ortu</label>
                                            <input type="number" name="penghasilan_ortu"
                                                class="form-control @error('penghasilan_ortu') is-invalid @enderror"
                                                id="" value="{{ $pendaftar->penghasilan_ortu }}">
                                            @error('penghasilan_ortu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div>
                                            <a href="{{ route('siswa.riwayat') }}" class="btn btn-secondary"><i
                                                    class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
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
@push('js')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endpush
