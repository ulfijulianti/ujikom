<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agenda'; // Ganti dengan nama tabel yang sesuai
    protected $primaryKey = 'kd_agenda'; // Primary key

    // Daftar kolom yang dapat diisi
    protected $fillable = [
        'judul_agenda',
        'isi_agenda',
        'tgl_agenda',
        'tgl_post_agenda',
        'status_agenda',
        'kategori_id',
    ];
    
    public $timestamps = false; // Jika tidak menggunakan kolom created_at dan updated_at

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}
