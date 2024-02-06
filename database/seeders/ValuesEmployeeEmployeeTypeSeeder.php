<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_employee_employee_type;

class ValuesEmployeeEmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_employee_employee_type = Values_employee_employee_type::create([
            'id' => '1', 
            'name' => '代表取締役', 
        ]);

        $values_employee_employee_type = Values_employee_employee_type::create([
            'id' => '2', 
            'name' => '取締役', 
        ]);

        $values_employee_employee_type = Values_employee_employee_type::create([
            'id' => '3', 
            'name' => '執行役員', 
        ]);

        $values_employee_employee_type = Values_employee_employee_type::create([
            'id' => '4', 
            'name' => '外部役員', 
        ]);

        $values_employee_employee_type = Values_employee_employee_type::create([
            'id' => '5', 
            'name' => '顧問', 
        ]);

        $values_employee_employee_type = Values_employee_employee_type::create([
            'id' => '9', 
            'name' => '一般社員', 
        ]);
    }
}
