<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $table = 'informasi';
    protected $primaryKey = 'kd_info'; // Ganti sesuai primary key Anda

    protected $fillable = [
        'judul_info',
        'isi_info',
        'tgl_post_info',
        'status_info',
        'kategori_id', // Pastikan ini ada di sini
        
    ];

    public $timestamps = false; // Set true jika Anda menggunakan created_at dan updated_at

    // Menambahkan relasi dengan Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}
