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
                'name'=>'Rizky',
                'email'=>'rizky@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('rizky')
            ],
            [
                'name'=>'guru',
                'email'=>'guru@gmail.com',
                'role'=>'guru',
                'password'=>bcrypt('guru123')
            ],
            [
                'name'=>'bk',
                'email'=>'bk@gmail.com',
                'role'=>'bk',
                'password'=>bcrypt('bk123')
            ],
        ];

        foreach($userData as $key => $val){
            User::updateOrCreate(
                ['email' => $val['email']],
                $val
            );
        }

    }
}
