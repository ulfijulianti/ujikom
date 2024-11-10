<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id';

    protected $fillable = [
        'judul',
        'deskripsi',
    ];

    public $timestamps = false; // Set true jika Anda menggunakan created_at dan updated_at

    // Relasi dengan Informasi
    public function informasis()
    {
        return $this->hasMany(Informasi::class, 'kategori_id', 'id');
    }

    public function agendas()
    {
        return $this->hasMany(Agenda::class, 'kategori_id', 'id');
    }

    public function galery()
    {
        return $this->hasMany(Galery::class, 'kategori_id', 'id');
    }

   
}
