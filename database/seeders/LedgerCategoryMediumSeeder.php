<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LedgerCategoryMediumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_ledger_category_medium')->truncate();
        DB::table('m_ledger_category_medium')->insert([
            [
                'id' => '1',
                'medium_category_name' => '異動手続き関連',
                'big_category_id' => '2',
            ],
            [
                'id' => '2',
                'medium_category_name' => '高年齢雇用継続関連',
                'big_category_id' => '2',
            ],
            [
                'id' => '3',
                'medium_category_name' => '育児休業等関連',
                'big_category_id' => '2',
            ],
            [
                'id' => '4',
                'medium_category_name' => '賃金証明関連',
                'big_category_id' => '3',
            ],
            [
                'id' => '5',
                'medium_category_name' => '報酬変更関連',
                'big_category_id' => '3',
            ],
            [
                'id' => '6',
                'medium_category_name' => '月額変更関連',
                'big_category_id' => '3',
            ],
            [
                'id' => '7',
                'medium_category_name' => '退職手続き関連',
                'big_category_id' => '4',
            ],
            [
                'id' => '8',
                'medium_category_name' => '育児休業関連',
                'big_category_id' => '4',
            ],
            [
                'id' => '9',
                'medium_category_name' => '賞与関連',
                'big_category_id' => '4',
            ],
            [
                'id' => '10',
                'medium_category_name' => '育児休業給付関連',
                'big_category_id' => '5',
            ],
            [
                'id' => '11',
                'medium_category_name' => '産前産後休業関連',
                'big_category_id' => '5',
            ],
            [
                'id' => '12',
                'medium_category_name' => '事業所変更関連',
                'big_category_id' => '6',
            ],
            [
                'id' => '13',
                'medium_category_name' => '賞与関連',
                'big_category_id' => '7',
            ],
            [
                'id' => '14',
                'medium_category_name' => '算定基礎関連',
                'big_category_id' => '7',
            ],
            [
                'id' => '15',
                'medium_category_name' => '適用関連',
                'big_category_id' => '7',
            ],
            [
                'id' => '16',
                'medium_category_name' => '保険料関連',
                'big_category_id' => '8',
            ],
            [
                'id' => '17',
                'medium_category_name' => '年度更新関連',
                'big_category_id' => '8',
            ],
            [
                'id' => '18',
                'medium_category_name' => '保険関係成立関連',
                'big_category_id' => '9',
            ],
            [
                'id' => '19',
                'medium_category_name' => '任意加入関連',
                'big_category_id' => '9',
            ],
            [
                'id' => '20',
                'medium_category_name' => '年金関連',
                'big_category_id' => '10',
            ],
            [
                'id' => '21',
                'medium_category_name' => '還付・訂正関連',
                'big_category_id' => '10',
            ],
            [
                'id' => '22',
                'medium_category_name' => '事業所特別認可関連',
                'big_category_id' => '10',
            ],
            [
                'id' => '23',
                'medium_category_name' => '年度更新関連',
                'big_category_id' => '10',
            ],
            [
                'id' => '24',
                'medium_category_name' => '口座振替関連',
                'big_category_id' => '10',
            ],
        ]);
    }
}
