<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PickupSituationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_pickup_situation')->truncate();
        DB::table('m_pickup_situation')->insert([
            [
                'id' => 1,
                'name' => '未対応',
            ],
            [
                'id' => 2,
                'name' => '対応中',
            ],
            [
                'id' => 3,
                'name' => '完了',
            ],
            [
                'id' => 4,
                'name' => '無効',
            ],
        ]);
    }
}
