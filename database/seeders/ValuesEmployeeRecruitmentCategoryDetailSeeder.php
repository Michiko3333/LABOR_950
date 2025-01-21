<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeRecruitmentCategoryDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_recruitment_category_detail')->truncate();
        DB::table('m_values_employee_recruitment_category_detail')->insert([
            [
                'id' => '1',
                'name' => 'インターン採用',
            ],
            [
                'id' => '2',
                'name' => 'リファラル採用（社員紹介）',
            ],
            [
                'id' => '3',
                'name' => '業者紹介からの採用',
            ],
            [
                'id' => '4',
                'name' => '顧客紹介からの採用',
            ],
            [
                'id' => '5',
                'name' => '知人紹介からの採用',
            ],
            [
                'id' => '6',
                'name' => '再雇用・リターン採用',
            ],
            [
                'id' => '7',
                'name' => '障碍者採用',
            ],
            [
                'id' => '8',
                'name' => 'シニア採用（定年退職後）',
            ],
            [
                'id' => '9',
                'name' => '外国人採用',
            ],
            [
                'id' => '10',
                'name' => 'その他採用',
            ],
        ]);
    }
}
