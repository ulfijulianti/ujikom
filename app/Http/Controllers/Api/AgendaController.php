<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgendaController extends Controller
{
    // Menampilkan semua agenda
    public function index()
    {
        $agenda = Agenda::with('kategori')->get(); // Mengambil semua data agenda beserta kategori
        return response()->json($agenda);
    }

    // Menyimpan agenda baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul_agenda' => 'required|string|max:255',
            'isi_agenda' => 'required|image', // Validasi gambar
            'tgl_agenda' => 'required|date',
            'tgl_post_agenda' => 'required|date',
            'status_agenda' => 'required|boolean',
            'kategori_id' => 'required|exists:kategori,id', // Validasi kategori_id
        ]);

        // Simpan gambar ke storage
        $path = $request->file('isi_agenda')->store('images', 'public');

        // Simpan data agenda ke database
        $agenda = Agenda::create([
            'judul_agenda' => $request->judul_agenda,
            'isi_agenda' => $path,
            'tgl_agenda' => $request->tgl_agenda,
            'tgl_post_agenda' => $request->tgl_post_agenda,
            'status_agenda' => $request->status_agenda,
            'kategori_id' => $request->kategori_id,
        ]);

        return response()->json(['message' => 'Agenda berhasil ditambahkan.', 'data' => $agenda], 201);
    }

    // Menampilkan agenda berdasarkan ID
    public function show(Agenda $agenda)
    {
        return response()->json($agenda);
    }

    // Memperbarui agenda di database
    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'judul_agenda' => 'required|string|max:255',
            'isi_agenda' => 'nullable|image', // Gambar opsional
            'tgl_agenda' => 'required|date',
            'tgl_post_agenda' => 'required|date',
            'status_agenda' => 'required|boolean',
            'kategori_id' => 'required|exists:kategori,id', // Validasi kategori_id
        ]);

        // Jika ada gambar baru yang diunggah
        if ($request->hasFile('isi_agenda')) {
            // Hapus gambar lama dari storage jika ada
            if ($agenda->isi_agenda) {
                Storage::disk('public')->delete($agenda->isi_agenda);
            }
            // Simpan gambar baru ke storage
            $path = $request->file('isi_agenda')->store('images', 'public');
            $agenda->isi_agenda = $path; // Perbarui isi_agenda dengan path baru
        }

        // Update data agenda
        $agenda->update($request->except('isi_agenda'));

        return response()->json(['message' => 'Agenda berhasil diperbarui.', 'data' => $agenda]);
    }

    // Menghapus agenda dari database
    public function destroy(Agenda $agenda)
    {
        // Hapus gambar dari storage jika ada
        if ($agenda->isi_agenda) {
            Storage::disk('public')->delete($agenda->isi_agenda);
        }
        $agenda->delete();
        return response()->json(['message' => 'Agenda berhasil dihapus.']);
    }
}

