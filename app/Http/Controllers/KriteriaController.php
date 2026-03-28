<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria; // Pastikan Model Kriteria sudah ada

class KriteriaController extends Controller
{
    public function index()
    {
        // Ambil data urut berdasarkan Kode (C1, C2, dst)
        $kriteria = Kriteria::orderBy('id_kriteria', 'asc')->get();

        // Hitung total bobot untuk ditampilkan di footer tabel
        $totalBobot = $kriteria->sum('bobot');

        return view('admin.kriteria', compact('kriteria', 'totalBobot'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'id_kriteria' => 'required|unique:kriteria,id_kriteria',
            'nama' => 'required',
            'sifat' => 'required|in:Benefit,Cost',
            'bobot' => 'required|numeric|min:1|max:5',
        ]);

        Kriteria::create([
            // 'id_kriteria' => strtoupper($request->id_kriteria), // Simpan C1, C2 huruf besar
            'nama_kriteria' => $request->nama,
            'sifat' => $request->sifat,
            'bobot' => $request->bobot,
        ]);

        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria Berhasil Ditambah!');
    }

    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::findOrFail($id);

        $request->validate([
            // 'id_kriteria' => 'required|exists:kriteria,id_kriteria', // sesuaikan id_kriteria dgn primary key
            'nama' => 'required',
            'sifat' => 'required|in:Benefit,Cost',
            'bobot' => 'required|numeric|min:1|max:5',
        ]);

        $kriteria->update([
            // 'id_kriteria' => strtoupper($request->id_kriteria),
            'nama_kriteria' => $request->nama,
            'sifat' => $request->sifat,
            'bobot' => $request->bobot,
        ]);

        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();

        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria Berhasil Dihapus!');
    }
}
