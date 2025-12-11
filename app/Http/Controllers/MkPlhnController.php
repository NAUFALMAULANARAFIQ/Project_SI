<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mk_Plhn; // Sesuaikan namespace modelmu

class MkPlhnController extends Controller
{
    public function index(Request $request)
    {
        // Query Dasar
        $query = Mk_Plhn::query();

        // Logika Pencarian (Search)
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('kode_mp', 'like', "%{$search}%")
                  ->orWhere('nama_mp', 'like', "%{$search}%");
            });
        }

        // Logika Filter Semester
        if ($request->has('semester') && $request->semester != '') {
            $query->where('semester', $request->semester);
        }

        // Ambil Data (Pagination opsional, disini pakai get all)
        $matakuliah = $query->orderBy('semester', 'asc')->get();

        return view('admin.alternatif', compact('matakuliah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:mk_plhn,kode_mp',
            'nama_mk' => 'required',
            'sks' => 'required|numeric',
            'semester' => 'required',
        ]);

        Mk_Plhn::create([
            'kode_mp' => strtoupper($request->kode_mk),
            'nama_mp' => $request->nama_mk,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ]);

        return redirect()->route('admin.alternatif.index')->with('success', 'Matakuliah berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $mk = Mk_Plhn::findOrFail($id);

        $request->validate([
            'kode_mk' => 'required|unique:mk_plhn,kode_mp,'.$id.',id_mp', // Perhatikan 'id_mp' sesuaikan primary key tabelmu
            'nama_mk' => 'required',
            'sks' => 'required|numeric',
            'semester' => 'required',
        ]);

        $mk->update([
            'kode_mp' => strtoupper($request->kode_mk),
            'nama_mp' => $request->nama_mk,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ]);

        return redirect()->route('admin.alternatif.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $mk = Mk_Plhn::findOrFail($id);
        $mk->delete();

        return redirect()->route('admin.alternatif.index')->with('success', 'Data berhasil dihapus!');
    }
}
