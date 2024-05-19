<?php

namespace App\Http\Controllers\KepalaTU;

use App\Http\Controllers\Controller;
use App\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Profil::all();
        return view('kepalatu.profil.index', compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kepalatu.profil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
              'nama_sekolah' => 'required',
              'nama_kpl_sekolah' => 'required',
              'nip_kpl_sekolah' => 'required',
              'ttd_kpl_sekolah' => 'required',
              'nama_ketua_ppdb' => 'required',
              'nip_ppdb' => 'required',
              'alamat_sekolah' => 'required',
              'tel_sekolah' => 'required',
              'web_sekolah' => 'required',
              'email_sekolah' => 'required',
              'logo_sekolah' => 'required',
            
        ]);

        Profil::create($validated);

        return redirect(route('kepala.profil.index'))->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profil = Profil::find($id);
        return view('kepalatu.profil.edit', compact('profil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
              'nama_sekolah' => 'required',
              'nama_kpl_sekolah' => 'required',
              'nip_kpl_sekolah' => 'required',
              'ttd_kpl_sekolah' => 'required',
              'nama_ketua_ppdb' => 'required',
              'nip_ppdb' => 'required',
              'alamat_sekolah' => 'required',
              'tel_sekolah' => 'required',
              'web_sekolah' => 'required',
              'email_sekolah' => 'required',
              'logo_sekolah' => 'required',
    
        ]);

        Profil::where('id', $id)
            ->update($validated);

        return redirect(route('kepala.profil.index'))->with('suksesEdit', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profil = Profil::find($id);
        $profil->delete();

        return redirect(route('kepala.profil.index'))->with('delete', 'Data berhasil dihapus');
    }
}