<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_branch_work_style_type;

class ValuesBranchWorkStyleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_branch_work_style_type = Values_branch_work_style_type::create([
            'name' => '完全週休2日制', 
        ]);

        $values_branch_work_style_type = Values_branch_work_style_type::create([
            'name' => '隔週2日制', 
        ]);

        $values_branch_work_style_type = Values_branch_work_style_type::create([
            'name' => '月1回　週休2日制', 
        ]);

        $values_branch_work_style_type = Values_branch_work_style_type::create([
            'name' => '月2回　週休2日制', 
        ]);

        $values_branch_work_style_type = Values_branch_work_style_type::create([
            'name' => '月3回　週休2日制', 
        ]);

        $values_branch_work_style_type = Values_branch_work_style_type::create([
            'name' => '1年変形休日制', 
        ]);

        $values_branch_work_style_type = Values_branch_work_style_type::create([
            'name' => '1ヵ月変形休日制', 
        ]);

        $values_branch_work_style_type = Values_branch_work_style_type::create([
            'name' => '変形労働制', 
        ]);
    }
}
