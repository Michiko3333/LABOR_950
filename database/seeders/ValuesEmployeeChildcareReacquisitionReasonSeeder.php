<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeChildcareReacquisitionReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_childcare_reacquisition_reason')->truncate();
        DB::table('m_values_employee_childcare_reacquisition_reason')->insert([
            ['name' => '保育所における保育が実施されないこと'],
            ['name' => '養育を予定していた配偶者の死亡'],
            ['name' => '養育を予定していた配偶者の負傷・疾病等'],
            ['name' => '養育を予定していた配偶者との婚姻の解消等による別居'],
            ['name' => '養育を予定していた配偶者の産前産後休業等'],
            ['name' => '他休業事由の消滅']
        ]);
    }
}
