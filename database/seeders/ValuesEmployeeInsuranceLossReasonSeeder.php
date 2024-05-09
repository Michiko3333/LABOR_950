<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesEmployeeInsuranceLossReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_employee_insurance_loss_reason')->insert([
            ['name' => '離職以外の理由'],
            ['name' => '3以外の離職'],
            ['name' => '事業主の都合による離職'],
        ]);
    }
}
