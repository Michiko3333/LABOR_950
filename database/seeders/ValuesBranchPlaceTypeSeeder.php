<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesBranchPlaceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_branch_place_type')->truncate();
        DB::table('m_values_branch_place_type')->insert([
            ['name' => '国内'],
            ['name' => '国外']
        ]);
    }
}
