<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeWorkCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_work_category')->truncate();
        DB::table('m_values_employee_work_category')->insert([
            [
                'id' => '1',
                'name' => '固定時間勤務',
            ],
            [
                'id' => '2',
                'name' => '変形労働時間勤務',
            ],
            [
                'id' => '3',
                'name' => 'フレックスタイム勤務',
            ],
            [
                'id' => '4',
                'name' => '裁量労働勤務（みなし労働時間制）',
            ],
            [
                'id' => '5',
                'name' => '育児短時間勤務',
            ],
            [
                'id' => '6',
                'name' => 'テレワーク勤務',
            ],
            [
                'id' => '7',
                'name' => '時差出勤勤務',
            ],
            [
                'id' => '8',
                'name' => 'フルタイム勤務',
            ],
            [
                'id' => '9',
                'name' => 'パートタイム勤務',
            ],
            [
                'id' => '10',
                'name' => 'アルバイト勤務',
            ],
            [
                'id' => '11',
                'name' => 'シフト勤務',
            ],
            [
                'id' => '12',
                'name' => '短時間勤務',
            ],
            [
                'id' => '13',
                'name' => '嘱託勤務',
            ],
            [
                'id' => '14',
                'name' => 'その他',
            ],
        ]);
    }
}
