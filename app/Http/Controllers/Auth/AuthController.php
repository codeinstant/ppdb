<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Pendaftar;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if ($user = Auth::user()) {
            if ($user->role_id == 1) {
                return redirect()->intended(route('dashboard'));
            }elseif($user->role_id == 2){
                return redirect()->intended(route('pdashboard'));                
            }
        }
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function prosesregister(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:4',
            'ulangi_password' => 'required|same:password',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah ada',
            'email.email' => 'Format email salah',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 4 karakter',
            'ulangi_password.required' => 'Ulangi password tidak boleh kosong',
            'ulangi_password.same' => 'Ulangi password tidak sama dengan password',
        ]);


        $id = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 3
        ]);

        return redirect('login')->with('success', 'Register Berhasil !!!');
    }
    public function proseslogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role_id == 1 ) {
                $request->session()->regenerate();
                return redirect()->intended(route('dashboard'));
            } elseif ($user->role_id == 2) {
                $request->session()->regenerate();
                return redirect()->intended(route('pdashboard'));
            } elseif ($user->role_id == 3) {
                $request->session()->regenerate();
                return redirect()->intended(route('sdashboard'));
            }
            return redirect()->intended(route('login'));
        }

        return back()->with('loginError', 'Login gagal email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}