<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Pendaftar;
use App\Jurusan;
use App\User;
use App\Penerimaan;
use App\Soal;
use App\HasilKuis;
use App\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;

class SiswaController extends Controller
{
    public function index()
    {
        $pendaftar = null;
        $pendaftar = Pendaftar::where('user_id', Auth::user()->id)->get();
        $gelombangAll = Penerimaan::all();
        $gelombang = [];
        $can_daftar = [];
        foreach ($gelombangAll as $key => $value) {
            date_default_timezone_set("Asia/Bangkok");
            $now = strtotime(date('Y-m-d', time()));
            $buka = strtotime($value['buka']);
            $tutup = strtotime($value['tutup']);
            if ($now < $tutup) {
                $gelombang[$key] = $value;
                $can_daftar[$key] = true;
                if ($buka > $now) {
                    $can_daftar[$key] = false;
                }
            }
        }
        return view('siswa.index', compact('pendaftar', 'gelombang', 'can_daftar'));
    }
    public function formulirshow($id_gelombang)
    {
        $gelombang = Penerimaan::findOrFail($id_gelombang);
        date_default_timezone_set("Asia/Bangkok");
        $now = strtotime(date('Y-m-d', time()));
        $tutup = strtotime($gelombang->tutup);
        if ($now > $tutup) {
            return redirect('/');   
        }

        $id = Auth::user()->id;
        $pendaftar = Pendaftar::where('user_id', $id)->where('penerimaan_id', $id_gelombang)->first();
        if ($pendaftar != null) {
            if ($pendaftar->count() == 0) {
                $pendaftar = null;
            }
        }
        $jurusan = Jurusan::all();
        // echo dd($pendaftar);
        return view('siswa.form', compact('jurusan', 'pendaftar', 'gelombang'));
    }
    public function formulireditshow($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('siswa.formedit', compact('pendaftar', 'jurusan'));
    }

    public function testujian($id_gelombang)
    {
        $gelombang = Penerimaan::findOrFail($id_gelombang);
        date_default_timezone_set("Asia/Bangkok");
        $now = strtotime(date('Y-m-d', time()));
        $tutup = strtotime($gelombang->tutup);

        $id = Auth::user()->id;
        $pendaftar = Pendaftar::where('user_id', $id)->where('penerimaan_id', $id_gelombang)->first();
        $soal = Soal::all();
        if ($pendaftar->status == 3) {
            return redirect(route('sdashboard'))->with('gagal', 'Anda tidak punya Akses untuk melakukan ini');
        }
        return view('siswa.formkuis', compact('pendaftar', 'gelombang', 'soal'));
    }
    public function formtest(Request $request)
    {
        $soal = Soal::all();
        $dataValidate['pendaftar'] = 'required|exists:pendaftar,id';
        foreach ($soal as $i => $s) {
            $dataValidate['jawaban'.$i] = 'required|exists:jawaban_kuis,id';
        }
        $request->validate($dataValidate);
        
        $pendaftar = Pendaftar::findOrFail($request->input('pendaftar'));

        foreach ($soal as $i => $s) {
            HasilKuis::create([
                'pendaftar_id' => $request->input('pendaftar'),
                'jawaban_id' => $request->input('jawaban'.$i)
            ]);
        }
        $pendaftar->update([
            'status' => 4,
        ]);
        return back()->with('sukses', 'Data berhasil di kirim slihkan lihat hasil dipengumuman');
    }

