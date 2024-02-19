<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeOverRetiredInsuranceLossReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_over_retired_insurance_loss_reason')->insert([
            [
                'id' => '4', 
                'name' => '退職等', 
            ],
            [
                'id' => '5', 
                'name' => '死亡', 
            ],
            [
                'id' => '7', 
                'name' => '75歳到達（健康保険のみ喪失）', 
            ],
            [
                'id' => '9', 
                'name' => '障害認定（健康保険のみ喪失）', 
            ],
            [
                'id' => '11', 
                'name' => '社会保障協定', 
            ],
    ]);
    }
}
