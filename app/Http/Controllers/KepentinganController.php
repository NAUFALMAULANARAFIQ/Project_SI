<?php

namespace App\Http\Controllers;

use App\Models\Kepentingan;
use Illuminate\Http\Request;

class KepentinganController extends Controller
{
    public function index()
    {
        $bobots = Kepentingan::all();
        return view('admin.bobot.index', compact('bobots'));
    }

    public function create()
    {
        return view('admin.bobot.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bobot' => 'required|string',
            'bobot' => 'required|integer',
        ]);

        Kepentingan::create($request->all());

        return redirect()->route('bobot.index')
                         ->with('success', 'Data bobot berhasil ditambahkan');
    }

    public function edit($id)
    {
        $bobot = Kepentingan::findOrFail($id);
        return view('admin.bobot.edit', compact('bobot'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bobot' => 'required|string',
            'bobot' => 'required|integer',
        ]);

        $bobot = Kepentingan::findOrFail($id);
        $bobot->update($request->all());

        return redirect()->route('bobot.index')
                         ->with('success', 'Data bobot berhasil diperbarui');
    }

    public function destroy($id)
    {
        $bobot = Kepentingan::findOrFail($id);
        $bobot->delete();

        return redirect()->route('bobot.index')
                         ->with('success', 'Data bobot berhasil dihapus');
    }
}
