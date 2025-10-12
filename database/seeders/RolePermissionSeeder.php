<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Step 1: সব পারমিশন তৈরি করো
        $permissions = ['create', 'edit', 'delete', 'show', 'create-admin', 'create-mcq', 'create-quiz'];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Step 2: Super Admin Role তৈরি করো Super Admin কে সব পারমিশন দাও
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // Step 3: Admin Role তৈরি করো Admin কে নির্দিষ্ট পারমিশন দাও
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $adminPermissions = ['create', 'edit', 'delete', 'show'];
        $admin->givePermissionTo($adminPermissions);

        // Step 3: Admin Role তৈরি করো Admin কে নির্দিষ্ট পারমিশন দাও
        $student = Role::firstOrCreate(['name' => 'Student']);
        $studentPermissions = ['show'];
        $student->givePermissionTo($studentPermissions);
    }
}
