<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesCompanyBusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_company_business_type')->truncate();
        DB::table('m_values_company_business_type')->insert([
            ['name' => '大企業'],
            ['name' => '中小企業'],
            ['name' => '小規模企業者']
        ]);
    }
}
