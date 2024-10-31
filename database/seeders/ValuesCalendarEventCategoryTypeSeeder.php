<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesCalendarEventCategoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_calendar_event_category_type')->insert([
            ['name' => '会社行事'],
            ['name' => '総務業務'],
            ['name' => '税務業務'],
            ['name' => '人事業務'],
            ['name' => '行政手続'],
            ['name' => 'その他']
        ]);
    }
}
