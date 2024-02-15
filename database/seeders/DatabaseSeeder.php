<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ValuesCalendarEventCategoryTypeSeeder::class，
            ValuesBranchLaborInsurancePaymentMethodSeeder::class，
            PrefectureSeeder::class，
            ValuesBranchBranchTypeSeeder::class，
            ValuesCompanyListedTypeSeeder::class，
            ValuesCompanyCompanyDivisionSeeder::class，
            ValuesBranchPlaceTypeSeeder::class，
            ValuesBranchStartDaysOfWeekSeeder::class，
            ValuesBranchWorkStyleTypeSeeder::class，
            ValuesShareholderShareholderTypeSeeder::class，
            ValuesEmployeeSexSeeder::class，
            ValuesEmployeeInsuredAgeTypeSeeder::class，            
            ValuesEmployeeLaborInsuranceTypeSeeder::class，
            ValuesEmployeeEmploymentInsuranceTypeSeeder::class，            
            ValuesEmployeeEmployeeTypeSeeder::class，
            ValuesEmployeeEmployeeStatusSeeder::class，
            ValuesEmployeeEmploymentRouteSeeder::class，
            ValuesEmployeeInsuredReasonSeeder::class，
            ValuesEmployeeEmploymentTypeSeeder::class，
            ValuesEmployeeEmploymentStatusSeeder::class，
        ]);    
    }
}
