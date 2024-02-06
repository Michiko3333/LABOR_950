<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_employee_employment_route;

class ValuesEmployeeEmploymentRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_employee_employment_route = Values_employee_employment_route::create([
            'name' => '安定所紹介', 
        ]);

        $values_employee_employment_route = Values_employee_employment_route::create([
            'name' => '自己就職', 
        ]);

        $values_employee_employment_route = Values_employee_employment_route::create([
            'name' => '民間紹介', 
        ]);

        $values_employee_employment_route = Values_employee_employment_route::create([
            'name' => '把握していない', 
        ]);
    }
}
