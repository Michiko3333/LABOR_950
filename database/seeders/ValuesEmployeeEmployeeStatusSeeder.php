<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeEmployeeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_employee_status')->truncate();
        DB::table('m_values_employee_employee_status')->insert([
            [
                'id' => '1',
                'name' => '内定',
            ],
            [
                'id' => '2',
                'name' => '契約社員',
            ],
            [
                'id' => '3',
                'name' => '正社員',
            ],
            [
                'id' => '4',
                'name' => 'パート・アルバイト',
            ],
            [
                'id' => '5',
                'name' => '嘱託社員',
            ],
            [
                'id' => '6',
                'name' => 'その他',
            ],
        ]);
    }
}
