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
            'id' => '1', 
            'name' => '完全週休2日制', 
        ]);

        $values_branch_work_style_type = Values_branch_work_style_type::create([
            'id' => '2', 
            'name' => '隔週2日制', 
        ]);

        $values_branch_work_style_type = Values_branch_work_style_type::create([
            'id' => '3', 
            'name' => '月1回　週休2日制', 
        ]);

        $values_branch_work_style_type = Values_branch_work_style_type::create([
            'id' => '4', 
            'name' => '月2回　週休2日制', 
        ]);

        $values_branch_work_style_type = Values_branch_work_style_type::create([
            'id' => '5', 
            'name' => '月3回　週休2日制', 
        ]);

        $values_branch_work_style_type = Values_branch_work_style_type::create([
            'id' => '6', 
            'name' => '1年変形休日制', 
        ]);

        $values_branch_work_style_type = Values_branch_work_style_type::create([
            'id' => '7', 
            'name' => '1ヵ月変形休日制', 
        ]);

        $values_branch_work_style_type = Values_branch_work_style_type::create([
            'id' => '99', 
            'name' => '変形労働制', 
        ]);
    }
}
