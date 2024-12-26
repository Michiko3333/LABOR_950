<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesBranchWorkStyleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_branch_work_style_type')->truncate();
        DB::table('m_values_branch_work_style_type')->insert([
            [
                'id' => '1',
                'name' => '完全週休2日制',
            ],
            [
                'id' => '2',
                'name' => '隔週2日制',
            ],
            [
                'id' => '3',
                'name' => '月1回　週休2日制',
            ],
            [
                'id' => '4',
                'name' => '月2回　週休2日制',
            ],
            [
                'id' => '5',
                'name' => '月3回　週休2日制',
            ],
            [
                'id' => '6',
                'name' => '1年変形休日制',
            ],
            [
                'id' => '7',
                'name' => '1ヵ月変形休日制',
            ],
            [
                'id' => '99',
                'name' => '変形労働制',
            ],
        ]);
    }
}
