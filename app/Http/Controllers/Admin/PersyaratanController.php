<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Persyaratan;
use Illuminate\Http\Request;

class PersyaratanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persyaratan = Persyaratan::all();
        return view('admin.persyaratan.index', compact('persyaratan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.persyaratan.create');
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
            'deskripsi' => 'required',
        ]);

        Persyaratan::create($validated);

        return redirect(route('persyaratan.index'))->with('sukses', 'Data berhasil ditambahkan');
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
        $persyaratan = Persyaratan::find($id);
        return view('admin.persyaratan.edit', compact('persyaratan'));
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
            'deskripsi' => 'required',
        ]);

        Persyaratan::where('id', $id)
            ->update($validated);

        return redirect(route('persyaratan.index'))->with('suksesEdit', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persyaratan = Persyaratan::find($id);
        $persyaratan->delete();

        return redirect(route('persyaratan.index'))->with('delete', 'Data berhasil dihapus');
    }
}
