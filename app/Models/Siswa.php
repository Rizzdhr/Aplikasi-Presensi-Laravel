<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nisn','nama','kelas_id','jenis_kelamin'];

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function Presensi()
    {
        return $this->hasMany(Presensi::class, 'siswa_id');
    }
}
