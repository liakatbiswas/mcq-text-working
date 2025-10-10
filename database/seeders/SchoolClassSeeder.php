<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Seeder;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = ['Six', 'Seven', 'Eight', 'Nine', 'Ten'];
        foreach ($classes as $class) {
            SchoolClass::create(['name' => $class]);
        }
    }
}
