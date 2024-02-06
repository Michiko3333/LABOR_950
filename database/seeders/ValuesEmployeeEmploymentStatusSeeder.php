<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_employee_employment_status;

class ValuesEmployeeEmploymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_employee_employment_status = Values_employee_employment_status::create([
            'name' => '日雇', 
        ]);

        $values_employee_employment_status = Values_employee_employment_status::create([
            'name' => '派遣', 
        ]);

        $values_employee_employment_status = Values_employee_employment_status::create([
            'name' => 'パートタイム', 
        ]);


        $values_employee_employment_status = Values_employee_employment_status::create([
            'name' => '有期契約労働者', 
        ]);

        $values_employee_employment_status = Values_employee_employment_status::create([
            'name' => '季節的雇用', 
        ]);

        $values_employee_employment_status = Values_employee_employment_status::create([
            'name' => '船員', 
        ]);

        $values_employee_employment_status = Values_employee_employment_status::create([
            'name' => 'その他', 
        ]);
    }
}
