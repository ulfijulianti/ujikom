@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <a class="navbar-brand" href="#">Halaman Galeri</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('galery.index') }}">Daftar Galeri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('galery.create') }}">Tambah Galeri</a>
            </li>
            <!-- Tambahkan item menu lain di sini jika perlu -->
        </ul>
    </div>
</nav>

<div class="container mt-3">
    <h1 class="mb-4">Daftar Galeri</h1>
    
    <!-- Tombol Tambah Data -->
    <div class="mb-3">
        <a href="{{ route('galery.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Galeri</th>
                        <th>Judul Galeri</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($galeries as $galery)
                    <tr>
                        <td>{{ $galery->id }}</td>
                        <td>{{ $galery->judul }}</td>
                        <td>{{ $galery->deskripsi }}</td>
                        <td>{{ $galery->kategori ? $galery->kategori->judul : 'Tidak ada Kategori' }}</td>
                        <td>
                            <a href="{{ route('galery.edit', $galery->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('galery.destroy', $galery->id) }}" method="POST" style="display:inline;">
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
