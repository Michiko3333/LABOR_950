<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_employee_sex;

class ValuesEmployeeSexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_employee_sex = Values_employee_sex::create([
            'name' => '男性', 
        ]);

        $values_employee_sex = Values_employee_sex::create([
            'name' => '女性', 
        ]);

    }
}
