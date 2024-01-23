<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nisn','nama','kelas_id','jurusan_id','jenis_kelamin'];

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
