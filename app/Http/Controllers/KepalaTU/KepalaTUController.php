<?php

namespace App\Http\Controllers\KepalaTU;

use App\Http\Controllers\Controller;
use App\Pendaftar;
use App\Penerimaan;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DiterimaExport;
use App\Exports\DitolakExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KepalaTUController extends Controller
{
    public function index()
    {
        $user = User::where('role_id', 3)->count();
        $pendaftar_terima = Pendaftar::where('status', 5)->count();
        $pendaftar_tolak = Pendaftar::where('status', 3)->count();
        $pendaftar_tolak += Pendaftar::where('status', 6)->count();
        $gelombang = Penerimaan::all()->count();
        return view('kepalatu.index', compact('user', 'pendaftar_terima', 'pendaftar_tolak', 'gelombang'));
    }
    public function hasil()
    {
        $pendaftar = Pendaftar::all();
        return view('kepalatu.hasil', compact('pendaftar'));
    }
    public function terima()
    {
        $pendaftar = Pendaftar::all();
        return view('kepalatu.pendaftar.terima', compact('pendaftar'));
    }

    public function tolak()
    {
        $pendaftar = Pendaftar::all();
        return view('kepalatu.pendaftar.tolak', compact('pendaftar'));
    }
    
    public function rekapterima()
    {
        return Excel::download(new DiterimaExport, 'PPDB-Diterima.xlsx');
    }
    public function rekaptolak()
    {
        return Excel::download(new DitolakExport, 'PPDB-Ditolak.xlsx');
    }
}