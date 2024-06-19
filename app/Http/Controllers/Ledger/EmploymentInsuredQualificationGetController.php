<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmploymentInsuredQualificationGetRequest;
use App\Models\Branch;
use App\Models\CurrentUser;
use App\Models\Country;
use App\Models\Residential_status;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use App\EgovAPI\MixXmlEgovSigner;
use App\Permission;

class EmploymentInsuredQualificationGetController extends Controller
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
        $current_branch_id = $current_employee->branch_id;
        $current_branch = Branch::where('id', $current_branch_id)->first();
        $convertToday = $this->convertWesternCalendarToJapaneseCalendar(Carbon::today());
        $today = [
            'era' => $convertToday['japanese_calendar_era_string'],
            'year' => $convertToday['japanese_calendar_result']->year,
            'month' => $convertToday['japanese_calendar_result']->month,
            'date' => $convertToday['japanese_calendar_result']->day,
        ];

        $countries = Country::all();
        $residentials = Residential_status::all();
        $egovAcount = $this->egovAcount();
        $procedureName = $this->getProcedureName($request);

        return view('ledger.employment_insured_qualification_get', [
            'company' => $company,
            'current_employee' => $current_employee,
            'current_branch' => $current_branch,
            'today' => $today,
            'countries' => $countries,
            'residentials' => $residentials,
            'certificate' => $certificate,
            'egovAcount' => $egovAcount,
            'procedureName' => $procedureName
        ]);
    }

    public function post(EmploymentInsuredQualificationGetRequest $request)
    {
        $attachment = [];

        $data = $request->all();

        foreach ($data as $key => $value) {
            if (strpos($key, 'radio_') === 0) {
                $file_key = substr($key, strlen('radio_'));
                $label_key = ($file_key === 'file_other') ? 'input_file_other' : 'label_' . $file_key;

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
                'mynumber_card_no' => $request->input('mynumber_card_no'),
                'employment_insured_no_4' => $request->input('employment_insured_no_4'),
                'employment_insured_no_6' => $request->input('employment_insured_no_6'),
                'employment_insured_no_CD' => $request->input('employment_insured_no_CD'),
                'acquisition' => $request->input('acquisition'),
                'name' => $request->input('name'),
                'name_kana' => $request->input('name_kana'),
                'new_name' => $request->input('new_name'),
                'new_name_kana' => $request->input('new_name_kana'),
                'sex' => $request->input('sex'),
                'birthday_era' => $request->input('birthday_era'),
                'birthday_year' => $request->input('birthday_year'),
                'birthday_month' => $request->input('birthday_month'),
                'birthday_day' => $request->input('birthday_day'),
                'insurance_office_no_4' => $request->input('insurance_office_no_4'),
                'insurance_office_no_6' => $request->input('insurance_office_no_6'),
                'insurance_office_no_CD' => $request->input('insurance_office_no_CD'),
                'insured_reason' => $request->input('insured_reason'),
                'salary_payment_system' => $request->input('salary_payment_system'),
                'salary_amonut' => $request->input('salary_amonut'),
                'insured_date_era' => $request->input('insured_date_era'),
                'insured_date_year' => $request->input('insured_date_year'),
                'insured_date_month' => $request->input('insured_date_month'),
                'insured_date_day' => $request->input('insured_date_day'),
                'employment_status' => $request->input('employment_status'),
                'occupation_type' => $request->input('occupation_type'),
                'employment_route' => $request->input('employment_route'),
                'agreed_hours_week_hour' => $request->input('agreed_hours_week_hour'),
                'agreed_hours_week_minute' => $request->input('agreed_hours_week_minute'),
                'contract_period_flg' => $request->input('contract_period_flg'),
                'contract_start_era' => $request->input('contract_start_era'),
                'contract_start_year' => $request->input('contract_start_year'),
                'contract_start_month' => $request->input('contract_start_month'),
                'contract_start_day' => $request->input('contract_start_day'),
                'contract_end_era' => $request->input('contract_end_era'),
                'contract_end_year' => $request->input('contract_end_year'),
                'contract_end_month' => $request->input('contract_end_month'),
                'contract_end_day' => $request->input('contract_end_day'),
                'contract_renewal_flg' => $request->input('contract_renewal_flg'),
                'branch_name' => $request->input('branch_name'),
                'insured_reason_detail' => $request->input('insured_reason_detail'),
                'first_alphabet' => $request->input('first_alphabet'),
                'residence_card_no' => $request->input('residence_card_no'),
                'stay_date_period_year' => $request->input('stay_date_period_year'),
                'stay_date_period_month' => $request->input('stay_date_period_month'),
                'stay_date_period_day' => $request->input('stay_date_period_day'),
                'unauthorized_activities_permission_flg' => $request->input('unauthorized_activities_permission_flg'),
                'employment_type' => $request->input('employment_type'),
                'country' => $request->input('country'),
                'residential_status' => $request->input('residential_status'),
                'residential_status_unknown_reason' => $request->input('residential_status_unknown_reason'),
                'headquarters_address' => $request->input('headquarters_address'),
                'headquarters_tel_area_code' => $request->input('headquarters_tel_area_code'),
                'headquarters_tel_city_code' => $request->input('headquarters_tel_city_code'),
                'headquarters_tel_subscriber_code' => $request->input('headquarters_tel_city_code'),
                'employer_company_managerial_position_name' => $request->input('employer_company_managerial_position_name'),
                'hello_work_name' => $request->input('destination'),
                'notification_era' => $request->input('notification_era'),
                'notification_year' => $request->input('notification_year'),
                'notification_month' => $request->input('notification_month'),
                'notification_day' => $request->input('notification_day'),
                'create_era' => $request->input('create_era'),
                'create_year' => $request->input('create_year'),
                'create_month' => $request->input('create_month'),
                'create_day' => $request->input('create_day'),
                'agent_name' => $request->input('agent_name'),
                'labor_consultant_name' => $request->input('labor_consultant_name'),
                'labor_consultant_tel_treacode' => $request->input('labor_consultant_tel_treacode'),
                'labor_consultant_tel_city_code' => $request->input('labor_consultant_tel_city_code'),
                'labor_consultant_tel_subscriber_code' => $request->input('labor_consultant_tel_subscriber_code'),
                'memo' => $request->input('memo'),
                'apply_to_code' => $request->input('apply_to_code'),
                'apply_to_name' => $request->input('apply_to_name')
            ];
            $XML = new MixXmlEgovSigner($request);
            $response = $XML->run($request);
            if ($response[0] == false) {
                $errorMessage = $response[1];
                \Log::error(print_r($response, true));
                return redirect()->back()->withErrors($errorMessage)->withInput();
            }
            $this->putSuccess("送信に成功しました");
            return redirect()->route('ledger.index');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
