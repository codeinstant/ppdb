<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pendaftar;
use App\Exports\HasilExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HasilController extends Controller
{
    
    public function index()
    {
        $pendaftar = Pendaftar::all();
        return view('admin.hasil.index', compact('pendaftar'));
    }

    public function detail($id)
    {
        $detail = Pendaftar::where('id', $id)->first();
        return view('admin.hasil.detail', compact('detail'));
    }

    public function updatelulus($id)
    {
        $pendaftar = Pendaftar::find($id);
        $pendaftar->update([
            'status' => 5,
        ]);

        return redirect(route('hasil.index'))->with('sukses', 'Pendaftar diluluskan');
    }
    public function updatetidaklulus($id)
    {
        $pendaftar = Pendaftar::find($id);
        $pendaftar->update([
            'status' => 6,
        ]);

        return redirect(route('hasil.index'))->with('tolak', 'Pendaftar tidak diluluskan');
    }

    public function rekap()
    {
        return Excel::download(new HasilExport, 'PPDB-Hasil.xlsx');
    }
}