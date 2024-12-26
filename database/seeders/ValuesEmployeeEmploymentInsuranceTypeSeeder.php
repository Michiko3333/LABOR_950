<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeEmploymentInsuranceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_employment_insurance_type')->truncate();
        DB::table('m_values_employee_employment_insurance_type')->insert([
            ['name' => '常用労働者'],
            ['name' => '役員で雇用保険に加入'],
        ]);
    }
}
