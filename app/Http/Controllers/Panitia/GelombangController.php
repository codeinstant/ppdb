<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use App\Penerimaan;
use Illuminate\Http\Request;

class GelombangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gelombang = Penerimaan::all();
        return view('panitia.gelombang.index', compact('gelombang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panitia.gelombang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'tahun_angkatan' => 'required|integer|min:2000|max:2040',
            'gelombang' => 'required|integer|min:1|max:999',
            'kuota' => 'required|integer|min:1|max:9999',
            'buka' => 'required|date',
            'tutup' => 'required|date',
        ]);

        // Periksa tumpang tindih periode
        $overlap = Penerimaan::where(function ($query) use ($validated) {
            $query->where('buka', '<=', $validated['buka'])
                ->where('tutup', '>=', $validated['buka'])
                ->orWhere('buka', '<=', $validated['tutup'])
                ->where('tutup', '>=', $validated['tutup']);
        })->exists();

        // Jika ada tumpang tindih, kembalikan dengan notifikasi
        if ($overlap) {
            return redirect(route('gelombang.create'))->with('error', 'Periode yang sama sudah ada');
        }

        // Simpan data penerimaan jika tidak ada tumpang tindih
        Penerimaan::create($validated);

        return redirect(route('gelombang.index'))->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gelombang = Penerimaan::find($id);
        return view('panitia.gelombang.edit', compact('gelombang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'tahun_angkatan' => 'required|integer|min:2000|max:2040',
            'gelombang' => 'required|integer|min:1|max:999',
            'kuota' => 'required|integer|min:1|max:9999',
            'buka' => 'required|date',
            'tutup' => 'required|date',
        ]);

        // Periksa tumpang tindih periode
        $overlap = Penerimaan::where(function ($query) use ($validated, $id) {
            $query->where('buka', '<=', $validated['buka'])
                ->where('tutup', '>=', $validated['buka'])
                ->orWhere('buka', '<=', $validated['tutup'])
                ->where('tutup', '>=', $validated['tutup']);
        })->where('id', '!=', $id)->exists();

        // Jika ada tumpang tindih, kembalikan dengan notifikasi
        if ($overlap) {
            return redirect(route('gelombang.edit', $id))->with('error', 'Periode yang sama sudah ada');
        }

        // Update data penerimaan jika tidak ada tumpang tindih
        Penerimaan::where('id', $id)->update($validated);

        return redirect(route('gelombang.index'))->with('suksesEdit', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gelombang = Penerimaan::find($id);
        $gelombang->delete();

        return redirect(route('gelombang.index'))->with('delete', 'Data berhasil dihapus');
    }
}