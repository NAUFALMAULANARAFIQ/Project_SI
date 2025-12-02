<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // 2. Cari User di Database (Query Manual)
        $user = DB::table('users')->where('username', $request->username)->first();

        // Jika user tidak ketemu
        if (!$user) {
            return back()->withErrors(['username' => 'Username tidak terdaftar.']);
        }

        // 3. Cek Password (Manual Hash Check)
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah.']);
        }

        // 4. Login Berhasil -> Simpan Sesi Manual
        // Kita simpan seluruh object user ke dalam session bernama 'user_session'
        Session::put('user_session', $user);
        Session::save(); // Paksa simpan agar tidak hilang saat redirect

        // 5. Redirect Sesuai Level
        if ($user->level_user === 'ketua') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('mahasiswa.dashboard');
        }
    }

    public function logout(Request $request)
    {
        // Hapus Sesi Manual
        Session::forget('user_session');
        Session::flush();
        return redirect()->route('login');
    }
}
