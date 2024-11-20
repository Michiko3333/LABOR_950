<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeOccupationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_occupation_type')->truncate();
        DB::table('m_values_employee_occupation_type')->insert([
            [
                'option_no' => '01',
                'name' => '管理的職業',
            ],
            [
                'option_no' => '02',
                'name' => '専門的・技術的職業',
            ],
            [
                'option_no' => '03',
                'name' => '事務的職業',
            ],
            [
                'option_no' => '04',
                'name' => '販売の職業',
            ],
            [
                'option_no' => '05',
                'name' => 'サービスの職業',
            ],
            [
                'option_no' => '06',
                'name' => '保安の職業',
            ],
            [
                'option_no' => '07',
                'name' => '農林漁業の職業',
            ],
            [
                'option_no' => '08',
                'name' => '生産工程の職業',
            ],
            [
                'option_no' => '09',
                'name' => '輸送・機械運転の職業',
            ],
            [
                'option_no' => '10',
                'name' => '建設・採掘の職業',
            ],
            [
                'option_no' => '11',
                'name' => '運搬・清掃・包装等の職業',
            ],
        ]);
    }
}
