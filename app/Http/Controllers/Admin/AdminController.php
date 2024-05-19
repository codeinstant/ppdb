<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pendaftar;
use App\Penerimaan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::where('role_id', 3)->count();
        $pendaftar_terima = Pendaftar::where('status', 5)->count();
        $pendaftar_tolak = Pendaftar::where('status', 3)->count();
        $pendaftar_tolak += Pendaftar::where('status', 6)->count();
        $gelombang = Penerimaan::all()->count();
        return view('admin.index', compact('user', 'pendaftar_terima', 'pendaftar_tolak', 'gelombang'));
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