<?php

namespace App\Http\Controllers;

use App\Models\Mk_Plhn;
use Illuminate\Http\Request;

class Mk_PlhnController extends Controller
{
    public function index()
    {
        $matakuliah = Mk_Plhn::all();
        return view('admin.mk.index', compact('matakuliah'));
    }

    public function create()
    {
        return view('admin.mk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mp' => 'required|unique:mk_plhns',
            'nama_mp' => 'required',
            'semester' => 'required|integer',
        ]);

        Mk_Plhn::create($request->all());
        return redirect()->route('mk.index')->with('success', 'Mata Kuliah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mk = Mk_Plhn::where('id_mp', $id)->firstOrFail();
        return view('admin.mk.edit', compact('mk'));
    }

    public function update(Request $request, $id)
    {
        $mk = Mk_Plhn::where('id_mp', $id)->firstOrFail();
        $mk->update($request->all());
        return redirect()->route('mk.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Mk_Plhn::where('id_mp', $id)->delete();
        return redirect()->route('mk.index')->with('success', 'Data dihapus');
    }
}
