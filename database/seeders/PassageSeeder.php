<?php

namespace Database\Seeders;

use App\Models\Passage;
use Illuminate\Database\Seeder;

class PassageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $passages = [
            'নবম শ্রেণির ছাত্র সৌরভ সহজ-সরল ও সদালাপী। সে কখনো কাউকে কটু কথা বলে না এবং অন্যের ক্ষতি করে না। এমনকি বিড়াল এসে টেবিলে রাখা তার গ্লাসের দুধটুকু পান করতে থাকলে সে রাগ করে না বরং আদর করে বিড়ালটিকে বাকি দুধটুকু পান করায়।',
            'Passage two- 2',
            'Passage three- 3',
        ];

        foreach ($passages as $passage) {
            Passage::create(['body' => $passage]);
        }
    }
}
