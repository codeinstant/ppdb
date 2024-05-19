<?php

namespace App\Exports;

use App\Pendaftar;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HasilExport implements FromView
{
    public function view(): View
    {
        $pendaftar = Pendaftar::all();
        return view('admin.hasil.export', [
            'pendaftar' => $pendaftar,
        ]);
    }
}