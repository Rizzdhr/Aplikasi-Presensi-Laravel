<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = ['nip', 'nama', 'jenis_kelamin'];

    // public function Mapel()
    // {
    //     return $this->belongsTo(Mapel::class);
    // }

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'guru_id');
    }

    public function User()
    {
        return $this->hasOne(User::class, 'guru_id');
    }

}
