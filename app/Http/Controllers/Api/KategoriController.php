<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $kategori = Kategori::all(); // Mengambil semua data kategori
        return response()->json($kategori);
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $kategori = Kategori::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        
        return response()->json(['message' => 'Kategori berhasil ditambahkan.', 'data' => $kategori], 201);
    }

    // Menampilkan kategori berdasarkan ID
    public function show(Kategori $kategori)
    {
        return response()->json($kategori);
    }

    // Memperbarui kategori di database
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $kategori->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        
        return response()->json(['message' => 'Kategori berhasil diperbarui.', 'data' => $kategori]);
    }

    // Menghapus kategori dari database
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return response()->json(['message' => 'Kategori berhasil dihapus.']);
    }
}
