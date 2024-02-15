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
        DB::table('m_values_employee_employee_status')->insert([
            [
                'id' => '1', 
                'name' => '内定承諾（未社員）', 
            ],
            [
                'id' => '2', 
                'name' => '有期雇用社員', 
            ],
            [
                'id' => '3', 
                'name' => '正社員', 
            ],
            [
                'id' => '9', 
                'name' => '退職者', 
            ],
    ]);
    }
}
