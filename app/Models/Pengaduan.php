<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\KategoriPengaduan;

class Pengaduan extends Model
{
    protected $fillable = ['nama', 'masyarakat_id', 'telepon', 'judul', 'deskripsi', 'prioritas', 'kategori_id', 'bukti', 'lokasi', 'status'];
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class, 'masyarakat_id');
    }

    public function kategoriPengaduan(){
        return $this->belongsTo(KategoriPengaduan::class, 'kategori_id');
    }

    public function laporan(){
        return $this->hasMany(Laporan::class, 'pengaduan_id');
    }
}
