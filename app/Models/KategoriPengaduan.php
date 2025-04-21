<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriPengaduan extends Model
{
    protected $fillable = ['nama_kategori', 'slug', 'deskripsi'];
    public $timestamps  = true;

    public function petugas(){
        return $this->hasOne(Petugas::class, 'user_id');
    }
}
