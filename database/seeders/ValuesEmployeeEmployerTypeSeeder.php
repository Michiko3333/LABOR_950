<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_employee_employer_type;

class ValuesEmployeeEmployerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_employee_employer_type = Values_employee_employer_type::create([
            'name' => '雇用主', 
        ]);

        $values_employee_employer_type = Values_employee_employer_type::create([
            'name' => '非雇用主', 
        ]);
    }
}
