<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeLaborInsuranceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_labor_insurance_type')->insert([
            ['name' => '常用労働者'],
            ['name' => '役員で労働者扱いの者'],
            ['name' => '臨時労働者'],
        ]);
    }
}
