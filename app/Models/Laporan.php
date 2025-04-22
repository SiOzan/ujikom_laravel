<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = ['pengaduan_id', 'petugas_id', 'bukti', 'keterangan', 'tanggal_selesai'];
    public $timestamps  = true;

    public function user(){
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function pengaduan(){
        return $this->belongsTo(Pengaduan::class, 'pengaduan_id');
    }
}
