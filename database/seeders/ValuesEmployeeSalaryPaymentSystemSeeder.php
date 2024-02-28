<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeSalaryPaymentSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_salary_payment_system')->insert([
            ['name' => '月給'],
            ['name' => '週給'],
            ['name' => '日給'],
            ['name' => '時間給'],
            ['name' => 'その他'],
        ]);
    }
}
