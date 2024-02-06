<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_branch_labor_insurance_payment_method;

class ValuesBranchLaborInsurancePaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_branch_labor_insurance_payment_method = Values_branch_labor_insurance_payment_method::create([
            'name' => '口座振替', 
        ]);

        $values_branch_labor_insurance_payment_method = Values_branch_labor_insurance_payment_method::create([
            'name' => '窓口納付   （窓口の場合納付期限が異なる。直接納付は2週間も納付が早い）', 
        ]);

    }
}
