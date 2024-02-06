<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_employee_employment_insurance_type;

class ValuesEmployeeEmploymentInsuranceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_employee_employment_insurance_type = Values_employee_employment_insurance_type::create([
            'name' => '常用労働者', 
        ]);

        $values_employee_employment_insurance_type = Values_employee_employment_insurance_type::create([
            'name' => '役員で雇用保険に加入', 
        ]);

    }
}
