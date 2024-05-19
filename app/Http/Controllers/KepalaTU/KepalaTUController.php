<?php

namespace App\Http\Controllers\KepalaTU;

use App\Http\Controllers\Controller;
use App\Pendaftar;
use App\Penerimaan;
use App\User;
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
}