<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\HealthInsuranceEmployeePensionInsuranceBonusNonPaymentReportElectronicApplicationRequest;
use App\Models\Branch;
use App\Models\CurrentUser;
use App\Models\Certificate;
use App\EgovAPI\MixXmlEgovSigner;
use App\Permission;

class HealthInsuranceEmployeePensionInsuranceBonusNonPaymentReportElectronicApplicationController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission;
            if (!$userPermission->isSelectedCompany() || $userPermission->denyProcedure() || !$userPermission->isReadableFor(8) || !$userPermission->isWritableFor(8) || !$userPermission->isBasicDepartment()) {

                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

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
        if ($certificate !== null) {
            $certificate = true;
        } else {
            $certificate = false;
        }
        $current_employee = CurrentUser::info();
        $current_branch = Branch::where('id', $current_employee->branch_id)->first();

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
        $egovAcount = $this->egovAcount();
        $procedureName = $this->getProcedureName($request);

        return view('ledger.health_insurance_employee_pension_insurance_bonus_non_payment_report_electronic_application', [
            'company' => $company,
            'todaySet' => $todaySet,
            'certificate' => $certificate,
            'procedureName' => $procedureName,
            'egovAcount' => $egovAcount,
            'current_employee' => $current_employee,
            'current_branch' => $current_branch,
        ]);
    }

    public function post(HealthInsuranceEmployeePensionInsuranceBonusNonPaymentReportElectronicApplicationRequest $request)
    {
        $attachment = [];

        $data = $request->all();

        foreach ($data as $key => $value) {
            if (strpos($key, 'radio_') === 0) {
                $file_key = substr($key, strlen('radio_'));
                $label_key = 'label_' . $file_key;

                $attachment_type = ($value === '2') ? '添付' : '別送';

                $attached_document_name = $request->input($label_key);

                $attachment_file_name = '';
                if ($value === '2' && $request->hasFile($file_key)) {
                    $file = $request->file($file_key);
                    $attachment_file_name = $file->getClientOriginalName();
                }

                $attachment[] = [
                    'attachment_type' => $attachment_type,
                    'attached_document_name' => $attached_document_name,
                    'attachment_file_name' => $attachment_file_name,
                    'submission_info' => '1'
                ];
            }
        }

        if (!empty($attachment)) {
            $request->merge(['attachment' => $attachment]);
        }

        $radio_keys = ["radio_file_other"];

        foreach ($radio_keys as $key) {
            if (!$request->has($key)) {
                $request->merge([$key => 0]);
            }
        }

        try {
            $data = [
                'title_different_types_of_health_insurance' => $request->input('title_different_types_of_health_insurance'),
                'title_different_types_of_seafarers_insurance' => $request->input('title_different_types_of_seafarers_insurance'),
                'title_types_of_welfare_pension_insurance' => $request->input('title_types_of_welfare_pension_insurance'),
                'office_number_notification_number' => $request->input('office_number_notification_number'),
                'labor_consultant_name' => $request->input('labor_consultant_name'),
                'business_location_ship_owner_address' => $request->input('business_location_ship_owner_address'),
                'business_name_name_of_ship_owner' => $request->input('business_name_name_of_ship_owner'),
                'business_owner_name_representative_name' => $request->input('business_owner_name_representative_name'),
                'changed_bonus_payment_schedule_month1' => $request->input('changed_bonus_payment_schedule_month1'),
                'changed_bonus_payment_schedule_month2' => $request->input('changed_bonus_payment_schedule_month2'),
                'changed_bonus_payment_schedule_month3' => $request->input('changed_bonus_payment_schedule_month3'),
                'changed_bonus_payment_schedule_month4' => $request->input('changed_bonus_payment_schedule_month4'),
                'post_code_former' => $request->input('post_code_former'),
                'post_code_latter' => $request->input('post_code_latter'),
                'branch_tel_area_code' => $request->input('branch_tel_area_code'),
                'branch_tel_city_code' => $request->input('branch_tel_city_code'),
                'branch_tel_subscriber_code' => $request->input('branch_tel_subscriber_code'),
                'today_japan_era_year' => $request->input('today_japan_era_year'),
                'today_japan_era_month' => $request->input('today_japan_era_month'),
                'today_japan_era_day' => $request->input('today_japan_era_day'),
                'scheduled_year_of_bonus_payment' => $request->input('scheduled_year_of_bonus_payment'),
                'scheduled_month_of_bonus_payment' => $request->input('scheduled_month_of_bonus_payment'),
                'office_reference_symbol_office_symbol' => $request->input('office_reference_symbol_office_symbol'),
                'office_arrangement_code_county_city_ward_code' => $request->input('office_arrangement_code_county_city_ward_code'),
                'business_establishment_code_prefecture_code' => $request->input('business_establishment_code_prefecture_code'),
                'ship_owner_reference_code_ship_insurance_office_abbreviation_name' => $request->input('ship_owner_reference_code_ship_insurance_office_abbreviation_name'),
                'ship_owner_arrangement_symbol_symbol' => $request->input('ship_owner_arrangement_symbol_symbol'),
                'bonus_name' => $request->input('bonus_name'),
                'era_name' => $request->input('era_name'),
                'payment_status' => $request->input('payment_status'),

            ];
            $XML = new MixXmlEgovSigner($request);
            $response = $XML->run($request, True);
            if ($response[0] == false) {
                $errorMessage = $response[1];
                return redirect()->back()->withErrors($errorMessage)->withInput();
            }
            $this->putSuccess("送信に成功しました");
            return redirect()->route('ledger.index');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
