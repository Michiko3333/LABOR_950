<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesSexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_sex')->truncate();
        DB::table('m_values_sex')->insert([
            ['name' => '男'],
            ['name' => '女'],
        ]);
    }
}
