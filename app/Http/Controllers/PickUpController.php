<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PickUpRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Permission;
use App\Models\CurrentUser;
use App\Models\Employee;
use App\Models\Pickup_setting;

class PickUpController extends Controller
{
    public function index()
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(15) || !$userPermission->isBasicDepartment() || $userPermission->getEmployeeStatus() == 1) {
            return redirect()->route('home.index');
        }

        return view('pickup.pickup');
    }

    public function setting()
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(13) || !$userPermission->isBasicDepartment() || $userPermission->getEmployeeStatus() == 1) {
            return redirect()->route('home.index');
        }

        $current_company = CurrentUser::currentCompany();
        $pickupSetting = Pickup_setting::where('company_id', $current_company->id)->first();

        $officers_names = [];
        if($pickupSetting) {
            $officers_ids = $pickupSetting->officers_ids;
            $officers = explode(',', $officers_ids);

            if($officers) {
                $officers_names = Employee::whereIn('id', $officers)
                    ->where('delete_flg', 0)
                    ->get(['last_name', 'first_name'])
                    ->map(fn($employee) => $employee->last_name . ' ' . $employee->first_name)
                    ->values()
                    ->toArray();
            }
        }

        $labor_insurance_annual_renewal_start = $pickupSetting->labor_insurance_annual_renewal_start ?? '';
        if(!empty($labor_insurance_annual_renewal_start)) {
            list($labor_insurance_annual_renewal_start_month, $labor_insurance_annual_renewal_start_day) = explode('-', $labor_insurance_annual_renewal_start);
            $labor_insurance_annual_renewal_start_month = ltrim($labor_insurance_annual_renewal_start_month, '0');
            $labor_insurance_annual_renewal_start_day = ltrim($labor_insurance_annual_renewal_start_day, '0');
        }

        $labor_insurance_annual_renewal_end = $pickupSetting->labor_insurance_annual_renewal_end ?? '';
        if (!empty($labor_insurance_annual_renewal_end)) {
            list($labor_insurance_annual_renewal_end_month, $labor_insurance_annual_renewal_end_day) = explode('-', $labor_insurance_annual_renewal_end);
            $labor_insurance_annual_renewal_end_month = ltrim($labor_insurance_annual_renewal_end_month, '0');
            $labor_insurance_annual_renewal_end_day = ltrim($labor_insurance_annual_renewal_end_day, '0');
        }

        $year_end_tax_adjustment_start = $pickupSetting->year_end_tax_adjustment_start ?? '';
        if (!empty($year_end_tax_adjustment_start)) {
            list($year_end_tax_adjustment_start_month, $year_end_tax_adjustment_start_day) = explode('-', $year_end_tax_adjustment_start);
            $year_end_tax_adjustment_start_month = ltrim($year_end_tax_adjustment_start_month, '0');
            $year_end_tax_adjustment_start_day = ltrim($year_end_tax_adjustment_start_day, '0');
        }

        $year_end_tax_adjustment_end = $pickupSetting->year_end_tax_adjustment_end ?? '';
        if (!empty($year_end_tax_adjustment_end)) {
            list($year_end_tax_adjustment_end_month, $year_end_tax_adjustment_end_day) = explode('-', $year_end_tax_adjustment_end);
            $year_end_tax_adjustment_end_month = ltrim($year_end_tax_adjustment_end_month, '0');
            $year_end_tax_adjustment_end_day = ltrim($year_end_tax_adjustment_end_day, '0');
        }

        $report_on_the_status_of_elderly_and_disabled_people = $pickupSetting->report_on_the_status_of_elderly_and_disabled_people ?? '';
        if (!empty($report_on_the_status_of_elderly_and_disabled_people)) {
            list($report_on_the_status_of_elderly_and_disabled_people_month, $report_on_the_status_of_elderly_and_disabled_people_day) = explode('-', $report_on_the_status_of_elderly_and_disabled_people);
            $report_on_the_status_of_elderly_and_disabled_people_month = ltrim($report_on_the_status_of_elderly_and_disabled_people_month, '0');
            $report_on_the_status_of_elderly_and_disabled_people_day = ltrim($report_on_the_status_of_elderly_and_disabled_people_day, '0');
        }

        return view('pickup.setting', [
            'officers' => $officers ?? [],
            'officers_names' => $officers_names ?? [],
            'pickupSetting' => $pickupSetting,
            'labor_insurance_annual_renewal_start_month' => $labor_insurance_annual_renewal_start_month ?? '',
            'labor_insurance_annual_renewal_start_day' => $labor_insurance_annual_renewal_start_day ?? '',
            'labor_insurance_annual_renewal_end_month' => $labor_insurance_annual_renewal_end_month ?? '',
            'labor_insurance_annual_renewal_end_day' => $labor_insurance_annual_renewal_end_day ?? '',
            'year_end_tax_adjustment_start_month' => $year_end_tax_adjustment_start_month ?? '',
            'year_end_tax_adjustment_start_day' => $year_end_tax_adjustment_start_day ?? '',
            'year_end_tax_adjustment_end_month' => $year_end_tax_adjustment_end_month ?? '',
            'year_end_tax_adjustment_end_day' => $year_end_tax_adjustment_end_day ?? '',
            'report_on_the_status_of_elderly_and_disabled_people_month' => $report_on_the_status_of_elderly_and_disabled_people_month ?? '',
            'report_on_the_status_of_elderly_and_disabled_people_day' => $report_on_the_status_of_elderly_and_disabled_people_day ?? '',
        ]);
    }

    public function pick_up_setting(PickUpRequest $request)
    {
        DB::beginTransaction();

        try {
            $current_company = CurrentUser::currentCompany();
            $current_company_id = $current_company->id;

            $pickupSetting = Pickup_setting::where('company_id', $current_company_id)->first();

            $labor_insurance_annual_renewal_start = sprintf(
                '%02d-%02d',
                $request->input('labor_insurance_annual_renewal_start_month'),
                $request->input('labor_insurance_annual_renewal_start_day')
            );

            $year_end_tax_adjustment_start = sprintf(
                '%02d-%02d',
                $request->input('year_end_tax_adjustment_start_month'),
                $request->input('year_end_tax_adjustment_start_day')
            );

            $year_end_tax_adjustment_end = sprintf(
                '%02d-%02d',
                $request->input('year_end_tax_adjustment_end_month'),
                $request->input('year_end_tax_adjustment_end_day')
            );

            $report_on_the_status_of_elderly_and_disabled_people = sprintf(
                '%02d-%02d',
                $request->input('report_on_the_status_of_elderly_and_disabled_people_month'),
                $request->input('report_on_the_status_of_elderly_and_disabled_people_day')
            );

            $officers = $request->input('officers');
            $officersString = is_array($officers) ? implode(',', $officers) : '';

            if(!isset($pickupSetting)) {
                Pickup_setting::create([
                    'company_id' => $current_company_id,
                    'nursing_care_insurance_premium_deduction_begins' => $request->input('nursing_care_insurance_premium_deduction_begins'),
                    'application_for_attainment_wage_certificate' => $request->input('application_for_attainment_wage_certificate'),
                    'end_of_nursing_care_insurance_premium_deduction' => $request->input('end_of_nursing_care_insurance_premium_deduction'),
                    'loss_of_eligibility_for_employees_pension_insurance' => $request->input('loss_of_eligibility_for_employees_pension_insurance'),
                    'loss_of_health_insurance_status' => $request->input('loss_of_health_insurance_status'),
                    'labor_insurance_annual_renewal_start' => $labor_insurance_annual_renewal_start,
                    'year_end_tax_adjustment_start' => $year_end_tax_adjustment_start,
                    'year_end_tax_adjustment_end' => $year_end_tax_adjustment_end,
                    'retirement_age' => $request->input('retirement_age'),
                    'retirement' => $request->input('retirement'),
                    'officers_ids' => $officersString,
                    'officers_birthday' => $request->input('officers_birthday'),
                    'settlement_date' => $request->input('settlement_date'),
                    'start_of_closure' => $request->input('start_of_closure'),
                    'end_of_closure' => $request->input('end_of_closure'),
                    'change_in_dependent_status' => $request->input('change_in_dependent_status'),
                    'subsidies_and_grants' => $request->input('subsidies_and_grants'),
                    'report_on_the_status_of_elderly_and_disabled_people' => $report_on_the_status_of_elderly_and_disabled_people,
                    'bonus_payment_notice' => $request->input('bonus_payment_notice'),
                ]);
            } else {
                $pickupSetting->update([
                    'company_id' => $current_company_id,
                    'nursing_care_insurance_premium_deduction_begins' => $request->input('nursing_care_insurance_premium_deduction_begins'),
                    'application_for_attainment_wage_certificate' => $request->input('application_for_attainment_wage_certificate'),
                    'end_of_nursing_care_insurance_premium_deduction' => $request->input('end_of_nursing_care_insurance_premium_deduction'),
                    'loss_of_eligibility_for_employees_pension_insurance' => $request->input('loss_of_eligibility_for_employees_pension_insurance'),
                    'loss_of_health_insurance_status' => $request->input('loss_of_health_insurance_status'),
                    'labor_insurance_annual_renewal_start' => $labor_insurance_annual_renewal_start,
                    'year_end_tax_adjustment_start' => $year_end_tax_adjustment_start,
                    'year_end_tax_adjustment_end' => $year_end_tax_adjustment_end,
                    'retirement_age' => $request->input('retirement_age'),
                    'retirement' => $request->input('retirement'),
                    'officers_ids' => $officersString,
                    'officers_birthday' => $request->input('officers_birthday'),
                    'settlement_date' => $request->input('settlement_date'),
                    'start_of_closure' => $request->input('start_of_closure'),
                    'end_of_closure' => $request->input('end_of_closure'),
                    'change_in_dependent_status' => $request->input('change_in_dependent_status'),
                    'subsidies_and_grants' => $request->input('subsidies_and_grants'),
                    'report_on_the_status_of_elderly_and_disabled_people' => $report_on_the_status_of_elderly_and_disabled_people,
                    'bonus_payment_notice' => $request->input('bonus_payment_notice'),
                ]);
            }

            DB::commit();
            $this->putSuccess();
            return redirect()->route('pickup.setting');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function get_officers()
    {
        $current_company = CurrentUser::currentCompany();

        $officers = Employee::join('m_branch', 'm_employee.branch_id', '=', 'm_branch.id')
            ->join('m_company', 'm_branch.company_id', '=', 'm_company.id')
            ->select('m_employee.id', 'm_employee.last_name', 'm_employee.first_name')
            ->where('m_company.id', $current_company->id)
            ->where('m_employee.employee_type', '<=', '4')
            ->get();

        return response()->json($officers);
    }
}
