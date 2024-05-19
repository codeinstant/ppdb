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
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>'{{ $pendaf->nik }}</td>
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
                    $skor_akhir = ($skor_akhir * 100) / $pendaf->hasil_kuis->count();
                @endphp
                <td>{{ $skor_akhir }}</td>
                @if ($pendaf->status == 4)
                    <td class="bg-warning">Belum dicek</td>
                @elseif($pendaf->status == 5)
                    <td class="bg-success">Lulus</td>
                @elseif($pendaf->status == 6)
                    <td class="bg-danger">Tidak Lulus</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
