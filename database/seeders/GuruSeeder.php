<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hapus semua data pada tabel gurus jika ada
        Guru::query()->delete();

        // Tambahkan data guru contoh
        Guru::create([
            'nip'   => '1234567890',
            'nama' => 'Admin',
            // 'mapel_id' => 1,
            'jenis_kelamin' => 'Laki-laki',
        ]);

        Guru::create([
            'nip'   => '0987654321',
            'nama' => 'Neng Masriyah, S.Kom',
            // 'mapel_id' => 1,
            'jenis_kelamin' => 'Perempuan',
        ]);

        Guru::create([
            'nip'   => '1223334444',
            'nama' => 'BK',
            // 'mapel_id' => 1,
            'jenis_kelamin' => 'Laki-laki',
        ]);
    }
}
