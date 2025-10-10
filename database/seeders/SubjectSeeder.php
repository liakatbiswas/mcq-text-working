<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            [
                'name_en' => 'Bangla',
                'name_bn' => 'বাংলা',
                'sub_code' => '101',
            ],
            [
                'name_en' => 'English',
                'name_bn' => 'ইংরেজি',
                'sub_code' => '102',
            ],
            [
                'name_en' => 'Mathematics',
                'name_bn' => 'গণিত',
                'sub_code' => '103',
            ],
            [
                'name_en' => 'Science',
                'name_bn' => 'বিজ্ঞান',
                'sub_code' => '104',
            ],
            [
                'name_en' => 'ICT',
                'name_bn' => 'তথ্য ও যোগাযোগ প্রযুক্তি',
                'sub_code' => '105',
            ],
        ]);
    }
}
