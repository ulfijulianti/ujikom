    @extends('layouts.app')

    @section('content')
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <a class="navbar-brand" href="#">Halaman Foto</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('photo.index') }}">Daftar Foto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('photo.create') }}">Tambah Foto</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container mt-3">
            <h1 class="mb-4">Daftar Foto</h1>
            
            <!-- Tombol Tambah Foto -->
            <div class="mb-3">
                <a href="{{ route('photo.create') }}" class="btn btn-primary">Tambah Foto</a>
            </div>

            <!-- Tabel Daftar Foto -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Kode Foto</th>
                                <th>Judul Foto</th>
                                <th>Deskripsi Foto</th>
                                <th>Isi Foto</th>
                                <th>Status</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($photos as $item)
                                <tr>
                                    <td>{{ $item->kd_photo }}</td>
                                    <td>{{ $item->judul_photo }}</td>
                                    <td>{{ $item->deskripsi_photo }}</td>

                                
                                    <!-- Tampilkan Gambar -->
                                    <td><img src="{{ Storage::url($item->isi_photo) }}" alt="{{ $item->judul_photo }}" width="100"></td> 
                                    
                                    <td class="{{ $item->status_photo ? 'text-success' : 'text-danger' }}">
                                        {{ $item->status_photo ? 'Aktif' : 'Tidak Aktif' }}
                                    </td>
                                    <td>{{ $item->galery ? $item->galery->judul : 'Tidak ada Galeri' }}</td>
                                    <td>
                                        <a href="{{ route('photo.edit', $item->kd_photo) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('photo.destroy', $item->kd_photo) }}" method="POST" style="display:inline;">
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
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a> 
            </div>
        </div>
    @endsection
