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
            'nip'   => '1234.12.12.123',
            'nama' => 'Admin',
            'mapel_id' => 1,
            'jenis_kelamin' => 'Laki-laki',
        ]);

        Guru::create([
            'nip'   => '4321.21.21.321',
            'nama' => 'Neng Masriyah, S.Kom',
            'mapel_id' => 1,
            'jenis_kelamin' => 'Perempuan',
        ]);

        Guru::create([
            'nip'   => '5678.56.56.56',
            'nama' => 'BK',
            'mapel_id' => 1,
            'jenis_kelamin' => 'Laki-laki',
        ]);
    }
}
