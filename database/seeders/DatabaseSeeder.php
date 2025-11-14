<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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

        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super@liakatbiswas.com',
            'phone' => '01571719052',
            'password' => Hash::make('super'),
        ]);

        $user->profile()->create([
            'address' => 'Mymensingh',
            'city' => 'Mymensingh',
            'country' => 'Bangladesh',
            'dob' => '1985-05-03',
            'gender' => 'male',
            'facebook' => 'https:facebook.com/liakatbiswas',
            'linkedin' => '',
        ]);

        $this->call([
            SchoolClassSeeder::class,
            SchoolSeeder::class,
            SubjectSeeder::class,
            RolePermissionSeeder::class,
            ChapterSeeder::class,
            PassageSeeder::class,
            QuestionSeeder::class,
            AssignSubjectSeeder::class,
        ]);
    }
}
