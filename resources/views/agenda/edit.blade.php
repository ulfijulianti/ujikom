@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Agenda</h1>
        <br>

        <form action="{{ route('agenda.update', $agenda) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul_agenda" class="form-label">Judul Agenda</label>
                <input type="text" name="judul_agenda" id="judul_agenda" class="form-control" value="{{ $agenda->judul_agenda }}" required>
            </div>

            <div class="mb-3">
                <label for="isi_agenda" class="form-label">Unggah Gambar</label>
                <input type="file" name="isi_agenda" id="isi_agenda" class="form-control" accept="image/*">
                <small class="form-text text-muted">Unggah gambar yang valid. (Kosongkan jika tidak ingin mengganti gambar)</small>
            </div>

            @if ($agenda->isi_agenda)
                <div class="mb-3">
                    <label for="current_image" class="form-label">Gambar Saat Ini</label>
                    <img src="{{ Storage::url($agenda->isi_agenda) }}" alt="Gambar saat ini" class="img-thumbnail" style="max-width: 200px;">
                </div>
            @endif

            <div class="mb-3">
                <label for="tgl_agenda" class="form-label">Tanggal Agenda</label>
                <input type="date" name="tgl_agenda" id="tgl_agenda" class="form-control" value="{{ $agenda->tgl_agenda }}" required>
            </div>

            <div class="mb-3">
                <label for="tgl_post_agenda" class="form-label">Tanggal Posting</label>
                <input type="date" name="tgl_post_agenda" id="tgl_post_agenda" class="form-control" value="{{ $agenda->tgl_post_agenda }}" required>
            </div>

            <div class="mb-3">
                <label for="status_agenda" class="form-label">Status</label>
                <select name="status_agenda" id="status_agenda" class="form-select" required>
                    <option value="1" {{ $agenda->status_agenda ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ !$agenda->status_agenda ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select class="form-select" id="kategori_id" name="kategori_id" required>
                    <option value="" disabled>Pilih Kategori</option>
                    @foreach ($kategori as $kat)
                        <option value="{{ $kat->id }}" {{ $kat->id == $agenda->kategori_id ? 'selected' : '' }}>{{ $kat->judul }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('agenda.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
