<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PickupSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_pickup_setting')->truncate();
        DB::table('m_pickup_setting')->insert([
            [
                'id' => 1,
                'company_id' => 0,
                'nursing_care_insurance_premium_deduction_begins' => 60,
                'application_for_attainment_wage_certificate' => 30,
                'end_of_nursing_care_insurance_premium_deduction' => 30,
                'loss_of_eligibility_for_employees_pension_insurance' => 30,
                'loss_of_health_insurance_status' => 30,
                'labor_insurance_annual_renewal_start' => '05-01',
                'labor_insurance_annual_renewal_end' => '07-10',
                'year_end_tax_adjustment_start' => '12-01',
                'year_end_tax_adjustment_end' => '01-31',
                'retirement_age' => 65,
                'retirement' => 365,
                'officers_ids' => null,
                'officers_birthday' => 1,
                'settlement_date' => 30,
                'start_of_closure' => 30,
                'end_of_closure' => 30,
                'change_in_dependent_status' => 5,
                'subsidies_and_grants' => 30,
                'report_on_the_status_of_elderly_and_disabled_people' => '06-01',
            ]
        ]);
    }
}
