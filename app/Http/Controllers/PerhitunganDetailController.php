<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perhitungan_Detail;
use Illuminate\Http\JsonResponse;

class PerhitunganDetailController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Perhitungan_Detail::with(['kriteria','perhitungan'])->get());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'id_perhitungan' => 'required|integer',
            'id_kriteria' => 'required|integer',
            'bobot' => 'required|numeric',
            'id_mhs' => 'nullable|integer',
            'id_mp' => 'nullable|integer',
        ]);

        $d = Perhitungan_Detail::create($validated);
        return response()->json($d, 201);
    }
}
