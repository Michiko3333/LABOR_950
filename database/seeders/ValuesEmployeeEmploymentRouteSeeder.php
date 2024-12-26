<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeEmploymentRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_employment_route')->truncate();
        DB::table('m_values_employee_employment_route')->insert([
            ['name' => '安定所紹介'],
            ['name' => '自己就職'],
            ['name' => '民間紹介'],
            ['name' => '把握していない']
        ]);
    }
}
