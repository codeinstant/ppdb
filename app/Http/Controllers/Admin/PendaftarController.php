<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftarController extends Controller
{
    public function index()
    {
        $pendaftar = Pendaftar::all();
        return view('admin.pendaftar.index', compact('pendaftar'));
    }

    public function terima()
    {
        $pendaftar = Pendaftar::all();
        return view('admin.pendaftar.terima', compact('pendaftar'));
    }

    public function tolak()
    {
        $pendaftar = Pendaftar::all();
        return view('admin.pendaftar.tolak', compact('pendaftar'));
    }

    public function detail($id)
    {

        $detail = Pendaftar::where('id', $id)->first();
        // echo dd($detail->penerimaan);
        return view('admin.pendaftar.detail', compact('detail'));
    }

    public function updateterima($id)
    {
        $user = Auth::user()->id;
        $pendaftar = Pendaftar::find($id);
        $pendaftar->update([
            'status' => 2,
        ]);

        return redirect(route('pendaftar.index'))->with('sukses', 'Pendaftar diterima');
    }
    public function updatetolak($id)
    {
        $user = Auth::user()->id;
        $pendaftar = Pendaftar::find($id);
        $pendaftar->update([
            'status' => 3,
        ]);

        return redirect(route('pendaftar.index'))->with('tolak', 'Pendaftar ditolak');
    }
}
