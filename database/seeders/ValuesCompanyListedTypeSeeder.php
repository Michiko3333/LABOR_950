<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesCompanyListedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_company_listed_type')->insert([
            ['name' => '東証プライム'],
            ['name' => '東証スタンダード'],
            ['name' => '東証グロース'],
            ['name' => '札幌'],
            ['name' => '名古屋'],
            ['name' => '福岡'],
        ]);
    }
}
