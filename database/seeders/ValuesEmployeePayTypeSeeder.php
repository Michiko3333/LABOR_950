<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeePayTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_pay_type')->truncate();
        DB::table('m_values_employee_pay_type')->insert([
            [
                'id' => '1',
                'name' => '月給（日給月給）',
            ],
            [
                'id' => '2',
                'name' => '週給',
            ],
            [
                'id' => '3',
                'name' => '日給',
            ],
            [
                'id' => '4',
                'name' => '時給',
            ],
            [
                'id' => '5',
                'name' => '年俸',
            ],
            [
                'id' => '6',
                'name' => '月給（完全月給）',
            ],
            [
                'id' => '7',
                'name' => '出来高',
            ],
            [
                'id' => '8',
                'name' => 'その他',
            ],
        ]);
    }
}
