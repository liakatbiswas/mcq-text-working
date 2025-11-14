<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $subjects = [
            ['name_en' => 'Bangla', 'name_bn' => 'বাংলা', 'sub_code' => '101'],
            ['name_en' => 'English', 'name_bn' => 'ইংরেজি', 'sub_code' => '102'],
            ['name_en' => 'Mathematics', 'name_bn' => 'গণিত', 'sub_code' => '103'],
            ['name_en' => 'Science', 'name_bn' => 'বিজ্ঞান', 'sub_code' => '104'],
            ['name_en' => 'Information and Communications Technology', 'name_bn' => 'তথ্য ও যোগাযোগ প্রযুক্তি', 'sub_code' => '154'],
            ['name_en' => 'Social Science', 'name_bn' => 'সমাজবিজ্ঞান', 'sub_code' => '106'],
            ['name_en' => 'Religion', 'name_bn' => 'ধর্ম', 'sub_code' => '107'],
            ['name_en' => 'Bangladesh and Global Studies', 'name_bn' => 'বাংলাদেশ ও বিশ্বপরিচয়', 'sub_code' => '108'],
            ['name_en' => 'Physics', 'name_bn' => 'পদার্থবিজ্ঞান', 'sub_code' => '109'],
            ['name_en' => 'Chemistry', 'name_bn' => 'রসায়ন', 'sub_code' => '110'],
            ['name_en' => 'Biology', 'name_bn' => 'জীববিজ্ঞান', 'sub_code' => '111'],
            ['name_en' => 'Higher Mathematics', 'name_bn' => 'উচ্চতর গণিত', 'sub_code' => '112'],
            ['name_en' => 'Accounting', 'name_bn' => 'হিসাববিজ্ঞান', 'sub_code' => '113'],
            ['name_en' => 'Business Studies', 'name_bn' => 'ব্যবসায় শিক্ষা', 'sub_code' => '114'],
            ['name_en' => 'Economics', 'name_bn' => 'অর্থনীতি', 'sub_code' => '115'],
            ['name_en' => 'Civics and Citizenship', 'name_bn' => 'পৌরনীতি ও নাগরিকতা', 'sub_code' => '116'],
            ['name_en' => 'Agriculture Studies', 'name_bn' => 'কৃষি শিক্ষা', 'sub_code' => '117'],
            ['name_en' => 'Home Science', 'name_bn' => 'গার্হস্থ্য বিজ্ঞান', 'sub_code' => '118'],
            ['name_en' => 'Psychology', 'name_bn' => 'মনোবিজ্ঞান', 'sub_code' => '119'],
            ['name_en' => 'Logic', 'name_bn' => 'যুক্তিবিদ্যা', 'sub_code' => '120'],
        ];

        foreach ($subjects as $subject) {
            Subject::create([
                'name_en' => $subject['name_en'],
                'name_bn' => $subject['name_bn'],
                'sub_code' => $subject['sub_code'],
            ]);
        }

    }
}
