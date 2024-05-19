<html>

<head>
    <title>Formulir Pendaftaran</title>
    <style>
        body {
            min-height: 330mm;
            font-family: Sans-serif, Arial;
            font-size: 11pt;
            line-height: 1;
        }

        .page {
            background: white;
        }

        @page {
            size: F4;
            margin: 10mm;
        }

        .page-break {
            page-break-after: always;
        }

        .isisurat {
            margin-left: 80px;
        }
    </style>
</head>

<body>
    {{-- <img src="{{$logo}}" width="100mm" height="100mm" style="float:left;"/> --}}
    <div style="text-align:center; font-size:12pt; font-weight: bold;">
        PEMERINTAH PROVINSI SUMATERA SELATAN
    </div>
    <div style="text-align:center; font-size:12pt; font-weight: bold;">
        DINAS PENDIDIKAN DAN KEBUDAYAAN
    </div>
    <div style="text-align:center; font-size:14pt; font-weight: bold;">
        {{ $profil->nama_sekolah }}
    </div>
    <div style="text-align:center; font-size:9pt;">
        {{ $profil->alamat_sekolah }}
        <br />Telepon {{ $profil->tel_sekolah }} Email {{ $profil->email_sekolah }}
        <br />{{ $profil->web_sekolah }}
    </div>
    <hr style="border:0.3mm solid;" />
    <br />
    <div class="isisurat" style="margin-left: 90px">
        <p style="text-align:justify">
            Kepada<br />
            Yth. {{ $pendaftar->user->name }}<br />
            <br />
            di <br />
            Tempat
            <br />
        </p>
        <p style="text-align:justify">
            <i>Dengan hormat kami sampaikan</i>
            <br />
        <p style="text-indent: 10mm; margin-bottom: 0px;">
            Bersama dengan surat ini atas nama {{ $pendaftar->user->name }} dengan NIK {{ $pendaftar->nik }}
            berhasil <b>Di Terima</b> belajar di {{ $profil->nama_sekolah }}.
            </br>
        </p>
        <br />
    </div>
    <p style="text-indent: 10mm; margin-bottom: 0px;">
        Demikian surat ini kami sampaikan, Atas kerjasamanya disampaikan terima kasih.
    </p>
    <br />

    <table width="100%">
        <tr>
            <td style="text-align:left;" width="65%">
            </td>
            <td style="text-align:center">
                Panitia PPDB <br />
                <br />
                <br />
                <br />

                <br />
                {{ $profil->nama_ketua_ppdb }}
            </td>
        </tr>
    </table>
    </div>
</body>

</html>
