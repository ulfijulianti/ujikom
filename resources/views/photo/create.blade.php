@extends('layouts.app')

@section('content')
<br>
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('photo.create') }}" class="btn btn-primary">Tambah Foto</a> <!-- Tombol Tambah Foto -->
        </div>

        <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data"> <!-- Pastikan menggunakan enctype untuk file upload -->
            @csrf
            <div class="mb-3">
                <label for="judul_photo" class="form-label">Judul Foto</label>
                <input type="text" name="judul_photo" id="judul_photo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="isi_photo" class="form-label">Unggah Gambar</label>
                <input type="file" name="isi_photo" id="isi_photo" class="form-control" accept="image/*" required>
                <small class="form-text text-muted">Unggah gambar yang valid.</small>
            </div>
            <div class="mb-3">
    <label for="deskripsi_photo" class="form-label">Deskripsi Foto</label>
    <textarea name="deskripsi_photo" id="deskripsi_photo" class="form-control" rows="3">{{ old('deskripsi_photo', $photo->deskripsi_photo ?? '') }}</textarea>
    <small class="form-text text-muted">Tambahkan deskripsi tentang foto ini.</small>
</div>


            <div class="mb-3">
                <label for="status_photo" class="form-label">Status</label>
                <select name="status_photo" id="status_photo" class="form-select" required>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="galery_id" class="form-label">Galeri</label>
                <select class="form-select" id="galery_id" name="galery_id" required>
                    <option value="" disabled selected>Pilih Galeri</option>
                    @foreach ($galeries as $galery)
                        <option value="{{ $galery->id }}">{{ $galery->judul }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Menambahkan input deskripsi -->
           
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('photo.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
