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
        $this->call(ValuesCalendarEventCategoryTypeSeeder::class);
        $this->call(ValuesBranchLaborInsurancePaymentMethodSeeder::class);
        $this->call(PrefectureSeeder::class);
        $this->call(ValuesBranchBranchTypeSeeder::class);
        $this->call(ValuesCompanyListedTypeSeeder::class);
        $this->call(ValuesCompanyCompanyDivisionSeeder::class);
        $this->call(ValuesBranchPlaceTypeSeeder::class);
        $this->call(ValuesBranchStartDaysOfWeekSeeder::class);
        $this->call(ValuesBranchWorkStyleTypeSeeder::class);
        $this->call(ValuesShareholderShareholderTypeSeeder::class);
        $this->call(ValuesEmployeeSexSeeder::class);
        $this->call(ValuesEmployeeInsuredAgeTypeSeeder::class);
        $this->call(ValuesEmployeeLaborInsuranceTypeSeeder::class);
        $this->call(ValuesEmployeeEmploymentInsuranceTypeSeeder::class);
        $this->call(ValuesEmployeeEmployeeTypeSeeder::class);
        $this->call(ValuesEmployeeEmployeeStatusSeeder::class);
        $this->call(ValuesEmployeeEmploymentRouteSeeder::class);
        $this->call(ValuesEmployeeInsuredReasonSeeder::class);
        $this->call(ValuesEmployeeEmploymentTypeSeeder::class);
        $this->call(ValuesEmployeeEmploymentStatusSeeder::class);
        $this->call(ValuesEmployeeEmployerTypeSeeder::class);
        $this->call(ValuesEmployeeOccupationTypeSeeder::class);
        $this->call(ValuesCompanyBusinessTypeSeeder::class);
        $this->call(ValuesDependentApplicableReasonTypeSeeder::class);
    }
}
