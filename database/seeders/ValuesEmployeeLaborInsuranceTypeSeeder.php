<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_employee_labor_insurance_type;

class ValuesEmployeeLaborInsuranceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_employee_labor_insurance_type = Values_employee_labor_insurance_type::create([
            'name' => '常用労働者', 
        ]);

        $values_employee_labor_insurance_type = Values_employee_labor_insurance_type::create([
            'name' => '役員で労働者扱いの者', 
        ]);

        $values_employee_labor_insurance_type = Values_employee_labor_insurance_type::create([
            'name' => '臨時労働者', 
        ]);

    }
}
