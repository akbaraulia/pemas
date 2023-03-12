<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $table = 'petugases';
    protected $fillable = [
        'id_petugas',
        'nama_petugas',
        'username',
          'telp',
    ];
    protected $hidden = [
        'password',
        'level'
    ];
}
