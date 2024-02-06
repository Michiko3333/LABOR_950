<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_company_business_type;

class ValuesCompanyBusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_company_business_type = Values_company_business_type::create([
            'name' => '大企業', 
        ]);

        $values_company_business_type = Values_company_business_type::create([
            'name' => '中小企業', 
        ]);

        $values_company_business_type = Values_company_business_type::create([
            'name' => '小規模企業者', 
        ]);

    }
}
