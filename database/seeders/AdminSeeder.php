<?php

namespace Database\Seeders;

// AdminSeeder.php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Find or create the admin role
        $adminRole = Role::firstOrCreate(['nama' => 'Admin']);

        // Define user data
        $userData = [
            'username' => 'Rizky Dharmawan',
            'guru_id' => 1, // Assuming you have a guru with id = 1 in the gurus table
            'email' => 'rizky@gmail.com'
        ];

        // Use updateOrCreate to create or update the user
        $user = User::updateOrCreate(
            ['email' => 'rizky@gmail.com'], // Search condition
            array_merge($userData, ['password' => Hash::make('rizky123')]) // Data to update or create
        );

        // Attach the admin role to the user
        $user->roles()->sync([$adminRole->id]);
    }
}
