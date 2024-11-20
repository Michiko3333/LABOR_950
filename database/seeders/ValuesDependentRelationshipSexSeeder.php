<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesDependentRelationshipSexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_dependent_relationship_sex')->truncate();
        DB::table('m_values_dependent_relationship_sex')->insert([
            ['name' => '夫'],
            ['name' => '妻'],
            ['name' => '夫（未届）'],
            ['name' => '妻（未届）']
        ]);
    }
}
