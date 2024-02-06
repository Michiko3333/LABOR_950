<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_employee_insured_age_type;

class ValuesEmployeeInsuredAgeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_employee_insured_age_type = Values_employee_insured_age_type::create([
            'name' => '一般', 
        ]);

        $values_employee_insured_age_type = Values_employee_insured_age_type::create([
            'name' => '高年齢', 
        ]);

        $values_employee_insured_age_type = Values_employee_insured_age_type::create([
            'name' => '短期', 
        ]);

        $values_employee_insured_age_type = Values_employee_insured_age_type::create([
            'name' => '高年齢(65歳以上)', 
        ]);
    }
}
