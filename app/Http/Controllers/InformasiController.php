<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    // Menampilkan semua informasi
    public function index()
    {
        $informasi = Informasi::with('kategori')->get(); // Ambil semua data dari model Informasi beserta kategori
        return view('informasi.index', compact('informasi'));
    }

    // Menampilkan form untuk menambah informasi
    public function create()
    {
        $kategori = Kategori::all(); // Ambil semua kategori untuk dropdown
        return view('informasi.create', compact('kategori'));
    }

    // Menyimpan informasi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul_info' => 'required|string|max:255',
            'isi_info' => 'required|image|mimes:jpeg,png,jpg,gif', // Validasi gambar
            'tgl_post_info' => 'required|date',
            'status_info' => 'required|boolean',
            'kategori_id' => 'required|exists:kategori,id', // Validasi kategori_id
        ]);

        // Simpan gambar ke storage
        $path = $request->file('isi_info')->store('images', 'public');

        // Simpan data informasi ke database
        Informasi::create(array_merge($request->except('isi_info'), ['isi_info' => $path]));

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil ditambahkan.');
    }

    // Menampilkan informasi berdasarkan ID
    public function show($kd_info)
{
    $info = Informasi::where('kd_info', $kd_info)->firstOrFail();
    return view('informasi.show', compact('info'));
}


    // Menampilkan form untuk mengedit informasi
    public function edit(Informasi $informasi)
    {
        $kategori = Kategori::all(); // Ambil semua kategori untuk dropdown
        return view('informasi.edit', compact('informasi', 'kategori'));
    }

    // Memperbarui informasi di database
    public function update(Request $request, Informasi $informasi)
    {
        $request->validate([
            'judul_info' => 'required|string|max:255',
            'isi_info' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Gambar bersifat opsional
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

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil diperbarui.');
    }

    // Menghapus informasi dari database
    public function destroy(Informasi $informasi)
    {
        // Hapus gambar dari storage jika ada
        if ($informasi->isi_info) {
            Storage::disk('public')->delete($informasi->isi_info);
        }

        $informasi->delete();
        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil dihapus.');
    }
}
