<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an admin role if it doesn't exist
        $adminRole = Role::firstOrCreate(['nama' => 'admin']);
        
        // Create an admin user
        User::create([
            'username' => 'Rizky Dharmawan',
            'guru_id' => 1,
            'email' => 'rizky@gmail.com',
            'password' => bcrypt('rizky123'),
        ])->roles()->attach($adminRole);
    }
}
