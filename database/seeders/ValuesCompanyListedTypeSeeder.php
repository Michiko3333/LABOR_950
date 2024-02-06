<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_company_listed_type;

class ValuesCompanyListedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_company_listed_type = Values_company_listed_type::create([
            'name' => '東証プライム', 
        ]);

        $values_company_listed_type = Values_company_listed_type::create([
            'name' => '東証スタンダード', 
        ]);

        $values_company_listed_type = Values_company_listed_type::create([
            'name' => '東証グロース', 
        ]);

        $values_company_listed_type = Values_company_listed_type::create([
            'name' => '札幌', 
        ]);

        $values_company_listed_type = Values_company_listed_type::create([
            'name' => '名古屋', 
        ]);

        $values_company_listed_type = Values_company_listed_type::create([
            'name' => '福岡', 
        ]);

    }
}
