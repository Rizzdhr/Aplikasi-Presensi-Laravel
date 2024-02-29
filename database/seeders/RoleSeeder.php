<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Guru']);
        Role::create(['name' => 'BK']);


        // $guru = Role::create(['name' => 'Guru']);
        // $bk = Role::create(['name' => 'BK']);

        // $guru->givePermissionTo([
        //     'view-data',
        //     'presensi'
        // ]);

        // $bk->givePermissionTo([
        //     'view-data',
        //     'laporan'
        // ]);
    }
}
















// <?php

// namespace Database\Seeders;

// use App\Models\Role;
// use Illuminate\Database\Seeder;

// class RoleSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      *
//      * @return void
//      */
//     public function run()
//     {
//         Role::create([
//             'nama' => 'Admin',
//         ]);
//         Role::create([
//             'nama' => 'Guru',
//         ]);
//         Role::create([
//             'nama' => 'BK'
//         ]);
//     }
// } -->
