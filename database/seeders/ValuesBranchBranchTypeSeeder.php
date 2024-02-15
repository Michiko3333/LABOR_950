<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesBranchBranchTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_branch_branch_type')->insert([
            ['name' => '本社'],
            ['name' => '子会社'],
            ['name' => '工場'],
            ['name' => '営業所']
        ]);
    }
}
