<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use App\Soal;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Soal = Soal::all();
        // echo dd($Soal[0]->jawaban->count());
        return view('panitia.soal.index', compact('Soal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panitia.soal.create');
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
            'soal' => 'required|max:255',
            'tipe_soal' => 'required|max:64',
        ]);

        Soal::create($validated);

        return redirect(route('soal.index'))->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Soal = Soal::find($id);
        return view('panitia.soal.edit', compact('Soal'));
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
            'soal' => 'required|max:255',
            'tipe_soal' => 'required|max:64',
        ]);

        Soal::where('id', $id)
            ->update($validated);

        return redirect(route('soal.index'))->with('suksesEdit', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Soal = Soal::find($id);
        $Soal->delete();

        return redirect(route('soal.index'))->with('delete', 'Data berhasil dihapus');
    }
}