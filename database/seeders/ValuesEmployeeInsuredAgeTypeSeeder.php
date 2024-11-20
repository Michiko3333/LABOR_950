<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeInsuredAgeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_insured_age_type')->truncate();
        DB::table('m_values_employee_insured_age_type')->insert([
            ['name' => '一般'],
            ['name' => '高年齢'],
            ['name' => '短期'],
            ['name' => '高年齢(65歳以上)']
        ]);
    }
}
