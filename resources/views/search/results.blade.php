<!-- resources/views/search/results.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
</head>
<body>
    <h1>Hasil Pencarian</h1>
    
    @foreach ($results as $category => $items)
        <h2>{{ ucfirst($category) }}</h2>
        @if ($items->isEmpty())
            <p>Tidak ada hasil ditemukan di {{ ucfirst($category) }}.</p>
        @else
            <ul>
                @foreach ($items as $item)
                    <li>
                        <!-- Sesuaikan dengan kolom yang relevan dari setiap tabel -->
                        @if ($category == 'informasi')
                            <strong>{{ $item->judul_info }}</strong>
                        @elseif ($category == 'agenda')
                            <strong>{{ $item->judul_agenda }}</strong>
                        @elseif ($category == 'galery')
                            <strong>{{ $item->judul }}</strong>
                        @elseif ($category == 'photo')
                            <strong>{{ $item->judul_photo }}</strong>
                        @elseif ($category == 'category')
                            <strong>{{ $item->judul }}</strong>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    @endforeach
</body>
</html>
