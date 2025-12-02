<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('admin.kriteria', compact('kriterias'));
    }

    public function create()
    {
    // Redirect to index which prepares $kriterias for the view
    return redirect()->route('admin.kriteria');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'cost_benefit' => 'required|in:cost,benefit',
            'bobot' => 'required|numeric',
        ]);

    Kriteria::create($request->only(['nama_kriteria','cost_benefit','bobot']));
    return redirect()->route('admin.kriteria')->with('success', 'Kriteria berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::where('id_kriteria', $id)->firstOrFail();
        return view('admin.kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::where('id_kriteria', $id)->firstOrFail();
    $kriteria->update($request->only(['nama_kriteria','cost_benefit','bobot']));
    return redirect()->route('admin.kriteria')->with('success', 'Kriteria berhasil diupdate');
    }

    public function destroy($id)
    {
    Kriteria::where('id_kriteria', $id)->delete();
    return redirect()->route('admin.kriteria')->with('success', 'Kriteria dihapus');
    }
}
