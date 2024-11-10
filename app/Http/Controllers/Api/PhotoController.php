<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    // Menampilkan semua foto
    public function index()
    {
        $photos = Photo::with('galery')->get(); // Mengambil semua foto beserta galeri terkait
        return response()->json($photos);
    }

    // Menyimpan foto baru ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'judul_photo' => 'required|string|max:255',
            'isi_photo' => 'required|image', // Pastikan file yang diupload adalah gambar
            'status_photo' => 'required|boolean',
            'galery_id' => 'required|exists:galery,id', // Validasi galery_id
        ]);

        // Simpan gambar ke storage dan ambil path-nya
        $path = $request->file('isi_photo')->store('photos', 'public'); // Simpan di storage/app/public/photos

        // Simpan data foto ke database
        $photo = Photo::create([
            'judul_photo' => $request->judul_photo,
            'isi_photo' => $path, // Simpan path gambar relatif
            'status_photo' => $request->status_photo,
            'user_id' => Auth::id(), // Ambil ID pengguna yang sedang login
            'galery_id' => $request->galery_id,
        ]);

        return response()->json(['message' => 'Foto berhasil ditambahkan.', 'data' => $photo], 201);
    }

    // Menampilkan detail foto
    public function show(Photo $photo)
    {
        return response()->json($photo);
    }

    // Memperbarui foto di database
    public function update(Request $request, Photo $photo)
    {
        // Validasi input dari form
        $request->validate([
            'judul_photo' => 'required|string|max:255',
            'isi_photo' => 'nullable|image', // Gambar bersifat opsional
            'status_photo' => 'required|boolean',
            'galery_id' => 'required|exists:galery,id',
        ]);

        // Siapkan data yang akan diupdate
        $data = [
            'judul_photo' => $request->judul_photo,
            'status_photo' => $request->status_photo,
            'galery_id' => $request->galery_id,
            'updated_at' => now(), // Mengupdate waktu
        ];

        // Jika ada gambar baru yang diunggah
        if ($request->hasFile('isi_photo')) {
            // Hapus gambar lama dari storage jika ada
            if ($photo->isi_photo) {
                Storage::disk('public')->delete($photo->isi_photo);
            }
            // Simpan gambar baru dan tambahkan ke data
            $path = $request->file('isi_photo')->store('photos', 'public');
            $data['isi_photo'] = $path;
        }

        // Update data foto
        $photo->update($data);

        return response()->json(['message' => 'Foto berhasil diperbarui.', 'data' => $photo]);
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
        return response()->json(['message' => 'Foto berhasil dihapus.']);
    }
}
