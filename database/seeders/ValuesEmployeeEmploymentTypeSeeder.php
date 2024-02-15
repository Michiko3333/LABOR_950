<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeEmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_employment_type')->insert([
            ['name' => '派遣・請負労働者として主として当該事業所以外で就労する場合'],
            ['name' => '1に該当しない場合']
        ]);
    }
}
