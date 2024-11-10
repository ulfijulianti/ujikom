<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\Photo;
use App\Models\Kategori; // Tambahkan use Kategori
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    // Menampilkan semua galeri
    public function index()
    {
        $galeries = Galery::with('photos')->get();  // Mengambil data galeri beserta foto
        return view('galery.index', compact('galeries'));
    }

    // Menampilkan form untuk menambah galeri
    public function create()
    {
        $kategoris = Kategori::all(); // Ambil semua kategori untuk dropdown
        return view('galery.create', compact('kategoris')); // Mengarahkan ke view untuk membuat galeri baru
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
        Galery::create($request->all());

        return redirect()->route('galery.index')->with('success', 'Galeri berhasil ditambahkan.'); // Redirect dengan pesan sukses
    }

    // Menampilkan galeri berdasarkan ID
    public function showGalery()
    {
        // Mengambil data dari tabel 'photo' menggunakan model atau query builder
        $photos = Photo::all(); // Atau bisa menggunakan DB::table('photo')->get();

        // Mengirim data ke view
        return view('galery', compact('photos')); // Sesuaikan dengan nama view galeri
    }

    public function show($id)
    {
        // Mengambil data galeri berdasarkan ID
        $galery = Galery::with('photos')->findOrFail($id); // Pastikan relasi 'photos' di model Galery
    
        return view('galery.show', compact('galery'));
    }
    

    // Menampilkan form untuk mengedit galeri
    public function edit(Galery $galery)
    {
        $kategoris = Kategori::all(); // Ambil semua kategori untuk dropdown
        return view('galery.edit', compact('galery', 'kategoris')); // Mengarahkan ke view untuk mengedit galeri
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

        return redirect()->route('galery.index')->with('success', 'Galeri berhasil diperbarui.'); // Redirect dengan pesan sukses
    }

    // Menghapus galeri dari database
    public function destroy(Galery $galery)
    {
        $galery->delete();
        return redirect()->route('galery.index')->with('success', 'Galeri berhasil dihapus.'); // Redirect dengan pesan sukses
    }
}
