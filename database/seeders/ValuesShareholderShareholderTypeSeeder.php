<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesShareholderShareholderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_shareholder_shareholder_type')->insert([
            ['name' => '代表取締役'],
            ['name' => '取締役'],
        ]);
    }
}
