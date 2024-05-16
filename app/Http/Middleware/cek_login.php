<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {

        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        if ($user->role_id == $roles) {
            return $next($request);
        }

        return redirect('login')->with('error', "Kamu gak punya akses yaaa..");
    }
}