    public function formulir(Request $request)
    {
        $request->validate([
            'penerimaan_id' => 'required|exists:penerimaan,id',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'ipa' => 'required',
            'bhs_indo' => 'required',
            'bhs_inggris' => 'required',
            'matematika' => 'required',
            'jurusan_id' => 'required|exists:jurusan,id',
            'no_telp' => 'required',
            'foto' =>  'required|mimes:jpg,png|max:2048',
            'ijasah' =>  'required|mimes:jpg,png|max:2048',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'alamat_ortu' => 'required',
            'no_hp_ortu' => 'required',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ortu' => 'required',
        ]);
        // if ($request->) {
        //     # code...
        // }
        $foto = $request->file('foto')->store('foto', ['disk' => 'public_uploads']);
        $ijasah = $request->file('ijasah')->store('ijasah', ['disk' => 'public_uploads']);
        $id = auth()->user()->id;

        Pendaftar::create([
                'user_id' => $id,
                'penerimaan_id' => $request->penerimaan_id,
                'nik' => $request->nik,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'ipa' => $request->ipa,
                'bhs_indo' => $request->bhs_indo,
                'bhs_inggris' => $request->bhs_inggris,
                'matematika' => $request->matematika,
                'jurusan_id' => $request->jurusan_id,
                'no_telp' => $request->no_telp,
                'foto' => $foto,
                'ijasah' => $ijasah,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'alamat_ortu' => $request->alamat_ortu,
                'no_hp_ortu' => $request->no_hp_ortu,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'penghasilan_ortu' => $request->penghasilan_ortu,
                'status' => 1,
            ]);

        return back()->with('sukses', 'Data berhasil di kirim silahkan menggunggu pengumuman');
    }
    public function formulireditijasah(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:pendaftar,id',
            'ijasah' =>  'required|mimes:jpg,png|max:2048'
        ]);
        $ijasah = $request->file('ijasah')->store('ijasah', ['disk' => 'public_uploads']);
        Pendaftar::where('id', $request->id)->update([
            'ijasah' => $ijasah
        ]);
        return redirect(route('siswa.riwayat'))->with('sukses', 'Ijasah berhasil di ubah');
    }
    public function formuliredit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:pendaftar,id',
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'ipa' => 'required',
            'bhs_indo' => 'required',
            'bhs_inggris' => 'required',
            'matematika' => 'required',
            'jurusan_id' => 'required|exists:jurusan,id',
            'no_telp' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'alamat_ortu' => 'required',
            'no_hp_ortu' => 'required',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ortu' => 'required',
        ]);

        Pendaftar::where('id', $request->id)->update([
                'nik' => $request->nik,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'ipa' => $request->ipa,
                'bhs_indo' => $request->bhs_indo,
                'bhs_inggris' => $request->bhs_inggris,
                'matematika' => $request->matematika,
                'jurusan_id' => $request->jurusan_id,
                'no_telp' => $request->no_telp,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'alamat_ortu' => $request->alamat_ortu,
                'no_hp_ortu' => $request->no_hp_ortu,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'penghasilan_ortu' => $request->penghasilan_ortu,
            ]);
        User::where('id', auth()->user()->id)->update(['name'=>$request->nama]);
        return back()->with('sukses', 'Data berhasil di edit');
    }
    public function detailpendaftar($id)
    {
        // $pendaftar = 

        // return view('siswa.detail', compact('pendaftar'));
    }
    public function riwayat()
    {
        $pendaftar = Pendaftar::where('user_id', auth()->user()->id)->get();

        return view('siswa.riwayat', compact('pendaftar'));
    }

    public function pengumuman($pen)
    {
        $id = Auth::user()->id;
        $pendaftar = Pendaftar::where('user_id', $id)->where('penerimaan_id', $pen)->first();
        if($pendaftar == null){
            return redirect("/");
        }
        return view('siswa.pengumuman', compact('pendaftar'));
    }

    public function ubahpassword()
    {
        return view('siswa.ubahpassword');
    }

    public function updateubahpassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'ulangi_password' => 'required|same:password',
        ]);

        $id = Auth::user()->id;
        User::where('id', $id)
            ->update([
                'password' => Hash::make($request->password)
            ]);

        return redirect(route('sdashboard'))->with('sukses', 'Password Berhasil Di Ubah');
    }

    public function cetakformulir($pen)
    {
        $id = Auth::user()->id;
        $pendaftar = Pendaftar::where('user_id', $id)->where('penerimaan_id', $pen)->first();
        $profil = Profil::all()->first();

        $pdf = PDF::loadView('siswa.cetakformulir', compact('pendaftar', 'profil'));
        return $pdf->download('Daftar-Ulang.pdf');
    }

}