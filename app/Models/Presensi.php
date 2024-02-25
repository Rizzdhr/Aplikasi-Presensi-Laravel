<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $fillable = ['siswa_id', 'mapel_id', 'tanggal', 'status', 'keterangan'];

    /**
     * Get all of the Kelas for the Presensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    /**
     * Get all of the comments for the Presensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    /**
     * Get all of the comments for the Presensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function Mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
