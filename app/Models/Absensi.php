<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table='absensis';
    protected $primaryKey = 'id_absensi';

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class);
    }
}
