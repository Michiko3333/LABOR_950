<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\SeniorEmploymentContinuationBenefitClaimFormRequest;
use App\EgovAPI\MixXmlEgovSigner;
use App\Models\CurrentUser;
use App\Models\Certificate;

class ContinuousEmploymentBenefitsForOlderWorkersController extends Controller
{
    public function index(Request $request)
    {
        if (!$this->isSelectedCompany()) {
            return redirect()->route('home.select');
        }

        $company = CurrentUser::currentCompany();
        $companyId = $company->id;
        $certificate = Certificate::where('company_id', $companyId)
            ->where('delete_flg', 0)
            ->first();
        if($certificate !== null) {
            $certificate = true;
        } else {
            $certificate = false;
        }
        $current_employee = CurrentUser::info();

        $japanEra = '令和';
        $year = date("Y");
        $japanEraYear = $year - 2018;
        $month = ltrim(date("m"), '0');
        $day = ltrim(date("d"), '0');
        $todaySet = array(
            "japanEra" => $japanEra,
            "japanEraYear" => $japanEraYear,
            "year" => $year,
            "month" => $month,
            "day" => $day
        );
        return view('ledger.continuous_employment_benefits_for_older_workers', [
            'company' => $company,
            'todaySet' => $todaySet,
            'certificate' => $certificate,
            'current_employee' => $current_employee,
        ]);
    }

    public function post(SeniorEmploymentContinuationBenefitClaimFormRequest $request)
    {
        try {
            $data = [
                'labor_consultant_acting_as_agent' => $request->input('labor_consultant_acting_as_agent'),
                'labor_consultant_name' => $request->input('labor_consultant_name'),
                'ledger_type' => $request->input('ledger_type'),
                'employment_insured_no_4digit' => $request->input('employment_insured_no_4digit'),
                'employment_insured_no_6digit' => $request->input('employment_insured_no_6digit'),
                'employment_insured_no_CD' => $request->input('employment_insured_no_CD'),
                'qualifications_japan_era_year' => $request->input('qualifications_japan_era_year'),
                'qualifications_month' => $request->input('qualifications_month'),
                'qualifications_day' => $request->input('qualifications_day'),
                'fullname' => $request->input('fullname'),
                'payer_japan_era_year1' => $request->input('payer_japan_era_year1'),
                'payer_month1' => $request->input('payer_month1'),
                'wages_paid1' => $request->input('wages_paid1'),
                'wage_reduction_days1' => $request->input('wage_reduction_days1'),
                'payer_japan_era_year2' => $request->input('payer_japan_era_year2'),
                'payer_month2' => $request->input('payer_month2'),
                'wages_paid2' => $request->input('wages_paid2'),
                'wage_reduction_days2' => $request->input('wage_reduction_days2'),
                'payer_japan_era_year3' => $request->input('payer_japan_era_year3'),
                'payer_month3' => $request->input('payer_month3'),
                'wages_paid3' => $request->input('wages_paid3'),
                'wage_reduction_days3' => $request->input('wage_reduction_days3'),
                'note' => $request->input('note'),
                'jurisdiction' => $request->input('jurisdiction'),
                'employment_insurance_office_no_4digit' => $request->input('employment_insurance_office_no_4digit'),
                'employment_insurance_office_no_6digit' => $request->input('employment_insurance_office_no_6digit'),
                'employment_insurance_office_no_CD' => $request->input('employment_insurance_office_no_CD'),
                'special_note_on_wages1' => $request->input('special_note_on_wages1'),
                'special_note_on_wages2' => $request->input('special_note_on_wages2'),
                'special_note_on_wages3' => $request->input('special_note_on_wages3'),
                'today_japan_era_year' => $request->input('today_japan_era_year'),
                'today_japan_era_month' => $request->input('today_japan_era_month,_'),
                'today_japan_era_day' => $request->input('today_japan_era_day'),
                'destination' => $request->input('destination'),
                'employer_name' => $request->input('employer_name'),
                'headquarters_address' => $request->input('headquarters_address'),
                'labor_consultant_tel_area_code' => $request->input('labor_consultant_tel_area_code'),
                'labor_consultant_tel_city_code' => $request->input('labor_consultant_tel_city_code'),
                'labor_consultant_tel_subscriber_code' => $request->input('labor_consultant_tel_subscriber_code'),
                'benefits_types' => $request->input('benefits_types'),
                'fullname_kana' => $request->input('fullname_kana'),
                'wage_deadline' => $request->input('wage_deadline'),
                'wage_payment_day' => $request->input('wage_payment_day'),
                'wage_payment' => $request->input('wage_payment'),
                'wage_structure_other' => $request->input('wage_structure_other'),
                'wage_structure' => $request->input('wage_structure'),
                'prescribed_working_days1' => $request->input('prescribed_working_days1'),
                'prescribed_working_days2' => $request->input('prescribed_working_days2'),
                'prescribed_working_days3' => $request->input('prescribed_working_days3'),
                'commuting_allowance' => $request->input('commuting_allowance'),
                'commuting_allowance_period' => $request->input('commuting_allowance_period'),
                'commuting_allowance_period_other' => $request->input('commuting_allowance_period_other'),
                'branch_tel_area_code' => $request->input('branch_tel_area_code'),
                'branch_tel_city_code' => $request->input('branch_tel_city_code'),
                'branch_tel_subscriber_code' => $request->input('branch_tel_subscriber_code'),
                'payer_japan_era1' => $request->input('payer_japan_era1'),
                'payer_japan_era2' => $request->input('payer_japan_era2'),
                'payer_japan_era3' => $request->input('payer_japan_era3'),
                'today_japan_era' => $request->input('today_japan_era'),
            ];
            $XML = new MixXmlEgovSigner($request);
            $response = $XML->run($request);            
            if ( $response[0] == false ){
                $errorMessage = $response[1];
                return redirect()->back()->withErrors($errorMessage)->withInput();
            }
            return view('admin.companies', ['send_data' => $data]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
