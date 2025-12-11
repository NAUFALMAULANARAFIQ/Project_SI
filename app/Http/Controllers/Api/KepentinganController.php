<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kepentingan;
use Illuminate\Http\JsonResponse;

class KepentinganController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Kepentingan::all());
    }

    public function show($id): JsonResponse
    {
        $item = Kepentingan::find($id);
        if (! $item) {
            return response()->json(['message' => 'Not found'], 404);
        }
        return response()->json($item);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nama_bobot' => 'required|string',
            'bobot' => 'required|numeric',
        ]);

        $item = Kepentingan::create($validated);
        return response()->json($item, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $item = Kepentingan::find($id);
        if (! $item) {
            return response()->json(['message' => 'Not found'], 404);
        }
        $validated = $request->validate([
            'nama_bobot' => 'sometimes|required|string',
            'bobot' => 'sometimes|required|numeric',
        ]);
        $item->update($validated);
        return response()->json($item);
    }

    public function destroy($id): JsonResponse
    {
        $item = Kepentingan::find($id);
        if (! $item) {
            return response()->json(['message' => 'Not found'], 404);
        }
        $item->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
