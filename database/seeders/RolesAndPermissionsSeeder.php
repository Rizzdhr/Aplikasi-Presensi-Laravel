<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $roles = ['admin', 'guru', 'bk'];

        foreach ($roles as $role) {
            Role::updateOrCreate(['name' => $role]);
        }

        // Create permissions
        $permissions = [
            // 'view_data',
            'create_data',
            'edit_data',
            'delete_data',
            // 'view_report',
            'print_report',
            'take_attendance',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission]);
        }

        // Assign permissions to roles
        $admin = Role::findByName('admin');
        $admin->givePermissionTo([Permission::all()]);

        $guru = Role::findByName('guru');
        $guru->givePermissionTo(['take_attendance']);

        $bk = Role::findByName('bk');
        $bk->givePermissionTo(['print_report']);

        // Optionally, you can assign roles to specific users here
    }
}
