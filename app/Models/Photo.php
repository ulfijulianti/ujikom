<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photo'; // Pastikan ini sesuai dengan nama tabel Anda
    protected $primaryKey = 'kd_photo'; // Ganti ini dengan nama kolom primary key Anda jika tidak 'id'
    public $incrementing = true; // Pastikan ini true jika kolom primary key adalah auto-increment
    protected $keyType = 'int'; // Tipe data kolom primary key

    protected $fillable = [
        'judul_photo',
        'isi_photo',
        'status_photo',
        'user_id',
        'galery_id',
        'deskripsi_photo',
    ];

    public function galery()
    {
        return $this->belongsTo(Galery::class, 'galery_id', 'id'); // Menentukan foreign key dan local key
    }
}
