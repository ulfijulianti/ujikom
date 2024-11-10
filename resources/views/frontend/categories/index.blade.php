<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f5;
        }
        .container {
            margin-top: 50px;
        }
        .category-card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.2s;
        }
        .category-card:hover {
            transform: scale(1.05);
        }
        .category-title {
            font-weight: bold;
            font-size: 1.5rem;
            color: #4a4a4a;
        }
        .category-description {
            color: #6c757d;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center mb-5">Kategori Kami</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($kategori as $kat)
            <div class="col">
                <div class="card category-card h-100">
                    <div class="card-body">
                        <h5 class="category-title">{{ $kat->judul }}</h5>
                        <p class="category-description">{{ $kat->deskripsi }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-warning text-center" role="alert">
                    Belum ada kategori yang tersedia.
                </div>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
