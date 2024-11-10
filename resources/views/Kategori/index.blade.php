@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <a class="navbar-brand" href="#">Halaman Kategori</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kategori.index') }}">Daftar Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kategori.create') }}">Tambah Kategori</a>
                </li>
                <!-- Tambahkan item menu lain di sini jika perlu -->
            </ul>
        </div>
    </nav>

    <div class="container mt-3">
        <h1 class="mb-4">Daftar Kategori</h1>

        <div class="card">
            <div class="card-body">
                <!-- Tombol Tambah Kategori -->
                <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

                <!-- Tabel Kategori -->
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Judul Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori as $item) <!-- Mengganti variabel dari $agenda menjadi $item -->
                            <tr>
                                <td>{{ $item->id }}</td> <!-- Menggunakan $item untuk menampilkan data -->
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>
                                    <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tombol Kembali ke Dashboard -->
        <div class="mb-3 mt-4">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a> <!-- Sesuaikan dengan route dashboard Anda -->
        </div>
    </div>
@endsection
