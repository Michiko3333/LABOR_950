<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeInsuredReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_insured_reason')->insert([
            [
                'id' => '1',
                'name' => '新規雇用（新規,学卒）', 
            ],
            [
                'id' => '2',
                'name' => '新規雇用（その他）', 
            ],
            [
                'id' => '3',
                'name' => '日雇からの切替', 
            ],
            [
                'id' => '4',
                'name' => 'その他', 
            ],
            [
                'id' => '8',
                'name' => '出向元への復帰等(65歳以上)', 
            ],
        ]);
    }
}
