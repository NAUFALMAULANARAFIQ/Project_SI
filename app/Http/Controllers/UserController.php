<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Perhitungan; // Pastikan ada model Perhitungan
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // 1. Ambil Data User
        // Menggunakan id_user sebagai primary key sesuai kode lamamu
        $users = User::orderBy('level_user', 'asc')->get();

        // 2. Ambil Data Ranking (Pengganti API Ranking)
        // Menghitung rata-rata nilai per matakuliah (id_mp)
        $rankings = DB::table('perhitungan')
            ->join('mk_plhn', 'perhitungan.id_mp', '=', 'mk_plhn.id_mp') // Join ke tabel Matakuliah
            ->select('mk_plhn.nama_mp', 'mk_plhn.kode_mp', DB::raw('AVG(hasil) as nilai_rata'))
            ->groupBy('mk_plhn.id_mp', 'mk_plhn.nama_mp', 'mk_plhn.kode_mp')
            ->orderByDesc('nilai_rata')
            ->get();

        return view('admin.decission', compact('users', 'rankings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dm_username' => 'required|string|unique:users,username',
            'dm_email'    => 'required|email|unique:users,email',
            'dm_password' => 'required|string|min:6',
            'dm_jabatan'  => 'required|in:Kaprodi,Dosen',
        ]);

        User::create([
            // Mapping input form ke database
            'username'   => $request->dm_username,
            'email'      => $request->dm_email,
            'password'   => Hash::make($request->dm_password),
            'level_user' => ($request->dm_jabatan == 'Kaprodi') ? 'ketua' : 'anggota',
            'status'     => 'aktif'
        ]);

        return redirect()->route('admin.decission.index')->with('success', 'User DM Berhasil Ditambah!');
    }

    public function update(Request $request, $id)
    {
        // Cari user berdasarkan id_user (sesuai struktur tabelmu)
        $user = User::where('id_user', $id)->firstOrFail();

        $request->validate([
            'dm_username' => 'required|string|unique:users,username,'.$user->id_user.',id_user',
            'dm_email'    => 'required|email|unique:users,email,'.$user->id_user.',id_user',
            'dm_jabatan'  => 'required|in:Kaprodi,Dosen',
            'dm_password' => 'nullable|string|min:6', // Password boleh kosong
        ]);

        $dataUpdate = [
            'username'   => $request->dm_username,
            'email'      => $request->dm_email,
            'level_user' => ($request->dm_jabatan == 'Kaprodi') ? 'ketua' : 'anggota',
        ];

        // Hanya update password jika diisi
        if ($request->filled('dm_password')) {
            $dataUpdate['password'] = Hash::make($request->dm_password);
        }

        $user->update($dataUpdate);

        return redirect()->route('admin.decission.index')->with('success', 'Data User Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        $user = User::where('id_user', $id)->firstOrFail();
        $user->delete();

        return redirect()->route('admin.decission.index')->with('success', 'User Berhasil Dihapus!');
    }
}
