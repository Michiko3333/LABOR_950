<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeEmploymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_employment_status')->truncate();
        DB::table('m_values_employee_employment_status')->insert([
            ['name' => '日雇い'],
            ['name' => '派遣'],
            ['name' => 'アルバイト・パートタイム'],
            ['name' => '有期契約労働者（契約社員含む）'],
            ['name' => '季節的雇用'],
            ['name' => '船員'],
            ['name' => 'その他（正社員・無期雇用等）']
        ]);
    }
}
