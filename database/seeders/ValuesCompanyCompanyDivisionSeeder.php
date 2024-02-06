<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_company_company_division;

class ValuesCompanyCompanyDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_company_company_division = Values_company_company_division::create([
            'name' => '労務事務所', 
        ]);

        $values_company_company_division = Values_company_company_division::create([
            'name' => '顧客企業', 
        ]);

    }
}
