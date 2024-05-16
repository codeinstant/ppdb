<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('admin.jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        return view("admin.jurusan.create");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|unique:jurusan,nama',
        ], [
            'nama.required' => 'Nama jurusan tidak boleh kosong',
            'nama.unique' => 'Nama jurusan sudah ada',
        ]);
        $jurusan = new Jurusan;

        $jurusan->nama = $request->nama;

        $jurusan->save();

        return redirect('/jurusan')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($jurusan_id)
    {
        $jurusan = Jurusan::where('id', $jurusan_id)->first();
        return view('admin.jurusan.show', compact('jurusan'));
    }

    public function edit($jurusan_id)
    {
        $jurusan = Jurusan::where('id', $jurusan_id)->first();
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, $jurusan_id)
    {
        $validated = $request->validate([
            'nama' => 'required|unique:jurusan,nama',
        ], [
            'nama.required' => 'Nama jurusan tidak boleh kosong',
            'nama.unique' => 'Nama jurusan sudah ada',
        ]);
        $jurusan = Jurusan::find($jurusan_id);

        $jurusan->nama = $request['nama'];

        $jurusan->save();

        return redirect('/jurusan')->with('suksesEdit', 'Data berhasil di update');;
    }

    public function destroy($jurusan_id)
    {
        $jurusan = Jurusan::find($jurusan_id);
        $jurusan->delete();

        return redirect('/jurusan')->with('delete', 'Data berhasil dihapus');;
    }
}
