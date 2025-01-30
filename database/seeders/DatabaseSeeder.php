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
        $this->call(ValuesSexSeeder::class);
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
        $this->call(ValuesDependentRelationshipSeeder::class);
        $this->call(ValuesDependentRelationshipSexSeeder::class);
        $this->call(ValuesDependentCaredFamilyMemberRelationshipSeeder::class);
        $this->call(ValuesDependentLivingTypeSeeder::class);
        $this->call(ValuesDependentTelTypeSeeder::class);
        $this->call(ValuesDependentDependentReasonTypeSeeder::class);
        $this->call(ValuesDependentDependentRemoveReasonTypeSeeder::class);
        $this->call(ValuesDependentCategory3InsuredOccupationTypeSeeder::class);
        $this->call(ValuesDependentDependentOccupationTypeSeeder::class);
        $this->call(ValuesDependentApplicableReasonTypeSeeder::class);
        $this->call(ValuesDependentNonApplicableReasonTypeSeeder::class);
        $this->call(ValuesEmployeeOverRetiredInsuranceLossReasonSeeder::class);
        $this->call(CompanyTypeSeeder::class);
        $this->call(SocietyManagedHealthInsuranceSeeder::class);
        $this->call(SocietyInsuranceOfficeSeeder::class);
        $this->call(TaxOfficeSeeder::class);
        $this->call(HealthInsuranceAssociationSeeder::class);
        $this->call(IndustryTypeSeeder::class);
        $this->call(ValuesDependentCaredFamilyMemberRelationshipSeeder::class);
        $this->call(ValuesEmployeeInsuranceLossReasonSeeder::class);
        $this->call(ValuesEmployeeSalaryPaymentSystemSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(PensionOfficeSeeder::class);
        $this->call(LaborSupervisionSeeder::class);
        $this->call(LaborBureauSeeder::class);
        $this->call(HelloWorkSeeder::class);
        $this->call(ValuesEmployeeInsuredTypeSeeder::class);
        $this->call(ValuesEmployeeChildcareReacquisitionReasonSeeder::class);
        $this->call(LegalAffairsBureauSeeder::class);
        $this->call(CompensationApplicableIndustrySeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(ResidentialStatusSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(LedgerSeeder::class);
        $this->call(ApplicationFormSeeder::class);
        $this->call(DepartmentPermissionSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(FilterEmployeeListSeeder::class);
        $this->call(wageColumnSeeder::class);
        $this->call(ValuesEmployeeWorkCategorySeeder::class);
        $this->call(ValuesEmployeeEnrollmentCategorySeeder::class);
        $this->call(ValuesEmployeeRecruitmentCategoryDetailSeeder::class);
        $this->call(ValuesEmployeePayTypeSeeder::class);
        $this->call(LedgerCategorySeeder::class);
        $this->call(LedgerCategoryBigSeeder::class);
        $this->call(LedgerCategoryMediumSeeder::class);
        $this->call(PickupTypeSeeder::class);
        $this->call(PickupMessageSeeder::class);
        $this->call(PickupSituationSeeder::class);
        $this->call(BatchManagementSeeder::class);
        $this->call(wageColumnSeeder::class);
        $this->call(AttendanceColumnsSeeder::class);
        $this->call(EmployeeColumnsSeeder::class);
    }
}
