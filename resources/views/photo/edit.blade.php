@extends('layouts.app')

@section('content')
<br>
    <div class="container">
        <h1>Edit Foto</h1>
        <br>

        <!-- Form Edit Foto -->
        <form action="{{ route('photo.update', $photo->kd_photo) }}" method="POST" enctype="multipart/form-data"> <!-- Pastikan menggunakan kd_photo sebagai identifier -->
            @csrf
            @method('PUT')

            <!-- Input Judul Foto -->
            <div class="mb-3">
                <label for="judul_photo" class="form-label">Judul Foto</label>
                <input type="text" name="judul_photo" id="judul_photo" class="form-control" value="{{ old('judul_photo', $photo->judul_photo) }}" required>
            </div>

            <!-- Input Gambar -->
            <div class="mb-3">
                <label for="isi_photo" class="form-label">Unggah Gambar</label>
                <input type="file" name="isi_photo" id="isi_photo" class="form-control" accept="image/*">
                <small class="form-text text-muted">Unggah gambar yang valid. (Kosongkan jika tidak ingin mengganti gambar)</small>
            </div>

            @if ($photo->isi_photo)
                <div class="mb-3">
                    <label for="current_image" class="form-label">Gambar Saat Ini</label>
                    <img src="{{ Storage::url($photo->isi_photo) }}" alt="Gambar saat ini" class="img-thumbnail" style="max-width: 200px;">
                </div>
            @endif
            <div class="mb-3">
    <label for="deskripsi_photo" class="form-label">Deskripsi Foto</label>
    <textarea name="deskripsi_photo" id="deskripsi_photo" class="form-control" rows="3">{{ old('deskripsi_photo', $photo->deskripsi_photo ?? '') }}</textarea>
    <small class="form-text text-muted">Tambahkan deskripsi tentang foto ini.</small>
</div>



            <!-- Select Status Foto -->
            <div class="mb-3">
                <label for="status_photo" class="form-label">Status</label>
                <select name="status_photo" id="status_photo" class="form-select" required>
                    <option value="1" {{ $photo->status_photo ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ !$photo->status_photo ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>

            <!-- Select Galeri -->
            <div class="mb-3">
                <label for="galery_id" class="form-label">Kategori Gambar</label>
                <select class="form-select" id="galery_id" name="galery_id" required>
                    <option value="" disabled>Pilih Kategori</option>
                    @foreach ($galeries as $galery)
                        <option value="{{ $galery->id }}" {{ $galery->id == $photo->galery_id ? 'selected' : '' }}>{{ $galery->judul }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol Update -->
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('photo.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
