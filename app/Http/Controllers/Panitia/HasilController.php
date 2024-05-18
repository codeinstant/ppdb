<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use App\Pendaftar;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    
    public function index()
    {
        $pendaftar = Pendaftar::all();
        $hasil = [];
        $class = [];
        foreach ($pendaftar as $i => $p) {
            $benar = 0;
            foreach ($p->hasil_kuis as $j => $hk) {
                if($hk->Jawaban->kunci == "benar"){
                    $benar += 1;
                }
            }
            if ($benar > $p->hasil_kuis->count()/2) {
                $hasil[$i] = "LULUS";
                $class[$i] = "bg-success";
            }else{
                $hasil[$i] = "TIDAK LULUS";
                $class[$i] = "bg-danger";
            }
        }
        return view('panitia.hasil.index', compact('pendaftar', 'hasil', 'class'));
    }

    public function detail($id)
    {

        $detail = Pendaftar::where('id', $id)->first();
        // echo dd($detail->penerimaan);
        return view('panitia.hasil.detail', compact('detail'));
    }
}