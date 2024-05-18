<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use App\Pendaftar;
use App\Penerimaan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PanitiaController extends Controller
{
    public function index()
    {
        $user = User::where('role_id', 3)->count();
        $pendaftar_terima = Pendaftar::where('status', 4)->count();
        $pendaftar_tolak = Pendaftar::where('status', 3)->count();
        $pendaftar_tolak += Pendaftar::where('status', 5)->count();
        $jurusan = Penerimaan::all()->count();
        return view('panitia.index', compact('user', 'pendaftar_terima', 'pendaftar_tolak', 'jurusan'));
    }
}