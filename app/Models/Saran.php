<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    protected $fillable = ['nama', 'email', 'judul', 'deskripsi'];
    public $timestamps  = true;
}
