<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mk_Plhn;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;;
use App\Http\Controllers\PerhitunganController;

class PenilaianController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil Pilihan Semester dari URL (?semester=4)
        $selectedSemester = $request->query('semester');
        $selectedMkId = $request->query('mk_id');

        // 2. Siapkan Variabel Data
        $matakuliahs = [];
        $kriterias = [];
        $currentMk = null;

        // 3. Logika "Waterfall"
        // Jika Semester dipilih, ambil daftar Matakuliah yang sesuai
        if ($selectedSemester) {
            $matakuliahs = Mk_Plhn::where('semester', $selectedSemester)->get();
        }

        // Jika Matakuliah dipilih, ambil data Kriteria untuk Form Penilaian
        if ($selectedMkId) {
            $currentMk = Mk_Plhn::find($selectedMkId);
            $kriterias = Kriteria::all();
        }

        return view('admin.penilaian', compact(
            'selectedSemester',
            'selectedMkId',
            'matakuliahs',
            'kriterias',
            'currentMk'
        ));
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'mk_id' => 'required',
            'nilai' => 'required|array',
        ]);

        $user = Auth::user();
        if(!$user) return redirect()->back()->withErrors(['msg' => 'Sesi habis']);

        $userId = $user->id_user;
        $mkId = $request->mk_id;

        // Mulai Transaksi Database
        DB::beginTransaction();

        try {
            // 2. Simpan Nilai Mentah (Looping)
            foreach ($request->nilai as $kriteriaId => $skor) {
                // updateOrCreate akan mencari data berdasarkan array pertama
                // Jika ketemu -> Update nilai
                // Jika tidak ketemu -> Buat baru (otomatis generate id_penilaian)
                Penilaian::updateOrCreate(
                    [
                        'id_user' => $userId,
                        'id_mp' => $mkId,
                        'id_kriteria' => $kriteriaId
                    ],
                    [
                        'nilai' => $skor
                    ]
                );
            }

            // 3. Panggil Perhitungan TOPSIS (Nyalakan lagi beb!)
            // Karena logic ini yang bikin tabel 'perhitungan' terisi
            PerhitunganController::hitungTopsis($userId);

            // 4. PENTING: Commit Transaksi
            // Ini perintah: "Oke database, simpan permanen sekarang!"
            DB::commit();

            return redirect()->route('admin.penilaian.index', [
                'semester' => $request->semester_hidden,
                'mk_id' => $mkId
            ])->with('success', 'Penilaian disimpan & Ranking otomatis diperbarui!');

        } catch (\Exception $e) {
            // Jika ada error sekecil apapun, batalkan semua
            DB::rollBack();
            // Tampilkan error aslinya biar kita tahu kenapa
            return back()->withErrors(['msg' => 'Error: ' . $e->getMessage()]);
        }
    }
}

