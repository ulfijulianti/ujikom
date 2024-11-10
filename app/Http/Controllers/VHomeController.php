<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Agenda;
use App\Models\Galery;
use App\Models\Photo;

class VHomeController extends Controller
{
    public function index()
    {
        // Ambil semua data informasi yang aktif (status_info == 1)
        $informasi = Informasi::where('status_info', 1)->get();
        
        // Ambil semua data agenda yang aktif (status_agenda == 1)
        $agendas = Agenda::where('status_agenda', 1)->get();

        // Kirim data ke view
        return view('welcome', compact('informasi', 'agendas'));

       
    }

public function showGalery()
{
    // Mengambil data galeri beserta foto yang terkait
    $galeries = Galery::with('photos')->get();

    // Mengambil data informasi dan agenda
    $informasi = Informasi::all();
    $agendas = Agenda::all();

    // Kirim data ke view
    return view('welcome', compact('galeries', 'informasi', 'agendas'));
}

}
