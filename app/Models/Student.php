<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['nisn','nama','kelas_id','jenis_kelamin'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
