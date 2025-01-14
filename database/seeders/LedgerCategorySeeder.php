<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LedgerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_ledger_category')->truncate();
        DB::table('m_ledger_category')->insert([
            [
                'ledger_id' => '1',
                'medium_category_id' => null,
                'big_category_id' => '1',
            ],
            [
                'ledger_id' => '2',
                'medium_category_id' => '7',
                'big_category_id' => '4',
            ],
            [
                'ledger_id' => '3',
                'medium_category_id' => '7',
                'big_category_id' => '4',
            ],
            [
                'ledger_id' => '4',
                'medium_category_id' => '1',
                'big_category_id' => '2',
            ],
            [
                'ledger_id' => '5',
                'medium_category_id' => '4',
                'big_category_id' => '3',
            ],
            [
                'ledger_id' => '6',
                'medium_category_id' => '2',
                'big_category_id' => '2',
            ],
            [
                'ledger_id' => '7',
                'medium_category_id' => '2',
                'big_category_id' => '2',
            ],
            [
                'ledger_id' => '8',
                'medium_category_id' => '10',
                'big_category_id' => '5',
            ],
            [
                'ledger_id' => '9',
                'medium_category_id' => '10',
                'big_category_id' => '5',
            ],
            [
                'ledger_id' => '10',
                'medium_category_id' => '2',
                'big_category_id' => '2',
            ],
            [
                'ledger_id' => '11',
                'medium_category_id' => '2',
                'big_category_id' => '2',
            ],
            [
                //返答待ち
                'ledger_id' => '12',
                'medium_category_id' => "0",
                'big_category_id' => "0",
            ],
            [
                'ledger_id' => '13',
                'medium_category_id' => null,
                'big_category_id' => '1',
            ],
            [
                'ledger_id' => '14',
                'medium_category_id' => '7',
                'big_category_id' => '4',
            ],
            [
                'ledger_id' => '15',
                'medium_category_id' => '1',
                'big_category_id' => '2',
            ],
            [
                'ledger_id' => '16',
                'medium_category_id' => '5',
                'big_category_id' => '3',
            ],
            [
                'ledger_id' => '17',
                'medium_category_id' => '5',
                'big_category_id' => '3',
            ],
            [
                'ledger_id' => '18',
                'medium_category_id' => '13',
                'big_category_id' => '7',
            ],
            [
                'ledger_id' => '19',
                'medium_category_id' => '7',
                'big_category_id' => '4',
            ],
        ]);
    }
}
