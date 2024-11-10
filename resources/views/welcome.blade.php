<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPict</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Slideshow animation */
        .slideshow {
            display: flex;
            width: 200%;
            animation: slide-left 15s linear infinite;
        }

        .slide {
            min-width: 100%;
            height: 100vh;
            object-fit: cover;
        }

        @keyframes slide-left {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
    </style>
</head>
<body class="font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-blue-700 p-4 shadow-lg text-white">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center">
                <img src="https://smkn4bogor.sch.id/assets/images/logo/logoSMKN4.svg" alt="Logo" class="h-8 mr-3"> <!-- Tambahkan logo sekolah -->
                <span class="text-2xl font-bold"></span>
            </div>
            <div class="space-x-6 text-lg">
                <a href="#informasi" class="hover:text-gray-200 transition">Informasi</a>
                <a href="#agenda" class="hover:text-gray-200 transition">Agenda</a>
                <a href="#galeri" class="hover:text-gray-200 transition">Galeri</a>
                <a href="#lokasi" class="hover:text-gray-200 transition">Lokasi</a>
                <a href="{{ auth()->check() ? url('/dashboard') : route('login') }}" class="hover:text-gray-200 transition">
                    <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H3m0 0l4-4m-4 4l4 4m5-9a9 9 0 11-9 9 9 9 0 019-9z"></path>
                    </svg>
                </a>
            </div>
        </div>
    </nav>

    <!-- Header with Background Image and Search Bar -->
    <header class="relative h-screen">
        <div class="absolute inset-0 overflow-hidden">
            <div class="slideshow">
                <img src="https://smkn4bogor.sch.id/assets/images/background/smkn4bogor_2.jpg" alt="SekolahKu" class="slide">
                <img src="https://smkn4bogor.sch.id/assets/images/background/smkn4bogor_2.jpg" alt="SekolahKu" class="slide">
            </div>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white">
            <h1 class="text-5xl font-poppins mb-6">Welcome To </h1>
            <h2 class="text-5xl font-bold mb-6">SMK Negeri 4 Bogor</h2>
            <div class="relative w-full max-w-md mt-6">
            <form action="/search" method="GET" class="relative">
    <input 
        type="text" 
        name="query" 
        placeholder="Apa yang ingin anda cari?" 
        class="w-full py-4 px-6 rounded-full text-gray-700 placeholder-gray-500"
    >
    <button 
        type="submit" 
        class="absolute right-0 top-0 bottom-0 px-6 bg-orange-500 text-white rounded-full hover:bg-orange-400 transition"
    >
        Cari
    </button>
</form>

            </div>
        </div>
    </header>

   <!-- Main Content -->
<main class="container mx-auto py-16 px-6">
    <!-- Informasi Section -->
    <section id="informasi" class="my-16">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Informasi Terbaru</h2>
        <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            @foreach ($informasi as $info)
                <div class="bg-white rounded-lg overflow-hidden shadow-lg transform transition duration-500 hover:scale-105">
                    <!-- Image Section -->
                    @if ($info->isi_info)
                        <img src="{{ Storage::url($info->isi_info) }}" alt="{{ $info->judul_info }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <p class="text-gray-500 italic">Tidak ada gambar</p>
                        </div>
                    @endif
                    <!-- Content Section -->
                    <div class="p-6">
                    <a href="{{ route('informasi.show', $info->kd_info) }}" class="text-2xl font-semibold text-gray-800 mb-2">
    {{ $info->judul_info }}
</a>

                        <p class="text-sm text-gray-500 mb-2">Diposting: {{ $info->tgl_post_info }}</p>
                        <p class="mt-2 text-sm text-gray-600">Kategori: {{ $info->kategori->judul ?? 'Tidak Ada Kategori' }}</p>
                        <a href="#" class="block mt-4 text-blue-600 hover:text-blue-800 font-semibold">Baca selengkapnya &rarr;</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</main>


<!-- Agenda Section -->
<section id="agenda" class="my-16">
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Agenda Kegiatan</h2>
    <div class="grid gap-8 lg:grid-cols-2 md:grid-cols-1">
        @foreach($agendas as $agenda)
            <div class="bg-white rounded-lg overflow-hidden shadow-lg transition duration-300 hover:shadow-xl">
                <div class="flex">
                    <!-- Gambar Agenda -->
                    @if ($agenda->isi_agenda)
                        <img src="{{ Storage::url($agenda->isi_agenda) }}" alt="{{ $agenda->judul_agenda }}" class="w-1/3 object-cover h-full rounded-l-lg">
                    @else
                        <div class="w-1/3 bg-gray-200 flex items-center justify-center rounded-l-lg">
                            <p class="text-gray-500 italic">Tidak ada gambar</p>
                        </div>
                    @endif

                    <!-- Isi Agenda -->
                    <div class="p-6 w-2/3">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $agenda->judul_agenda }}</h3>
                        <p class="text-sm text-gray-500 mb-1">Tanggal: <span class="text-blue-600">{{ $agenda->tgl_agenda }}</span></p>
                        <p class="text-sm text-gray-500 mb-3">Diposting: <span class="text-blue-600">{{ $agenda->tgl_post_agenda }}</span></p>
                        <p class="mt-2 text-sm text-gray-600">Kategori: {{ $agenda->kategori->judul ?? 'Tidak Ada Kategori' }}</p>
                     
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>


<!-- Bagian untuk menampilkan galeri -->
<section id="galeri" class="py-20 bg-gray-100">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-6">Galeri</h2>
        <p class="text-lg text-gray-700 mb-6">Dokumentasi foto dan video kegiatan sekolah.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($galeries as $galery)
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-2">{{ $galery->judul }}</h3>
                    <p class="text-gray-700 mb-4">{{ $galery->deskripsi }}</p>
                    
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach($galery->photos->take(3) as $photo) <!-- Tampilkan hanya 3 foto pertama -->
                            <img src="{{ Storage::url($photo->isi_photo) }}" alt="{{ $photo->judul_photo }}" class="w-20 h-20 object-cover rounded">
                        @endforeach
                        <p class="text-gray-700 mb-4">{{ $photo->deskripsi_photo }}</p>
                    </div>
                    
                    <!-- Link ke halaman galeri detail -->
                    <a href="{{ route('galery.show', $galery->id) }}" class="text-blue-700 hover:underline">Lihat foto lainnya</a>
                </div>
            @endforeach
        </div>
    </div>
</section>



<div class="bg-gray-100 py-10">
    <h2 class="text-3xl font-bold text-center mb-6">Lokasi SMK Negeri 4 Bogor</h2>
    <div class="flex justify-center">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.6789148407601!2d106.8246939!3d-6.6407334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sid!2sid!4v1691577883943!5m2!1sid!2sid"
            width="600"
            height="450"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            class="rounded-lg shadow-lg"
        ></iframe>
    </div>
</div>

<!-- Footer -->
<footer class="bg-blue-700 text-white py-8">
    <div class="container mx-auto text-center">
        <p class="text-lg">&copy; 2024 SMK Negeri 4 Bogor. All rights reserved.</p>
    </div>
</footer>
</html>