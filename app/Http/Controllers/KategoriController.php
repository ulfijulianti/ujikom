<?php

namespace App\Http\Controllers;

use App\Models\Kategori; // Pastikan ini ada dan sesuai dengan nama model Anda
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $kategori = Kategori::all(); // Ambil semua data dari model Kategori
        return view('kategori.index', compact('kategori'));
    }

    // Menampilkan form untuk menambah kategori
    public function create()
    {
        return view('kategori.create');
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Kategori::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan kategori berdasarkan ID
    public function show(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }

    // Menampilkan form untuk mengedit kategori
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
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
        
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Menghapus kategori dari database
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
