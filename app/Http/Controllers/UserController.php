<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan semua data user
    public function index()
    {
        $users = User::all(); // Mengambil semua data user
        return view('users.index', compact('users'));
    }

    // Menampilkan form create user baru
    public function create()
    {
        return view('users.create');
    }

    // Menyimpan data user baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|string',
        ]);

        // Simpan data user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    // Menampilkan satu user berdasarkan ID
    public function show($id)
    {
        $user = User::findOrFail($id); // Mencari user berdasarkan ID
        return view('users.show', compact('user'));
    }

    // Menampilkan form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id); // Mencari user berdasarkan ID
        return view('users.edit', compact('user'));
    }

    // Memperbarui data user
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'status' => 'required|string',
        ]);

        // Mencari user dan memperbarui data
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            // Jika password diisi, maka update password
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
    }

    // Menghapus data user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Hapus user
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
