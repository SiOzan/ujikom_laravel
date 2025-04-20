<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Petugas extends Model
{
    protected $fillable = ['foto', 'telepon', 'alamat', 'user_id'];
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
