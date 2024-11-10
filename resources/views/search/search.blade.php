<!-- resources/views/search.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
</head>
<body>
    <h1>Halaman Pencarian</h1>
    <form action="{{ route('search') }}" method="GET" class="relative">
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

    <!-- Hasil pencarian akan ditampilkan di sini -->
</body>
</html>
