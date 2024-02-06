<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_employee_employment_type;

class ValuesEmployeeEmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_employee_employment_type = Values_employee_employment_type::create([
            'name' => '派遣・請負労働者として主として当該事業所以外で就労する場合', 
        ]);

        $values_employee_employment_type = Values_employee_employment_type::create([
            'name' => '1に該当しない場合', 
        ]);
    }
}
