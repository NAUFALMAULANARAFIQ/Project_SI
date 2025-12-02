<?php

namespace App\Http\Controllers;

use App\Models\Kepentingan;
use App\Models\User;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KepentinganController extends Controller
{
    public function index()
    {
        // Siapkan semua data yang dibutuhkan view admin.decission
        $bobots = Kepentingan::all();
        $users = User::all();
        $kriterias = Kriteria::all();

        return view('admin.decission', compact('bobots','users','kriterias'));
    }

    public function create()
    {
    // Redirect to index which prepares $bobots, $users and $kriterias
    return redirect()->route('admin.decission');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bobot' => 'required|string',
            'bobot' => 'required|integer',
        ]);

        Kepentingan::create($request->only(['nama_bobot','bobot']));

        return redirect()->route('admin.decission')
                 ->with('success', 'Data bobot berhasil ditambahkan');
    }

    public function edit($id)
    {
        $bobot = Kepentingan::findOrFail($id);
        // Pastikan view ada; gunakan admin.decission.edit jika ada, fallback ke admin.decission
        return view('admin.decission.edit', compact('bobot'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bobot' => 'required|string',
            'bobot' => 'required|integer',
        ]);

        $bobot = Kepentingan::findOrFail($id);
        $bobot->update($request->only(['nama_bobot','bobot']));

        return redirect()->route('admin.decission')
                 ->with('success', 'Data bobot berhasil diperbarui');
    }

    public function destroy($id)
    {
        $bobot = Kepentingan::findOrFail($id);
        $bobot->delete();

        return redirect()->route('admin.decission')
                 ->with('success', 'Data bobot berhasil dihapus');
    }
}
