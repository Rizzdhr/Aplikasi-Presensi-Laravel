<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Admin User
        $admin = User::updateOrcreate([
            'guru_id'   => 1,
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123')
        ]);
        $admin->assignRole('Admin');

        $guru = User::updateOrcreate([
            'guru_id'   => 2,
            'username' => 'Neng Masriyah, S.Kom',
            'email' => 'neng@gmail.com',
            'password' => Hash::make('neng1234')
        ]);
        $guru->assignRole('Guru');

        $bk = User::updateOrcreate([
            'guru_id'   => 3,
            'username' => 'BK',
            'email' => 'bk@gmail.com',
            'password' => Hash::make('bk123456')
        ]);
        $bk->assignRole('BK');
    }
}
