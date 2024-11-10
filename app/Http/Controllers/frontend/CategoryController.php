<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;

class CategoryController extends Controller
{
    public function index()
    {
        $kategori = Kategori::with(['informasis', 'agendas', 'galery'])->get(); // Mengambil semua data kategori beserta relasinya
        return view('frontend.categories.index', compact('kategori')); // Menyediakan view categories/index.blade.php
    }
}
