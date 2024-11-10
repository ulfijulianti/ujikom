@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-3xl font-bold">{{ $info->judul_info }}</h1>
    <p class="text-sm text-gray-500 mb-4">Diposting: {{ \Carbon\Carbon::parse($info->tgl_post_info)->format('d-m-Y') }}</p>
    
    @if ($info->isi_info)
        <img src="{{ Storage::url($info->isi_info) }}" alt="{{ $info->judul_info }}" class="mb-4" style="width: 100%; max-width: 500px; height: auto;">
    @else
        <p class="mb-4">Tidak ada gambar</p>
    @endif
    
    <div class="text-gray-700">
        <p>{{ $info->deskripsi }}</p> <!-- Misalkan kamu punya kolom deskripsi di tabel -->
    </div>
</div>
@endsection
