<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use App\Models\Kategori; // Pastikan ini ada dan sesuai dengan nama model Anda
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    // Menampilkan semua galeri
    public function index()
    {
        $galeries = Galery::with('kategori')->get(); // Mengambil semua data galeri beserta kategori
        return response()->json($galeries);
    }

    // Menyimpan galeri baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id', // Validasi kategori_id
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Simpan data galeri ke database
        $galery = Galery::create($request->all());

        return response()->json(['message' => 'Galeri berhasil ditambahkan.', 'data' => $galery], 201);
    }

    // Menampilkan galeri berdasarkan ID
    public function show(Galery $galery)
    {
        return response()->json($galery);
    }

    // Memperbarui galeri di database
    public function update(Request $request, Galery $galery)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id', // Validasi kategori_id
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Update data galeri
        $galery->update($request->all());

        return response()->json(['message' => 'Galeri berhasil diperbarui.', 'data' => $galery]);
    }

    // Menghapus galeri dari database
    public function destroy(Galery $galery)
    {
        $galery->delete();
        return response()->json(['message' => 'Galeri berhasil dihapus.']);
    }
}
