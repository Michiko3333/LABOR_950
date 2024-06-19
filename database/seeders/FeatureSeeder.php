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
            ]
        ]);
    }
}
