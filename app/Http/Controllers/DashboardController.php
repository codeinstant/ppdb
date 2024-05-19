<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penerimaan;
use App\Pendaftar;
use App\Persyaratan;
use App\Profil;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $gelombangAll = Penerimaan::all();
        $gelombang = [];
        $can_daftar = [];
        foreach ($gelombangAll as $key => $value) {
            date_default_timezone_set("Asia/Bangkok");
            $now = strtotime(date('Y-m-d', time()));
            $buka = strtotime($value['buka']);
            $tutup = strtotime($value['tutup']);
            if ($now < $tutup) {
                $gelombang[$key] = $value;
                $can_daftar[$key] = true;
                if ($buka > $now) {
                    $can_daftar[$key] = false;
                }
            }
        }
        return view('index', compact('gelombang', 'can_daftar'));
    }
    public function persyaratan()
    {
        $persyaratan = Persyaratan::all();
        return view('persyaratan', compact('persyaratan'));
    }
    public function profil()
    {
        $profil = Profil::all()->first();
        return view('profil', compact('profil'));
    }
}