<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeEmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_employee_type')->insert([
            [
                'id' => '1', 
                'name'=> '代表取締役',
            ],
            [
                'id' => '2', 
                'name'=> '取締役', 
            ],
            [
                'id' => '3', 
                'name'=> '執行役員', 
            ],
            [
                'id' => '4', 
                'name'=> '外部役員', 
            ],
            [
                'id' => '5', 
                'name'=> '顧問', 
            ],
            [
                'id' => '9', 
                'name'=> '一般社員', 
            ],
        ]);
    }
}
