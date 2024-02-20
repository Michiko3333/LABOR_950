<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesDependentDependentOccupationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_dependent_dependent_occupation_type')->insert([
            ['name' => '無職'],
            ['name' => 'パート'],
            ['name' => '年金受給者'],
            ['name' => '小・中学生以下'],
            ['name' => '高・大学生'],
            ['name' => 'その他']
        ]);
    }
}
