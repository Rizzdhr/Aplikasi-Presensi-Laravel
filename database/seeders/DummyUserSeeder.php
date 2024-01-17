<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Guru',
                'email'=>'guru@gmail.com',
                'role'=>'guru',
                'password'=>bcrypt('guru123')
            ],
            [
                'name'=>'BK',
                'email'=>'bk@gmail.com',
                'role'=>'bk',
                'password'=>bcrypt('bk123')
            ],
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('admin123')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }

    }
}
