<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'level_user' => 'required|in:admin,mahasiswa',
            'status' => 'required|in:aktif,tidak aktif'
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level_user' => $request->level_user,
            'status' => $request->status,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:users,username,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'level_user' => 'required|in:admin,mahasiswa',
            'status' => 'required'
        ]);

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'level_user' => $request->level_user,
            'status' => $request->status,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (Auth::id() == $user->id) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri!');
        }

        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}
