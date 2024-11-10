<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    // Menampilkan semua foto
    public function index()
    {
        $photos = Photo::with('galery')->get(); // Mengambil semua foto beserta galeri terkait
        return view('photo.index', compact('photos'));
    }

    // Menampilkan form untuk menambah foto
    public function create()
    {
        // Mengambil semua galeri untuk dropdown
        $galeries = Galery::all();
        return view('photo.create', compact('galeries'));
    }

    // Menyimpan foto baru ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'judul_photo' => 'required|string|max:255',
            'isi_photo' => 'required|image', 
            'status_photo' => 'required|boolean',
            'galery_id' => 'required|exists:galery,id',
            'deskripsi_photo' => 'nullable|string', // Validasi deskripsi
        ]);

        $path = $request->file('isi_photo')->store('photos', 'public'); // Simpan gambar

        Photo::create([
            'judul_photo' => $request->input('judul_photo'),
            'isi_photo' => $path,
            'status_photo' => $request->input('status_photo'),
            'user_id' => auth()->id(),
            'galery_id' => $request->input('galery_id'),
            'deskripsi_photo' => $request->input('deskripsi_photo'), // Menyimpan deskripsi
        ]);

        return redirect()->route('photo.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    // Menampilkan form edit foto
    public function edit(Photo $photo)
    {
        // Mengambil semua galeri untuk dropdown
        $galeries = Galery::all();
        return view('photo.edit', compact('photo', 'galeries'));
    }

    // Memperbarui foto di database
    public function update(Request $request, Photo $photo)
    {
        // Validasi input dari form
        $request->validate([
            'judul_photo' => 'required|string|max:255',
            'isi_photo' => 'nullable|image',
            'status_photo' => 'required|boolean',
            'galery_id' => 'required|exists:galery,id',
            'deskripsi_photo' => 'nullable|string', // Validasi deskripsi
        ]);

        // Data yang akan diupdate
        $data = [
            'judul_photo' => $request->judul_photo,
            'status_photo' => $request->status_photo,
            'galery_id' => $request->galery_id,
            'deskripsi_photo' => $request->input('deskripsi_photo'), // Menyertakan deskripsi yang diinput
        ];

        // Cek jika ada gambar yang diunggah
        if ($request->hasFile('isi_photo')) {
            if ($photo->isi_photo) {
                Storage::disk('public')->delete($photo->isi_photo);
            }
            $data['isi_photo'] = $request->file('isi_photo')->store('photos', 'public');
        }

        // Update foto
        $photo->update($data);

        return redirect()->route('photo.index')->with('success', 'Foto berhasil diperbarui.');
    }

    // Menghapus foto dari database
    public function destroy(Photo $photo)
    {
        // Hapus gambar dari storage jika ada
        if ($photo->isi_photo) {
            Storage::disk('public')->delete($photo->isi_photo);
        }
        // Hapus foto dari database
        $photo->delete();
        return redirect()->route('photo.index')->with('success', 'Foto berhasil dihapus.');
    }
}
