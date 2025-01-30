<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PickupTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_pickup_type')->truncate();
        DB::table('m_pickup_type')->insert([
            [
                'id' => '1',
                'name' => '介護保険料の控除開始',
                'pickup_message_id' => 1,
            ],
            [
                'id' => '2',
                'name' => '到達賃金証明書の申請',
                'pickup_message_id' => 1,
            ],
            [
                'id' => '3',
                'name' => '介護保険料の控除終了',
                'pickup_message_id' => 1,
            ],
            [
                'id' => '4',
                'name' => '厚生年金保険被保険者の資格喪失',
                'pickup_message_id' => 1,
            ],
            [
                'id' => '5',
                'name' => '健康保険被保険者の資格喪失',
                'pickup_message_id' => 1,
            ],
            [
                'id' => '6',
                'name' => '労働保険年度更新',
                'pickup_message_id' => 2,
            ],
            [
                'id' => '7',
                'name' => '年末調整',
                'pickup_message_id' => 3,
            ],
            [
                'id' => '8',
                'name' => '定年退職',
                'pickup_message_id' => 1,
            ],
            [
                'id' => '9',
                'name' => '役員の誕生日',
                'pickup_message_id' => 4,
            ],
            [
                'id' => '10',
                'name' => '決算日',
                'pickup_message_id' => 5,
            ],
            [
                'id' => '11',
                'name' => '休職開始',
                'pickup_message_id' => 6,
            ],
            [
                'id' => '12',
                'name' => '休職終了',
                'pickup_message_id' => 6,
            ],
            [
                'id' => '13',
                'name' => '休業開始',
                'pickup_message_id' => 6,
            ],
            [
                'id' => '14',
                'name' => '休業終了',
                'pickup_message_id' => 6,
            ],
            [
                'id' => '15',
                'name' => '扶養変更',
                'pickup_message_id' => 7,
            ],
            [
                'id' => '16',
                'name' => '助成金・補助金等',
                'pickup_message_id' => 8,
            ],
            [
                'id' => '17',
                'name' => '高齢者雇用状況報告書',
                'pickup_message_id' => 2,
            ],
            [
                'id' => '18',
                'name' => '障碍者状況報告書',
                'pickup_message_id' => 2,
            ],
            [
                'id' => '19',
                'name' => '高年齢雇用継続基本給付金',
                'pickup_message_id' => 9,
            ],
            [
                'id' => '20',
                'name' => '健康保険・厚生年金保険被保険者賞与支払届',
                'pickup_message_id' => 10,
            ],
            [
                'id' => '21',
                'name' => '雇用保険被保険者資格取得届',
                'pickup_message_id' => 11,
            ],
            [
                'id' => '22',
                'name' => '月額変更届',
                'pickup_message_id' => 12,
            ],
            [
                'id' => '23',
                'name' => '算定基礎届',
                'pickup_message_id' => 2,
            ],
            [
                'id' => '24',
                'name' => '雇用保険被保険者資格喪失届',
                'pickup_message_id' => 13,
            ],
            [
                'id' => '25',
                'name' => '定期健康診断結果報告書の提出',
                'pickup_message_id' => 14,
            ],
            [
                'id' => '26',
                'name' => 'ストレスチェックの実施と報告',
                'pickup_message_id' => 15,
            ],
        ]);
    }
}
