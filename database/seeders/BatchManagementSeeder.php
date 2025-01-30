<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BatchManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_batch_management')->truncate();
        DB::table('m_batch_management')->insert([
            [
                'id' => 1,
                'class' => 'PickupBatch',
                'command' => 'app:pick-up',
                'time_specification' => '4:00',
                'delete_flg' => 0,
            ]
        ]);
    }
}
