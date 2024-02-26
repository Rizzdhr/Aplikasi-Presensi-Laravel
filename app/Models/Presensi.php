<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $fillable = ['kelas_id', 'siswa_id', 'mapel_id', 'user_id', 'presensi', 'created_at'];

    /**
     * Get all of the Kelas for the Presensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    /**
     * Get all of the comments for the Presensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function siswas()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    /**
     * Get all of the comments for the Presensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function mapels()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    /**
     * Get the user that owns the Presensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
