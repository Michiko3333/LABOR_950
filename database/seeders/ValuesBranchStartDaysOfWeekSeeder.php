<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesBranchStartDaysOfWeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_branch_start_days_of_week')->truncate();
        DB::table('m_values_branch_start_days_of_week')->insert([
            ['name' => '月曜日'],
            ['name' => '火曜日'],
            ['name' => '水曜日'],
            ['name' => '木曜日'],
            ['name' => '金曜日'],
            ['name' => '土曜日'],
            ['name' => '日曜日']
        ]);
    }
}
