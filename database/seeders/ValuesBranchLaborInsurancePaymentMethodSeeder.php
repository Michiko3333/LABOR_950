<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesBranchLaborInsurancePaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_branch_labor_insurance_payment_method')->insert([
            ['name' => '口座振替'],
            ['name' => '窓口納付']
        ]);
    }
}
