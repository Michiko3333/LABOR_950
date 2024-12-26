<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesDependentApplicableReasonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_dependent_applicable_reason_type')->truncate();
        DB::table('m_values_dependent_applicable_reason_type')->insert([
            ['name' => '留学'],
            ['name' => '同行家族'],
            ['name' => '特定活動'],
            ['name' => '海外婚姻'],
            ['name' => 'その他']
        ]);
    }
}
