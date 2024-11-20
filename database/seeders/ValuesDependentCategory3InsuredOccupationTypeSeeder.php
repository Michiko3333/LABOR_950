<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesDependentCategory3InsuredOccupationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_dependent_category3_insured_occupation_type')->truncate();
        DB::table('m_values_dependent_category3_insured_occupation_type')->insert([
            ['name' => '無職'],
            ['name' => 'パート'],
            ['name' => '年金受給者'],
            ['name' => 'その他']
        ]);
    }
}
