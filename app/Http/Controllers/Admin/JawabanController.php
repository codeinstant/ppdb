<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jawaban;
use App\Soal;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Jawaban = Jawaban::all();
        return view('admin.jawaban.index', compact('Jawaban'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $soal = Soal::all();
        return view('admin.jawaban.create', compact('soal'));
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
            'soal_id' => 'required|exists:soal_kuis,id',
            'jawaban' => 'required|max:128',
            'kunci' => "required|in:benar,salah",
        ]);

        Jawaban::create($validated);

        return redirect(route('jawaban.index'))->with('sukses', 'Data berhasil ditambahkan');
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
        $Jawaban = Jawaban::find($id);
        $soal = Soal::all();
        return view('admin.jawaban.edit', compact('Jawaban', 'soal'));
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
            'soal_id' => 'required|exists:soal_kuis,id',
            'jawaban' => 'required|max:128',
            'kunci' => 'required|in:benar,salah',
        ]);

        Jawaban::where('id', $id)
            ->update($validated);

        return redirect(route('jawaban.index'))->with('suksesEdit', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Jawaban = Jawaban::find($id);
        $Jawaban->delete();

        return redirect(route('jawaban.index'))->with('delete', 'Data berhasil dihapus');
    }
}