<?php

namespace Database\Seeders;

use App\Models\AssignSubject;
use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class AssignSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = SchoolClass::whereIn('name', ['six', 'seven', 'eight', 'nine', 'ten'])->get();
        $subjects = Subject::all();

        foreach ($classes as $class) {
            foreach ($subjects as $subject) {
                AssignSubject::firstOrCreate([
                    'school_class_id' => $class->id,
                    'subject_id' => $subject->id,
                ]);
            }
        }
    }
}
