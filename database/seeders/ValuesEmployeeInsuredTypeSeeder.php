<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeInsuredTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_insured_type')->insert([
            [
                'id' => '0',
                'name' => '該当なし', 
            ],
            [
                'id' => '1',
                'name' => '健保・厚年', 
            ],
            [
                'id' => '3',
                'name' => '船保任継', 
            ],
            [
                'id' => '4',
                'name' => '共済出向', 
            ],
        ]);
    }
}
