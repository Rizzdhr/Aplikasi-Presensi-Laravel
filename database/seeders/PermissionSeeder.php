<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::updateOrCreate(
            [
            'name' => 'admin',
            ],
            ['name' => 'admin']
        );

        $role_guru = Role::updateOrCreate(
            [
            'name' => 'guru',
            ],
            ['name' => 'guru']
        );

        $role_bk = Role::updateOrCreate(
            [
            'name' => 'bk',
            ],
            ['name' => 'bk']
        );

        $permission = Permission::updateOrCreate(
            [
                'name' => 'view_dashboard',
            ],
            ['name' => 'view_dashboard']
        );

        $permission2 = Permission::updateOrCreate(
            [
                'name' => 'view_kelas',
            ],
            ['name' => 'view_kelas']
        );

        $permission3= Permission::updateOrCreate(
            [
                'name' => 'view_siswas',
            ],
            ['name' => 'view_siswas']
        );

        $role_admin->givePermissionTo($permission);
        $role_admin->givePermissionTo($permission2);
        $role_admin->givePermissionTo($permission3);

        $role_guru->givePermissionTo($permission2);

        $user = User::find(1);
        // $user2 = User::find(2);
        // $user3 = User::find(3);


        $user->assignRole('admin');
        // $user2->assignRole('guru');
        // $user3->assignRole('bk');
    }
}
