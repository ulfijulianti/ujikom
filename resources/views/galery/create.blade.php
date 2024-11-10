@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="mb-3">
        <a href="{{ route('galery.index') }}" class="btn btn-secondary">Kembali ke Daftar Galeri</a> <!-- Tombol Kembali -->
    </div>

    <form action="{{ route('galery.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Galeri</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Galeri</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select class="form-select" id="kategori_id" name="kategori_id" required>
                <option value="" disabled selected>Pilih Kategori</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->judul }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
