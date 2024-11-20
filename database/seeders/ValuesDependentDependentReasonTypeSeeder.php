<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesDependentDependentReasonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_dependent_dependent_reason_type')->truncate();
        DB::table('m_values_dependent_dependent_reason_type')->insert([
            ['name' => '配偶者の就職'],
            ['name' => '婚姻'],
            ['name' => '離婚'],
            ['name' => '収入減少'],
            ['name' => 'その他'],
        ]);
    }
}
