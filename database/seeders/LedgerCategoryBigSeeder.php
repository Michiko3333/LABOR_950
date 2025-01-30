<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LedgerCategoryBigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_ledger_category_big')->truncate();
        DB::table('m_ledger_category_big')->insert([
            [
                'id' => '1',
                'big_category_name' => '社員を採用したとき',
            ],
            [
                'id' => '2',
                'big_category_name' => '社員に異動・変動があったとき',
            ],
            [
                'id' => '3',
                'big_category_name' => '社員の給与に変動があったとき',
            ],
            [
                'id' => '4',
                'big_category_name' => '社員が退職したとき',
            ],
            [
                'id' => '5',
                'big_category_name' => '社員が出産したとき',
            ],
            [
                'id' => '6',
                'big_category_name' => '会社の年間定例事務',
            ],
            [
                'id' => '7',
                'big_category_name' => '会社に関する変更事務',
            ],
            [
                'id' => '8',
                'big_category_name' => '建設関係等',
            ],
            [
                'id' => '9',
                'big_category_name' => '会社を設立したとき',
            ],
            [
                'id' => '10',
                'big_category_name' => 'その他',
            ],
        ]);
    }
}
