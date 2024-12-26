<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesDependentDependentRemoveReasonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_dependent_dependent_remove_reason_type')->truncate();
        DB::table('m_values_dependent_dependent_remove_reason_type')->insert([
            ['name' => '死亡'],
            ['name' => '離婚'],
            ['name' => '就職・収入増加'],
            ['name' => '75歳到達'],
            ['name' => '障害認定'],
            ['name' => 'その他']
        ]);
    }
}
