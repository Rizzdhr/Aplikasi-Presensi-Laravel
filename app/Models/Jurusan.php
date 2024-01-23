<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Jurusan extends Model
{
    protected $fillable = ['nama_jurusan'];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
