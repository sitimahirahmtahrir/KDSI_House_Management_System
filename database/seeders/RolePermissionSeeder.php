<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);
        $pulapol = Role::create(['name' => 'pulapol']);

        // Create permissions
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage maintenance']);
        Permission::create(['name' => 'verify guests']);

        // Assign permissions to roles
        $admin->givePermissionTo(['manage users', 'manage maintenance']);
        $pulapol->givePermissionTo(['verify guests']);
    }
}
