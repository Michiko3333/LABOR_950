<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeEnrollmentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_enrollment_category')->truncate();
        DB::table('m_values_employee_enrollment_category')->insert([
            [
                'id' => '1',
                'name' => '在籍（通常勤務）',
            ],
            [
                'id' => '2',
                'name' => '休職',
            ],
            [
                'id' => '3',
                'name' => '休業',
            ],
            [
                'id' => '4',
                'name' => '出向',
            ],
            [
                'id' => '5',
                'name' => '派遣',
            ],
            [
                'id' => '6',
                'name' => '退職',
            ],
        ]);
    }
}
