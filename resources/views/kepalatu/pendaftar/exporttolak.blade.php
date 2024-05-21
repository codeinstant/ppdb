<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th colspan="4">
                <h4>Data Calon Siswa Ditolak</h4>
            </th>
        </tr>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 0;
        @endphp
        @foreach ($pendaftar as $pendaf)
            @if ($pendaf->status == 3 || $pendaf->status == 6)
                <tr>
                    <td>{{ $no += 1 }}</td>
                    <td>{{ $pendaf->user->name }}</td>
                    <td>{{ $pendaf->jurusan->nama }}</td>
                    <td> {{ $pendaf->alamat }}</td>
                </tr>
            @endif
        @endforeach
    </tbody>

</table>
