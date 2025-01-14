<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_feature')->truncate();
        DB::table('m_feature')->insert([
            [
                'id' => '1',
                'name' => '会社基本情報',
            ],
            [
                'id' => '2',
                'name' => '支店・営業所',
            ],
            [
                'id' => '3',
                'name' => '組織・部署マスタ',
            ],
            [
                'id' => '4',
                'name' => '役職マスタ',
            ],
            [
                'id' => '5',
                'name' => '社員一覧',
            ],
            [
                'id' => '6',
                'name' => '社員詳細',
            ],
            [
                'id' => '7',
                'name' => '労働条件通知契約書',
            ],
            [
                'id' => '8',
                'name' => '帳票一覧',
            ],
            [
                'id' => '9',
                'name' => '申請案件一覧',
            ],
            [
                'id' => '10',
                'name' => 'e-Gov連携',
            ],
            [
                'id' => '11',
                'name' => 'カレンダー',
            ],
            [
                'id' => '12',
                'name' => '年間勤務予定表',
            ],
            [
                'id' => '13',
                'name' => 'pickup設定',
            ],
            [
                'id' => '14',
                'name' => '休業情報',
            ],
            [
                'id' => '15',
                'name' => 'pickupリスト',
            ],
            [
                'id' => '16',
                'name' => '資格マスタ',
            ],
            [
                'id' => '17',
                'name' => '賃金情報',
            ],
            [
                'id' => '18',
                'name' => '賃金台帳',
            ],
            [
                'id' => '19',
                'name' => '勤怠情報',
            ],
        ]);
    }
}
