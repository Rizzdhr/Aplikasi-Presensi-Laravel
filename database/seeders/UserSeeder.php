<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(GuruSeeder::class);
        $this->call(MapelSeeder::class);

        \App\Models\User::factory()->create([
            'name'  => 'Rizky',
            'guru_id'   => '1',
            'mapel_id'  => '1',
            'username' => 'Rizky Dharmawan (Admin)',
            'email' => 'rizky@gmail.com',
            'role_id' => Role::where('nama', 'Admin')->first('id'),
        ]);
    }
}
