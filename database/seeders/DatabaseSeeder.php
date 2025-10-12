<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super@liakatbiswas.com',
            'phone' => '01571719052',
            'password' => Hash::make('super'),
        ]);

        $this->call([
            SchoolClassSeeder::class,
            SchoolSeeder::class,
            SubjectSeeder::class,
            RolePermissionSeeder::class,
        ]);
    }
}
