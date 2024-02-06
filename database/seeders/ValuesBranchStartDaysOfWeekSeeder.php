<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_branch_start_days_of_week;

class ValuesBranchStartDaysOfWeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_branch_start_days_of_week = Values_branch_start_days_of_week::create([
            'name' => '月曜日', 
        ]);

        $values_branch_start_days_of_week = Values_branch_start_days_of_week::create([
            'name' => '火曜日', 
        ]);

        $values_branch_start_days_of_week = Values_branch_start_days_of_week::create([
            'name' => '水曜日', 
        ]);

        $values_branch_start_days_of_week = Values_branch_start_days_of_week::create([
            'name' => '木曜日', 
        ]);

        $values_branch_start_days_of_week = Values_branch_start_days_of_week::create([
            'name' => '金曜日', 
        ]);

        $values_branch_start_days_of_week = Values_branch_start_days_of_week::create([
            'name' => '土曜日', 
        ]);

        $values_branch_start_days_of_week = Values_branch_start_days_of_week::create([
            'name' => '日曜日', 
        ]);

    }
}
