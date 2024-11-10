<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Agenda;
use App\Models\Galery;
use App\Models\Photo;
use App\Models\Kategori;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        $query = $request->input('query'); // Ambil input pencarian
        
        // Pencarian di tabel Informasi
        $informasiResults = Informasi::where('judul_info', 'LIKE', "%$query%")
                                      ->orWhere('deskripsi_info', 'LIKE', "%$query%")
                                      ->get();
        
        // Pencarian di tabel Agenda
        $agendaResults = Agenda::where('judul_agenda', 'LIKE', "%$query%")
                                ->orWhere('isi_agenda', 'LIKE', "%$query%")
                                ->get();
        
        // Pencarian di tabel Galery
        $galeryResults = Galery::where('judul', 'LIKE', "%$query%")
                               ->orWhere('deskripsi', 'LIKE', "%$query%")
                               ->get();
        
        // Pencarian di tabel Photo
        $photoResults = Photo::where('judul_photo', 'LIKE', "%$query%")
                             ->orWhere('isi_photo', 'LIKE', "%$query%")
                             ->get();
        
        // Pencarian di tabel Category (Kategori)
        $kategoriResults = Kategori::where('judul', 'LIKE', "%$query%")
                                   ->orWhere('deskripsi', 'LIKE', "%$query%")
                                   ->get();
        
        // Gabungkan hasil pencarian dari semua tabel
        $results = [
            'informasi' => $informasiResults,
            'agenda' => $agendaResults,
            'galery' => $galeryResults,
            'photo' => $photoResults,
            'kategori' => $kategoriResults
        ];
        
        // Return hasil pencarian ke view
        return view('search.results', compact('results'));
    }
}    
