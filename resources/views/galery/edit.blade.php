@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Galeri</h1>
        <br>

        <form action="{{ route('galery.update', $galery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Galeri</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{ $galery->judul }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ $galery->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select class="form-select" id="kategori_id" name="kategori_id" required>
                    <option value="" disabled>Pilih Kategori</option>
                    @foreach ($kategoris as $kat) <!-- Ganti $kategori menjadi $kategoris -->
                        <option value="{{ $kat->id }}" {{ $kat->id == $galery->kategori_id ? 'selected' : '' }}>{{ $kat->judul }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('galery.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
