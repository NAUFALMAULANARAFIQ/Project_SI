<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('admin.kriteria.index', compact('kriterias'));
    }

    public function create()
    {
        return view('admin.kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'cost_benefit' => 'required|in:cost,benefit',
            'bobot' => 'required|numeric',
        ]);

        Kriteria::create($request->all());
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::where('id_kriteria', $id)->firstOrFail();
        return view('admin.kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::where('id_kriteria', $id)->firstOrFail();
        $kriteria->update($request->all());
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil diupdate');
    }

    public function destroy($id)
    {
        Kriteria::where('id_kriteria', $id)->delete();
        return redirect()->route('kriteria.index')->with('success', 'Kriteria dihapus');
    }
}
