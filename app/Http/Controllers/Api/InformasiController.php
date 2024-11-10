<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    // Menampilkan semua informasi
    public function index()
    {
        $informasi = Informasi::with('kategori')->get(); // Mengambil semua data informasi beserta kategori
        return response()->json($informasi);
    }

    // Menyimpan informasi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul_info' => 'required|string|max:255',
            'isi_info' => 'required|image', // Validasi gambar
            'tgl_post_info' => 'required|date',
            'status_info' => 'required|boolean',
            'kategori_id' => 'required|exists:kategori,id', // Validasi kategori_id
        ]);

        // Simpan gambar ke storage
        $path = $request->file('isi_info')->store('images', 'public');

        // Simpan data informasi ke database
        $informasi = Informasi::create(array_merge($request->all(), ['isi_info' => $path]));

        return response()->json(['message' => 'Informasi berhasil ditambahkan.', 'data' => $informasi], 201);
    }

    // Menampilkan informasi berdasarkan ID
    public function show(Informasi $informasi)
    {
        return response()->json($informasi);
    }

    // Memperbarui informasi di database
    public function update(Request $request, Informasi $informasi)
    {
        $request->validate([
            'judul_info' => 'required|string|max:255',
            'isi_info' => 'nullable|image', // Gambar bersifat opsional
            'tgl_post_info' => 'required|date',
            'status_info' => 'required|boolean',
            'kategori_id' => 'required|exists:kategori,id', // Validasi kategori_id
        ]);

        // Jika ada gambar baru yang diunggah
        if ($request->hasFile('isi_info')) {
            // Hapus gambar lama dari storage jika ada
            if ($informasi->isi_info) {
                Storage::disk('public')->delete($informasi->isi_info);
            }
            // Simpan gambar baru ke storage
            $path = $request->file('isi_info')->store('images', 'public');
            $informasi->isi_info = $path; // Perbarui isi_info dengan path baru
        }

        // Update data informasi tanpa mengubah isi_info jika tidak ada gambar baru
        $informasi->update($request->except('isi_info'));

        return response()->json(['message' => 'Informasi berhasil diperbarui.', 'data' => $informasi]);
    }

    // Menghapus informasi dari database
    public function destroy(Informasi $informasi)
    {
        // Hapus gambar dari storage jika ada
        if ($informasi->isi_info) {
            Storage::disk('public')->delete($informasi->isi_info);
        }
        $informasi->delete();
        return response()->json(['message' => 'Informasi berhasil dihapus.']);
    }
}
