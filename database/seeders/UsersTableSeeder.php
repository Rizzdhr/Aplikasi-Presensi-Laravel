<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Admin user
        $admin = User::where('email', 'admin@gmail.com')->first();

        if (!$admin) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
            ]);
        } else {
            $admin->update([
                'name' => 'Admin',
                'password' => bcrypt('admin123'),
            ]);
        }

        $admin->assignRole('admin');

        // Guru user
        $guru = User::where('email', 'guru@gmail.com')->first();

        if (!$guru) {
            $guru = User::create([
                'name' => 'Guru',
                'email' => 'guru@gmail.com',
                'password' => bcrypt('guru123'),
            ]);
        } else {
            $guru->update([
                'name' => 'Guru',
                'password' => bcrypt('guru123'),
            ]);
        }

        $guru->assignRole('guru');

        // BK user
        $bk = User::where('email', 'bk@gmail.com')->first();

        if (!$bk) {
            $bk = User::create([
                'name' => 'BK',
                'email' => 'bk@gmail.com',
                'password' => bcrypt('bk123'),
            ]);
        } else {
            $bk->update([
                'name' => 'BK',
                'password' => bcrypt('bk123'),
            ]);
        }

        $bk->assignRole('bk');
    }
}
