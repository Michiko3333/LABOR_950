<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_employee_insured_reason;

class ValuesEmployeeInsuredReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_employee_insured_reason = Values_employee_insured_reason::create([
            'id' => '1',
            'name' => '新規雇用（新規,学卒）', 
        ]);

        $values_employee_insured_reason = Values_employee_insured_reason::create([
            'id' => '2',
            'name' => '新規雇用（その他）', 
        ]);

        $values_employee_insured_reason = Values_employee_insured_reason::create([
            'id' => '3',
            'name' => '日雇からの切替', 
        ]);


        $values_employee_insured_reason = Values_employee_insured_reason::create([
            'id' => '4',
            'name' => 'その他', 
        ]);

        $values_employee_insured_reason = Values_employee_insured_reason::create([
            'id' => '8',
            'name' => '出向元への復帰等(65歳以上)', 
        ]);
    }
}
