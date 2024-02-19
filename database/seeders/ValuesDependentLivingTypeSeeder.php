<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesDependentLivingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_dependent_living_type')->insert([
            ['name' => '同居'],
            ['name' => '別居']
        ]);
    }
}
