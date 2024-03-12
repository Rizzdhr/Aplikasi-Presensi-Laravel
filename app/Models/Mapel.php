<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = ['nama_mapel'];

    // public function Guru()
    // {
    //     return $this->hasMany(Guru::class);
    // }

    /**
     * Get all of the comments for the Mapel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mapels()
    {
        return $this->hasMany(Presensi::class, 'mapel_id');
    }
}
