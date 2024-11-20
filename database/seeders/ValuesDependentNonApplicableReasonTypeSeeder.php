<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesDependentNonApplicableReasonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_dependent_applicable_reason_type')->truncate();
        DB::table('m_values_dependent_applicable_reason_type')->insert([
            ['name' => '国内転入'],
            ['name' => 'その他']
        ]);
    }
}
