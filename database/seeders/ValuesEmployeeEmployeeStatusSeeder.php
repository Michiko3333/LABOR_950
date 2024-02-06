<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_employee_employee_status;

class ValuesEmployeeEmployeeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_employee_employee_status = Values_employee_employee_status::create([
            'id' => '1', 
            'name' => '内定承諾（未社員）', 
        ]);

        $values_employee_employee_status = Values_employee_employee_status::create([
            'id' => '2', 
            'name' => '有期雇用社員', 
        ]);

        $values_employee_employee_status = Values_employee_employee_status::create([
            'id' => '3', 
            'name' => '正社員', 
        ]);

        $values_employee_employee_status = Values_employee_employee_status::create([
            'id' => '9', 
            'name' => '退職者', 
        ]);

    }
}
