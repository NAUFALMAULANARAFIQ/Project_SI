<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class CheckLevel
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // PERBAIKAN 1: Gunakan nama sesi yang benar ('user_session')
        // Sesuai dengan AuthController yang kita buat sebelumnya.
        if (!Session::has('user_session')) {
            return redirect()->route('login')->with('error', 'Sesi habis, silakan login kembali.');
        }

        // Ambil data user dari session
        $user = Session::get('user_session');

        // PERBAIKAN 2: Akses data sebagai Object ($user->level_user), bukan Array ($user['...'])
        // Karena DB::table()->first() mengembalikan Object stdClass.
        $userLevel = $user->level_user ?? null;

        // Cek apakah level user sesuai
        if (strtolower($userLevel) !== strtolower($role)) {
            // Jika Admin mencoba masuk halaman Dosen, atau sebaliknya
            abort(403, 'Akses Ditolak: Anda tidak memiliki izin ke halaman ini.');
        }

        return $next($request);
    }
}
