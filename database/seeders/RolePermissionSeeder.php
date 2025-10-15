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
        // Step 1: সব পারমিশন তৈরি করো (সব ছোট হাতের)
        $permissions = [
            'create',
            'edit',
            'delete',
            'show',
            'create-admin',
            'create-mcq',
            'create-quiz',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => strtolower($permission)]);
        }

        // Step 2: Super admin role তৈরি করো
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // Step 3: Admin role তৈরি করো
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $adminPermissions = ['create', 'edit', 'delete', 'show'];
        $admin->givePermissionTo($adminPermissions);

        // Step 4: Student role তৈরি করো
        $student = Role::firstOrCreate(['name' => 'student']);
        $studentPermissions = ['show'];
        $student->givePermissionTo($studentPermissions);

    }
}
