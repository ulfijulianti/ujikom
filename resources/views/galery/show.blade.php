<!-- Halaman Detail Galeri -->
@extends('layouts.app')

@section('content')
<section class="container mx-auto py-16">
    <h2 class="text-3xl font-bold text-center mb-8">{{ $galery->judul }}</h2>git init
    <p class="text-lg text-center text-gray-700 mb-8">{{ $galery->deskripsi }}</p>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($galery->photos as $photo)
            <div class="bg-white rounded shadow p-4 flex flex-col items-center">
                <h3 class="text-lg font-semibold mb-3 text-blue-700">{{ $photo->judul_photo }}</h3>
                <img src="{{ Storage::url($photo->isi_photo) }}" alt="{{ $photo->judul_photo }}" 
                     class="w-64 h-64 object-cover rounded">
                     <td class="p-4 bg-gray-100 rounded-lg shadow-md">
    <p class="text-sm text-gray-700 font-medium leading-relaxed">{{ $photo->deskripsi_photo }}</p>
</td>

            </div>
        @endforeach
    </div>
    
    <!-- Tombol Kembali ke Galeri -->
    <div class="text-center mt-8">
        <a href="{{ url('/#galeri') }}" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Kembali ke Galeri</a>
    </div>
</section>
@endsection
