<?php

namespace App\Exports;

use App\Pendaftar;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DitolakExport implements FromView
{
    public function view(): View
    {
        $pendaftar = Pendaftar::all();
        return view('kepalatu.pendaftar.exporttolak', [
            'pendaftar' => $pendaftar,
        ]);
    }
}