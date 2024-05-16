<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penerimaan;
use App\Pendaftar;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pendaftar = null;
        if (Auth::check() && Auth::user()->role_id == 3) {
            $pendaftar = Pendaftar::where('user_id', Auth::user()->id);
        }
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
                if ($buka < $now) {
                    $can_daftar[$key] = false;
                }
            }
        }
        return view('index', compact('gelombang', 'can_daftar', 'pendaftar'));
    }
}