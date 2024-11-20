<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesDependentTelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_dependent_tel_type')->truncate();
        DB::table('m_values_dependent_tel_type')->insert([
            ['name' => '自宅'],
            ['name' => '携帯'],
            ['name' => '勤務先'],
            ['name' => 'その他']
        ]);
    }
}
