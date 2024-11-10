@extends('layouts.app')

@section('content')
<br>
    <div class="container">
    <div class="mb-3">
            <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a> <!-- Tombol Tambah Kategori -->
        </div>

        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Kategori</label>
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Kategori</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
