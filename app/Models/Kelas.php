<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = ['tingkat_kelas', 'jurusan_id','nomor_kelas', 'walas'];

    public function Jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function getTingkatJurusanAttribute()
    {
        return $this->tingkat_kelas . ' ' . $this->jurusan->nama_jurusan . ' ' . $this->nomor_kelas;
    }

    public function Siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id');
    }


}
