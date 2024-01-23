<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = ['nama_mapel'];

    public function Guru()
    {
        return $this->belongsToMany(Mapel::class, 'guru_mapel');
    }
}
