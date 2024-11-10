@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Kategori</h1>
        <br>
        

        <form action="{{ route('kategori.update', $kategori) }}" method="POST"> <!-- Ganti $agenda menjadi $kategori -->
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Kategori</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{ $kategori->judul }}" required> <!-- Ganti $agenda menjadi $kategori -->
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Kategori</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ $kategori->deskripsi }}</textarea> <!-- Ganti $agenda menjadi $kategori -->
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
