<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pendaftar;
use App\Jurusan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::all()->count();
        $pendaftar_terima = Pendaftar::where('status', 2)->count();
        $pendaftar_tolak = Pendaftar::where('status', 3)->count();
        $jurusan = Jurusan::all()->count();
        return view('admin.index', compact('user', 'pendaftar_terima', 'pendaftar_tolak', 'jurusan'));
    }

    public function ubahpassword()
    {
        return view('admin.ubahpassword');
    }

    public function updateubahpassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'ulangi_password' => 'required|same:password',
        ]);
        $id = auth()->user()->id;
        User::where('id', $id)
            ->update([
                'password' => Hash::make($request->password)
            ]);

        return redirect(route('dashboard'))->with('suksesEdit', 'Data Berhasil Di Edit');
    }
}
