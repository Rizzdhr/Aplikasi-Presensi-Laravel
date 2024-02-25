<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Kelas extends Model
{
    use HasFactory;

    protected $fillable = ['tingkat_kelas', 'jurusan_id','nomor_kelas', 'guru_id'];

    public function getHasilKelasAttribute()
    {
        return $this->tingkat_kelas . ' ' . $this->jurusan->nama_jurusan . ' ' . $this->nomor_kelas;
    }

    public function Jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function Siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id');
    }

    public function Guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function Presensi()
    {
        return $this->hasMany(Presensi::class, 'kelas_id');
    }


}
