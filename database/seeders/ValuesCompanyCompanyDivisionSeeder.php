<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesCompanyCompanyDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_company_company_division')->truncate();
        DB::table('m_values_company_company_division')->insert([
            ['name' => '労務事務所'],
            ['name' => '顧客企業']
        ]);
    }
}
