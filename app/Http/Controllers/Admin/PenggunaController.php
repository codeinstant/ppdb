<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = User::all();
        return view('admin.pengguna.index', compact('pengguna'));
    }


    public function edit(Request $request, $id)
    {
        $pengguna = User::where('id', $id)->first();
        return view('admin.pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
            'ulangi_password' => 'required|same:password',
        ]);
        User::where('id', $id)
            ->update([
                'password' => Hash::make($request->password)
            ]);

        return redirect(route('pengguna.index'))->with('suksesEdit', 'Data Berhasil Di Edit');
    }
}
