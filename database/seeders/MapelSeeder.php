<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mapel;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tambahkan beberapa data mapel
        $mapels = [
            ['nama_mapel' => 'Basis Data'],
        ];

        // Masukkan data mapel ke dalam tabel
        Mapel::insert($mapels);
    }
}
