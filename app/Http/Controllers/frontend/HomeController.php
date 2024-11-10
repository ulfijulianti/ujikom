<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;

class HomeController extends Controller
{
    public function index()
    {
        $kategori = Kategori::with(['informasis', 'agendas', 'galery'])->get();
        return view('welcome', compact('kategori'));
    }
}
