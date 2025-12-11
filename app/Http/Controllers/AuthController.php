<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Wajib import ini
use App\Models\User; // Gunakan Model User, jangan DB facade

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // 1. Validasi Input
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // 2. Cari User menggunakan Eloquent Model
        // Penting pakai Model User agar primaryKey 'id_user' terbaca otomatis
        $user = User::where('username', $request->username)->first();

        // 3. Cek apakah user ada & password benar
        if ($user && \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {

            // --- INI KUNCINYA BEB ---
            // Kita suruh Laravel login secara resmi menggunakan object User
            Auth::login($user);

            // Regenerate session untuk keamanan (mencegah session fixation)
            $request->session()->regenerate();

            // 4. Redirect Sesuai Level
            if ($user->level_user === 'ketua') {
                return redirect()->route('admin.dashboard');
            } else {
                // Asumsi dosen/anggota juga masuk dashboard atau halaman lain
                return redirect()->route('admin.dashboard');
            }
        }

        // Jika login gagal
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        // Logout resmi Laravel
        Auth::logout();

        // Hapus session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
