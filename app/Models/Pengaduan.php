<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduans';
    protected $fillable = [
        'tgl_pengaduan',
        'user_id',
        'isi_laporan',
        'foto',
        'status',
    ];

    public function LastTanggapan()
    {
        return $this->hasMany(Tanggapan::class, 'id_pengaduan', 'id');
    }
}
