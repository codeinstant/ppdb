<html>
  <head>
    <title>Formulir Pendaftaran</title>
    <style>
    body{
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

    .isisurat{
      margin-left: 80px;
    }
    </style>
  </head>
  <body>
    {{-- <img src="{{$logo}}" width="100mm" height="100mm" style="float:left;"/> --}}
    <div style="text-align:center; font-size:12pt; font-weight: bold;">
      PEMERINTAH PROVINSI DKI JAKARTA
    </div>
    <div style="text-align:center; font-size:12pt; font-weight: bold;">
        DINAS PENDIDIKAN DAN KEBUDAYAAN 
      </div>
    <div style="text-align:center; font-size:14pt; font-weight: bold;">
      SEKOLAH MENENGAH ATAS NEGERI 1 JAKARTA
    </div>
    <div style="text-align:center; font-size:9pt;">
      Jalan Jenderal A. Yani, No. 40A Jakarta 53126
      <br />Telepon (0281) 635624  Faksimili (0281) 636553
      <br />www.sman1jkt.sch.id
    </div>
    <hr style="border:0.3mm solid;"/>
    <br />
      <div class="isisurat" style="margin-left: 90px">
        <p style="text-align:justify">
          Kepada<br />
          Yth. {{$pendaftar->user->name}}<br />
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
            berhasil <b>Di Terima</b> belajar di SMAN 1 Jakarta. 
          </br>
        </p>
        <br />
        </div>
          <p style="text-indent: 10mm; margin-bottom: 0px;">
            Demikian surat ini kami sampaikan, Atas kerjasamanya disampaikan terima kasih.
          </p>
          <br/>

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
                Sutarno
              </td>
            </tr>
          </table>
      </div>
  </body>
</html>
