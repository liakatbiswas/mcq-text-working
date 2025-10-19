<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chapters = [
            [
                'school_class_id' => 5,
                'subject_id' => 5,
                'name' => 'তথ্য ও যোগাযোগ প্রযুক্তি ও আমাদের বাংলাদেশ',
                'code' => '154',
                'description' => 'Introduction to basic numbers and counting from 1 to 100',
            ],
            [
                'school_class_id' => 5,
                'subject_id' => 5,
                'name' => 'কম্পিউটার রক্ষণাবেক্ষণ ও সাইবার নিরাপত্তা',
                'code' => '154',
                'description' => 'Introduction to basic numbers and counting from 1 to 100',
            ],
            [
                'school_class_id' => 5,
                'subject_id' => 5,
                'name' => 'ইন্টারনেট ও ওয়েব পরিচিতি',
                'code' => '154',
                'description' => 'Introduction to basic numbers and counting from 1 to 100',
            ],
            [
                'school_class_id' => 5,
                'subject_id' => 5,
                'name' => 'আমার লেখালেখি ও হিসাব',
                'code' => '154',
                'description' => 'Introduction to basic numbers and counting from 1 to 100',
            ],
            [
                'school_class_id' => 5,
                'subject_id' => 5,
                'name' => 'মাল্টিমিডিয়া ও গ্রাফিক্স',
                'code' => '154',
                'description' => 'Introduction to basic numbers and counting from 1 to 100',
            ],
            [
                'school_class_id' => 5,
                'subject_id' => 5,
                'name' => 'প্রোগ্রামিংয়ের মাধ্যমে সমস্যার সমাধান',
                'code' => '154',
                'description' => 'Introduction to basic numbers and counting from 1 to 100',
            ],
        ];

        foreach ($chapters as $chapter) {
            Chapter::create($chapter);
        }
    }
}
