<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mk_Plhn;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class AlternatifController extends Controller
{
     // Return JSON list of matakuliah (for API)
    public function index(Request $request): JsonResponse
    {
        $q = Mk_Plhn::query();
        if ($request->filled('semester')) {
            $q->where('semester', $request->query('semester'));
        }
        $data = $q->orderBy('nama_mp')->get();
        return response()->json($data);
    }

    // Show single
    public function show($id): JsonResponse
    {
        $m = Mk_Plhn::where('id_mp', $id)->orWhere('id', $id)->first();
        if (!$m) return response()->json(['message' => 'Not found'], 404);
        return response()->json($m);
    }

    // Store
    public function store(Request $request): JsonResponse
    {
        $v = Validator::make($request->all(), [
            'kode_mp' => 'required|string|unique:mk_plhn,kode_mp',
            'nama_mp' => 'required|string',
            'semester' => 'nullable|integer|min:1|max:14',
        ]);
        if ($v->fails()) return response()->json(['errors' => $v->errors()], 422);

    $m = Mk_Plhn::create($request->only(['kode_mp','nama_mp','semester']));
        return response()->json($m, 201);
    }

    // Update
    public function update(Request $request, $id): JsonResponse
    {
        $m = Mk_Plhn::where('id_mp', $id)->orWhere('id', $id)->first();
        if (!$m) return response()->json(['message' => 'Not found'], 404);

        $v = Validator::make($request->all(), [
            'kode_mp' => 'required|string|unique:mk_plhn,kode_mp,' . $m->id_mp . ',id_mp',
            'nama_mp' => 'required|string',
            'semester' => 'nullable|integer|min:1|max:14',
        ]);
        if ($v->fails()) return response()->json(['errors' => $v->errors()], 422);

    $m->update($request->only(['kode_mp','nama_mp','semester']));
        return response()->json($m);
    }

    // Delete
    public function destroy($id): JsonResponse
    {
        $m = Mk_Plhn::where('id_mp', $id)->orWhere('id', $id)->first();
        if (!$m) return response()->json(['message' => 'Not found'], 404);
        $m->delete();
        return response()->json(['message' => 'deleted']);
    }
}
