<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEmployeeCreateRequest;
use App\Http\Requests\AdminEmployeeUpdateRequest;
use App\Http\Requests\AdminLaborCreateRequest;
use App\Http\Requests\AdminLaborUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CurrentUser;
use App\Models\Values_employee_employee_type;
use App\Models\Values_sex;
use App\Models\Prefecture;
use App\Models\Country;
use App\Models\Values_employee_employee_status;
use App\Models\Values_employee_labor_insurance_type;
use App\Models\Values_employee_employment_insurance_type;
use App\Models\Values_employee_insurance_loss_reason;
use App\Models\Values_employee_over_retired_insurance_loss_reason;
use App\Models\Values_employee_occupation_type;
use App\Models\Employee_department;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Managerial_position;
use App\Models\Residential_status;
use App\Models\User;
use App\Models\Dependent;
use App\Models\FilterEmployeeList;
use App\Models\UserFilterEmployeeList;
use App\Models\Values_employee_insured_age_type;
use App\Models\Pickup_setting;
use App\Models\Pickup;
use App\Models\Pickup_message;
use App\Models\Qualifications;
use App\Models\Employee_qualifications;
use App\Models\Branch;
use App\Models\Values_employee_work_category;
use App\Models\Values_employee_enrollment_category;
use App\Models\Values_employee_employment_route;
use App\Models\Values_employee_recruitment_category_detail;
use App\Models\Values_employee_employment_status;
use App\Models\Values_employee_pay_type;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Permission;

class EmployeeController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission();
            if (!$userPermission->isSelectedCompany() || $userPermission->getEmployeeStatus() == 1) {
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('Employee.information');
    }

    public function employee_list(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(5)) {
            return redirect()->route('home.index');
        }

        $currentUser = CurrentUser::info();
        $currentCompany = CurrentUser::CurrentCompany();
        $division = $currentCompany->company_division;

        $columnList = FilterEmployeeList::select('name', 'value', 'parent');

        if ($userPermission->isBasicDepartment()) {
            $columnList = $columnList->where('hidden_basic_department', 0);
        }

        $masterColumnList = $columnList->orderBy('order')->get()->toArray();
        $userDefaultList = [];
        $userList = UserFilterEmployeeList::select('value')->where('delete_flg', 0)->where('employee_id', $currentUser->id)->orderBy('order')->get()->pluck('value')->toArray();
        $isSetUserList = false;
        if (count($userList) > 0) {
            foreach ($userList as $key => $value) {
                $key = array_search($value, array_column($masterColumnList, 'value'));
                if ($key !== false) {
                    $userDefaultList[] = $masterColumnList[$key];
                }
            }
            $isSetUserList = true;
        } else {
            $defaultList = $columnList->where('hidden_default', 0)->orderBy('order')->get()->toArray();
            $userDefaultList = $defaultList;
        }

        return view('employee.employees', ['division' => $division, 'columnList' => $masterColumnList, 'defaultList' => $userDefaultList, 'isSetUserList' => $isSetUserList]);
    }

    public function closure_information_list(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(14)) {
            return redirect()->route('home.index');
        }

        $currentCompany = CurrentUser::CurrentCompany();
        $company_id = $currentCompany->id;

        $paginate = [
            'page' => $request->input('page', 1),
            'limit' => 20,
            'search' => $request->input('search'),
        ];

        return view('employee.closure_information', [
            'company_id' => $company_id,
        ]);
    }

    public function allowance_list(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(14)) {
            return redirect()->route('home.index');
        }

        $currentCompany = CurrentUser::CurrentCompany();
        $company_id = $currentCompany->id;
        $branch = Branch::where('company_id', $company_id)->get()->pluck('name', 'id')->toArray();

        $paginate = [
            'page' => $request->input('page', 1),
            'limit' => 20,
            'search' => $request->input('search'),
        ];

        return view('employee.allowance', [
            'company_id' => $company_id,
            'branch' => $branch,
        ]);
    }

    public function employee_update(Request $request, $id)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(6)) {
            return redirect()->route('home.index');
        }

        $employee = Employee::where('id', $id)->where('delete_flg', 0)->first();
        $branch = $employee->branch()->first();
        $company = $branch->company()->first();
        $currentCompany = CurrentUser::CurrentCompany();
        if ($company->id !== $currentCompany->id) {
            return abort(404);
        }

        $employee->company_name = $company->name;
        $employee->company_id = $company->id;
        $employee->branch_name = $branch->name;

        if (!empty($employee->company_id)) {
            $directory = 'photo/' . $employee->company_id;
            $files = Storage::files($directory);
            foreach ($files as $file) {
                $fileName = pathinfo($file, PATHINFO_FILENAME);
                if ((int)$fileName === $employee->id) {
                    $filePath = '/' . $file . '?v=' . time();
                }
            }
            if (!isset($filePath)) {
                $filePath = '/img/image.png';
            }
        }

        if ($employee && !empty($employee->fax)) {
            $faxParts = explode('-', $employee->fax);
        } else {
            $faxParts = ['', '', ''];
        }

        $employee_type = Values_employee_employee_type::pluck('name', 'id');
        $sex_type = Values_sex::pluck('name', 'id');
        $prefectures = Prefecture::pluck('name', 'id');
        $country_type = Country::pluck('country_name', 'id');
        $employee_status_type = Values_employee_employee_status::pluck('name', 'id');
        $labor_insurance_type = Values_employee_labor_insurance_type::pluck('name', 'id');
        $employment_insurance_type = Values_employee_employment_insurance_type::pluck('name', 'id');
        $insurance_loss_reason = Values_employee_insurance_loss_reason::pluck('name', 'id');
        $over_retired_insurance_loss_reason = Values_employee_over_retired_insurance_loss_reason::pluck('name', 'id');
        $occupation_type = Values_employee_occupation_type::pluck('name', 'option_no');
        $departments = Employee_department::where('employee_id', $id)->where('delete_flg', 0)->pluck('department_id');
        $departments_list = Department::select('id', 'name')->where('company_id', $company->id)->where('delete_flg', 0)->get();
        $managerial_position_list = Managerial_position::where('company_id', $company->id)->where('delete_flg', 0)->get();
        $residential_status = Residential_status::pluck('content', 'id');
        $employee_insured_age_type = Values_employee_insured_age_type::pluck('name', 'id');
        $dependent = $employee->dependent()->where('delete_flg', 0)->orderByRaw('spouse_flag DESC')->orderBy('history_flg', 'desc')->get();
        $qualifications = Qualifications::select('id', 'qualification_name')->where('company_id', $company->id)->where('delete_flg', 0)->get();
        $employee_qualifications = Employee_qualifications::join('m_qualifications', 'm_employee_qualifications.qualifications_id', '=', 'm_qualifications.id')
            ->where('m_employee_qualifications.employee_id', $employee->id)
            ->where('m_qualifications.delete_flg', 0)
            ->where('m_employee_qualifications.delete_flg', 0)
            ->pluck('m_qualifications.id');

        $work_category = Values_employee_work_category::pluck('name', 'id');
        $enrollment_category = Values_employee_enrollment_category::pluck('name', 'id');
        $employment_route = Values_employee_employment_route::pluck('name', 'id');
        $recruitment_category_detail = Values_employee_recruitment_category_detail::pluck('name', 'id');
        $employment_status = Values_employee_employment_status::pluck('name', 'id');
        $pay_type = Values_employee_pay_type::pluck('name', 'id');

        return view('employee.employee_create', [
            'filePath' => $filePath,
            'employee' => $employee,
            'departments' => $departments,
            'departments_list' => $departments_list,
            'managerial_position_list' => $managerial_position_list,
            'employee_id' => $id,
            'employee_type' => $employee_type,
            'sex_type' => $sex_type,
            'prefectures' => $prefectures,
            'country_type' => $country_type,
            'employee_status_type' => $employee_status_type,
            'labor_insurance_type' => $labor_insurance_type,
            'employment_insurance_type' => $employment_insurance_type,
            'insurance_loss_reason' => $insurance_loss_reason,
            'over_retired_insurance_loss_reason' => $over_retired_insurance_loss_reason,
            'occupation_type' => $occupation_type,
            'faxParts' => $faxParts,
            'residential_status' => $residential_status,
            'employee_insured_age_type' => $employee_insured_age_type,
            'dependent' => $dependent,
            'qualifications' => $qualifications,
            'employee_qualifications' => $employee_qualifications,
            'work_category' => $work_category,
            'enrollment_category' => $enrollment_category,
            'employment_route' => $employment_route,
            'recruitment_category_detail' => $recruitment_category_detail,
            'employment_status' => $employment_status,
            'pay_type' => $pay_type,
        ]);
    }

    public function employee_update_post(AdminEmployeeUpdateRequest $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(6) || !$userPermission->isWritableFor(6)) {
            return redirect()->route('home.index');
        }

        $currentUser = CurrentUser::info();
        $sinner = User::where('employee_id', $currentUser->id)->first();
        $existsCompany = CurrentUser::currentCompany();
        $existsBranch = Branch::where('id', $request->input('branch_id'))->where('company_id', $existsCompany->id)->first();
        if (empty($existsBranch)) {
            \Log::error('不正利用者：' . $sinner->email);
            return abort(404);
        }
        if ($request->input('departments')) {
            foreach ($request->input('departments') as $department) {
                $existsDepartment = Department::where('id', $department)->where('company_id', $existsCompany->id)->first();
                if (empty($existsDepartment)) {
                    \Log::error('不正利用者：' . $sinner->email);
                    return abort(404);
                }
            }
        }
        if ($request->input('managerial_position_id')) {
            $existsManagerialPosition = Managerial_position::where('id', $request->input('managerial_position_id'))->where('company_id', $existsCompany->id)->first();
            if (empty($existsManagerialPosition)) {
                \Log::error('不正利用者：' . $sinner->email);
                return abort(404);
            }
        }
        if ($request->input('qualifications')) {
            foreach ($request->input('qualifications') as $qualification) {
                $existsQualification = Qualifications::where('id', $qualification)->where('company_id', $existsCompany->id)->first();
                if (empty($existsQualification)) {
                    \Log::error('不正利用者：' . $sinner->email);
                    return abort(404);
                }
            }
        }

        $fax = implode('-', [
            $request->input('fax1'),
            $request->input('fax2'),
            $request->input('fax3')
        ]);
        DB::beginTransaction();
        try {
            $old_employee_data = Employee::where('id', $request->input('employee_id'))
                ->select('hired_date', 'retirement_date', 'intended_retirement_date')
                ->first();
            $old_hired_date = $old_employee_data->hired_date;
            $old_hired_date = $old_hired_date ? Carbon::parse($old_hired_date)->startOfDay() : null;
            $old_retirement_date = $old_employee_data->retirement_date;
            $old_retirement_date = $old_retirement_date ? Carbon::parse($old_retirement_date)->startOfDay() : null;
            $old_intended_retirement_date = $old_employee_data->intended_retirement_date;
            $old_intended_retirement_date = $old_intended_retirement_date ? Carbon::parse($old_intended_retirement_date)->startOfDay() : null;

            $data = $request->validationData($request);
            $address_ward = $data['address_ward'];
            $address_apartment = $data['address_apartment'];
            $emergency_address_ward1 = $data['emergency_address_ward1'];
            $emergency_address_apartment1 = $data['emergency_address_apartment1'];
            $emergency_address_ward2 = $data['emergency_address_ward2'];
            $emergency_address_apartment2 = $data['emergency_address_apartment2'];
            Employee::where('id', $request->input('employee_id'))
                ->update([
                    'employee_no' => $request->input('employee_no'),
                    'branch_id' => $request->input('branch_id'),
                    'managerial_position_id' => $request->input('managerial_position_id'),
                    'grade' => $request->input('grade'),
                    'work_category' => $request->input('work_category'),
                    'enrollment_category' => $request->input('enrollment_category'),
                    'transfer_date' => $this->formatDate($request->input('transfer_date')),
                    'division_name' => $request->input('division_name'),
                    'division_name_kana' => $request->input('division_name_kana'),
                    'last_name' => $request->input('last_name'),
                    'last_name_kana' => $request->input('last_name_kana'),
                    'last_name_alphabet' => $request->input('last_name_alphabet'),
                    'first_name' => $request->input('first_name'),
                    'first_name_kana' => $request->input('first_name_kana'),
                    'first_name_alphabet' => $request->input('first_name_alphabet'),
                    'old_last_name' => $request->input('old_last_name'),
                    'old_last_name_kana' => $request->input('old_last_name_kana'),
                    'old_last_name_alphabet' => $request->input('old_last_name_alphabet'),
                    'old_first_name' => $request->input('old_first_name'),
                    'old_first_name_kana' => $request->input('old_first_name_kana'),
                    'old_first_name_alphabet' => $request->input('old_first_name_alphabet'),
                    'name_common' => $request->input('name_common'),
                    'name_common_kana' => $request->input('name_common_kana'),
                    'sex' => $request->input('sex'),
                    'birthday' => $this->formatDate($request->input('birthday_date')),
                    'post_code' => $request->input('post_code'),
                    'address_prefecture' => $request->input('address_prefecture'),
                    'address_city' => $request->input('address_city'),
                    'address_ward' => $address_ward,
                    'address_apartment' => $address_apartment,
                    'address_city_kana' => $request->input('address_city_kana'),
                    'address_ward_kana' => $request->input('address_ward_kana'),
                    'address_apartment_kana' => $request->input('address_apartment_kana'),
                    'tel_area_code' => $request->input('tel_area_code'),
                    'tel_city_code' => $request->input('tel_city_code'),
                    'tel_subscriber_code' => $request->input('tel_subscriber_code'),
                    'fax' => $fax,
                    'mail_address1' => $request->input('mail_address1'),
                    'mail_address2' => $request->input('mail_address2'),
                    'emergency_post_code1' => $request->input('emergency_post_code1'),
                    'emergency_contact1' => $request->input('emergency_contact1'),
                    'emergency_relationship1' => $request->input('emergency_relationship1'),
                    'emergency_tel1' => $request->input('emergency_tel1'),
                    'emergency_address_prefecture1' => $request->input('emergency_address_prefecture1'),
                    'emergency_address_city1' => $request->input('emergency_address_city1'),
                    'emergency_address_ward1' => $emergency_address_ward1,
                    'emergency_address_apartment1' => $emergency_address_apartment1,
                    'emergency_post_code2' => $request->input('emergency_post_code2'),
                    'emergency_contact2' => $request->input('emergency_contact2'),
                    'emergency_relationship2' => $request->input('emergency_relationship2'),
                    'emergency_tel2' => $request->input('emergency_tel2'),
                    'emergency_address_prefecture2' => $request->input('emergency_address_prefecture2'),
                    'emergency_address_city2' => $request->input('emergency_address_city2'),
                    'emergency_address_ward2' => $emergency_address_ward2,
                    'emergency_address_apartment2' => $emergency_address_apartment2,
                    'spouse_flg' => $request->input('spouse_flg'),
                    'dependent_flg' => $request->input('dependent_flg'),
                    'dependent_family_number' => $request->input('dependent_family_number'),
                    'country_id' => $request->input('country_id'),
                    'salary_notices' => $request->input('salary_notices'),
                    'insured_age_type' => $request->input('insured_age_type'),
                    'insurer_reference_no' => $request->input('insurer_reference_no'),
                    'employment_insured_no' => $request->input('employment_insured_no'),
                    'residence_card_no' => $request->input('residence_card_no'),
                    'stay_date_period' => $this->formatDate($request->input('stay_date_period')),
                    'residential_status_id' => $request->input('residential_status_id'),
                    'residential_status_unknown_reason' => $request->input('residential_status_unknown_reason'),
                    'unauthorized_activities_permission_flg' => $request->input('unauthorized_activities_permission_flg'),
                    'social_insurance_no' => $request->input('social_insurance_no'),
                    'pension_no' => $request->input('pension_no'),
                    'labor_insurance_type' => $request->input('labor_insurance_type'),
                    'employment_insurance_type' => $request->input('employment_insurance_type'),
                    'insurance_office_no' => $request->input('insurance_office_no'),
                    'insurer_no' => $request->input('insurer_no'),
                    'employment_insurance_applied_date' => $this->formatDate($request->input('employment_insurance_applied_date')),
                    'employment_insured_date' => $this->formatDate($request->input('employment_insured_date')),
                    'employee_type' => $request->input('employee_type'),
                    'employee_status' => $request->input('employee_status'),
                    'contract_period_flg' => $request->input('contract_period_flg'),
                    'contract_start_date' => $this->formatDate($request->input('contract_start_date')),
                    'contract_end_date' => $this->formatDate($request->input('contract_end_date')),
                    'contract_renewal_flg' => $request->input('contract_renewal_flg'),
                    'hired_date' => $this->formatDate($request->input('hired_date')),
                    'retirement_date' => $this->formatDate($request->input('retirement_date')),
                    'intended_retirement_date' => $this->formatDate($request->input('intended_retirement_date')),
                    'resignation_letter_request_flg' => $request->input('resignation_letter_request_flg'),
                    'private_introduction' => $request->input('private_introduction'),
                    'recruitment_category' => $request->input('recruitment_category'),
                    'recruitment_category_detail' => $request->input('recruitment_category_detail'),
                    'employment_status' => $request->input('employment_status'),
                    'pay_type' => $request->input('pay_type'),
                    'insurance_loss_reason' => $request->input('insurance_loss_reason'),
                    'over_retired_insurance_loss_reason' => $request->input('over_retired_insurance_loss_reason'),
                    'passed_away_date' => $this->formatDate($request->input('passed_away_date')),
                    'external_advisor_flg' => $request->input('external_advisor_flg'),
                    'occupation_type' => $request->input('occupation_type'),
                    'employment_route' => $request->input('employment_route'),
                    'employment_type' => $request->input('employment_type'),
                    'employer_type' => $request->input('employer_type'),
                    'employment_start_date' => $this->formatDate($request->input('employment_start_date')),
                    'employment_end_date' => $this->formatDate($request->input('employment_end_date')),
                    'blood_type' => $request->input('blood_type'),
                    'insured_status' => $request->input('insured_status'),
                    'health_insurance_association_number' => $request->input('health_insurance_association_number'),
                    'acquisition_of_distinction' => $request->input('acquisition_of_distinction'),
                    'health_insurance_acquisition_date' => $this->formatDate($request->input('health_insurance_acquisition_date')),
                    'health_insurance_loss_date' => $this->formatDate($request->input('health_insurance_loss_date')),
                    'welfare_pension' => $request->input('welfare_pension'),
                    'overseas_special_exception' => $request->input('overseas_special_exception'),
                    'overseas_special_exception_date' => $this->formatDate($request->input('overseas_special_exception_date')),
                    'overseas_special_not_exception_date' => $this->formatDate($request->input('overseas_special_not_exception_date')),
                    'dispatch_contract_completion' => $request->input('dispatch_contract_completion'),
                    'employment_not_insured_date' => $this->formatDate($request->input('employment_not_insured_date')),
                    'bank_name' => $request->input('bank_name'),
                    'bank_name_kana' => $request->input('bank_name_kana'),
                    'head_office_or_branch_office' => $request->input('head_office_or_branch_office'),
                    'financial_institution_code' => $request->input('financial_institution_code'),
                    'store_code' => $request->input('store_code'),
                    'japan_bank_flg' => $request->input('japan_bank_flg'),
                ]);
            $employee = Employee::find($request->input('employee_id'));
            $employee->update([
                'mynumber_card_no' => $request->input('mynumber_card_no'),
                'bank_account_no' => $request->input('bank_account_no'),
                'japan_post_bank_code_no' => $request->input('japan_post_bank_code_no'),
            ]);

            $deids = $request->input('de-id', []);
            $excepts = [];

            $company_id = Branch::join('m_company as company', 'm_branch.company_id', '=', 'company.id')
                ->where('m_branch.id', $request->input('branch_id'))
                ->select('company.id')
                ->first();

            $pickup_setting = Pickup_setting::where('company_id', $company_id->id)
                ->select('change_in_dependent_status')
                ->first();
            if (empty($companyPickupSetting)) {
                $companyPickupSetting = new Pickup_setting([
                    'company_id' => $company_id->id,
                    'nursing_care_insurance_premium_deduction_begins' => 60,
                    'application_for_attainment_wage_certificate' => 30,
                    'end_of_nursing_care_insurance_premium_deduction' => 30,
                    'loss_of_eligibility_for_employees_pension_insurance' => 30,
                    'loss_of_health_insurance_status' => 30,
                    'labor_insurance_annual_renewal_start' => '05-01',
                    'year_end_tax_adjustment_start' => '12-01',
                    'year_end_tax_adjustment_end' => '12-31',
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
                    'bonus_payment_notice' => 30,
                    'basis_of_calculation' => '06-15',
                ]);
            }

            $insertData = [];

            $hired_date = $this->formatDate($request->input('hired_date'));
            if ($hired_date) {
                $hired_date = Carbon::parse($hired_date);
                $due_date = $hired_date->copy()->addMonth()->day(10);

                if (!$hired_date->isSameDay($old_hired_date) && $due_date->gte(Carbon::today())) {
                    $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                        ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                        ->where('m_pickup_type.id', 21)
                        ->first();

                    $search = ['pickup_type', 'employee', 'starting_date', 'due_date'];
                    $replace = [
                        '資格取得届',
                        $request->input('last_name') . ' ' . $request->input('first_name'),
                        $hired_date->copy()->format('Y年n月j日'),
                        $due_date->copy()->format('Y年n月j日'),
                    ];

                    $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                    $content = str_replace($search, $replace, $pickupMessage->content);

                    $pickups = Pickup::where('employee_id', $request->input('employee_id'))->where('pickup_type_id', 21)->get();
                    if (!empty($pickups)) {
                        foreach ($pickups as $pickup) {
                            $pickup->update([
                                'pickup_situation_id' => 4,
                                'anonymous_flg' => 1,
                            ]);
                        }
                    }

                    $insertData[] = [
                        'company_id' => $company_id->id,
                        'pickup_type_id' => 21,
                        'employee_id' => $request->input('employee_id'),
                        'dependent_id' => null,
                        'starting_date' => $hired_date,
                        'due_date' => $due_date,
                        'business_name' => $business_name,
                        'content' => $content,
                        'created_at' => now(),
                    ];
                }
            }

            $retirement_date = $this->formatDate($request->input('retirement_date')) ?? null;
            $intended_retirement_date = $this->formatDate($request->input('intended_retirement_date')) ?? null;
            if ($retirement_date) {
                $retirement_date = Carbon::parse($retirement_date);

                if (!empty($retirement_date) && ($old_retirement_date === null || !$retirement_date->isSameDay($old_retirement_date)) && $retirement_date->gte(Carbon::today())) {
                    $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                        ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                        ->where('m_pickup_type.id', 24)
                        ->first();

                    $search = ['pickup_type', 'employee', 'due_date'];
                    $replace = [
                        '資格喪失届',
                        $request->input('last_name') . ' ' . $request->input('first_name'),
                        $retirement_date->copy()->format('Y年n月j日'),
                    ];

                    $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                    $content = str_replace($search, $replace, $pickupMessage->content);

                    $pickups = Pickup::where('employee_id', $request->input('employee_id'))->where('pickup_type_id', 24)->get();
                    if (!empty($pickups)) {
                        foreach ($pickups as $pickup) {
                            $pickup->update([
                                'pickup_situation_id' => 4,
                                'anonymous_flg' => 1,
                            ]);
                        }
                    }

                    $insertData[] = [
                        'company_id' => $company_id->id,
                        'pickup_type_id' => 24,
                        'employee_id' => $request->input('employee_id'),
                        'dependent_id' => null,
                        'starting_date' => null,
                        'due_date' => $retirement_date,
                        'business_name' => $business_name,
                        'content' => $content,
                        'created_at' => now(),
                    ];
                }
            } elseif ($intended_retirement_date) {
                $intended_retirement_date = Carbon::parse($intended_retirement_date);

                if (!empty($intended_retirement_date) && !$intended_retirement_date->isSameDay($old_intended_retirement_date) && $intended_retirement_date->gte(Carbon::today())) {
                    $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                        ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                        ->where('m_pickup_type.id', 24)
                        ->first();

                    $search = ['pickup_type', 'employee', 'due_date'];
                    $replace = [
                        '資格喪失届',
                        $request->input('last_name') . ' ' . $request->input('first_name'),
                        $intended_retirement_date->copy()->format('Y年n月j日'),
                    ];

                    $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                    $content = str_replace($search, $replace, $pickupMessage->content);

                    $pickups = Pickup::where('employee_id', $request->input('employee_id'))->where('pickup_type_id', 24)->get();
                    if (!empty($pickups)) {
                        foreach ($pickups as $pickup) {
                            $pickup->update([
                                'pickup_situation_id' => 4,
                                'anonymous_flg' => 1,
                            ]);
                        }
                    }

                    $insertData[] = [
                        'company_id' => $company_id->id,
                        'pickup_type_id' => 24,
                        'employee_id' => $request->input('employee_id'),
                        'dependent_id' => null,
                        'starting_date' => null,
                        'due_date' => $intended_retirement_date,
                        'business_name' => $business_name,
                        'content' => $content,
                        'created_at' => now(),
                    ];
                }
            }

            foreach ($deids as $index => $deid) {
                $dedata = $this->data_dependent($data, $index, $request->input('employee_id'));

                if ($deid > 0) {
                    $dependent = Dependent::find($deid);
                    $old_date_of_expiry = null;
                    $old_date_of_authorisation = null;
                    $old_dependent_type = null;
                    if ($dependent) {
                        $old_date_of_expiry = $dependent->date_of_expiry;
                        $old_date_of_expiry = $old_date_of_expiry ? Carbon::parse($old_date_of_expiry)->startOfDay() : null;
                        $old_date_of_authorisation = $dependent->date_of_authorisation;
                        $old_date_of_authorisation = $old_date_of_authorisation ? Carbon::parse($old_date_of_authorisation)->startOfDay() : null;
                        $old_dependent_type = $dependent->dependent_type;

                        $dependent->fill($dedata);
                        $dependent->save();
                    }
                    $excepts[] = $deid;

                    if (!empty($pickup_setting)) {
                        $relationship_spouses = [
                            '未選択',
                            '夫',
                            '妻',
                            '夫(未届)',
                            '妻(未届)',
                        ];
                        $relationship_dependents = [
                            '未選択',
                            '配偶者',
                            '子供',
                            '養子',
                            '孫',
                            '兄弟姉妹',
                            '父母',
                            '祖父母',
                            '義父母',
                            '義兄弟姉妹',
                            '従兄弟姉妹',
                            '甥・姪',
                            'おじ・おば',
                            '継父母',
                            '継子',
                            'その他の親族',
                        ];
                        $relationship_spouse = $dedata['relationship_spouse'] ?? null;
                        $relationship_dependent = $dedata['relationship_dependent'] ?? null;
                        $relation = '';
                        if (!empty($relationship_spouse)) {
                            $relation = $relationship_spouses[$relationship_spouse];
                        } elseif (!empty($relationship_dependent)) {
                            $relation = $relationship_dependents[$relationship_dependent];
                        }

                        $dependent_name = $dedata['last_name'] . ' ' . $dedata['first_name'];

                        $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                            ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                            ->where('m_pickup_type.id', 15)
                            ->first();

                        $search = ['pickup_type', 'employee', 'relation', 'dependent'];
                        $replace = [
                            '扶養変更',
                            $request->input('last_name') . ' ' . $request->input('first_name'),
                            $relation,
                            $dependent_name,
                        ];

                        $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                        $content = str_replace($search, $replace, $pickupMessage->content);

                        if (!empty($dedata['date_of_expiry']) || !empty($dedata['date_of_authorisation']) || !empty($dedata['dependent_type'])) {
                            if ($dedata['date_of_expiry'] && ($old_date_of_expiry === null || !Carbon::parse($dedata['date_of_expiry'])->isSameDay($old_date_of_expiry))) {
                                $due_date = Carbon::parse($dedata['date_of_expiry'])->addDays($pickup_setting->change_in_dependent_status);
                                if ($due_date->gte(Carbon::today())) {
                                    $insertData[] = [
                                        'company_id' => $company_id->id,
                                        'pickup_type_id' => 15,
                                        'employee_id' => $request->input('employee_id'),
                                        'dependent_id' => $deid,
                                        'starting_date' => null,
                                        'due_date' => $due_date,
                                        'business_name' => $business_name,
                                        'content' => $content,
                                        'created_at' => now(),
                                    ];
                                }
                            } elseif (($dedata['date_of_authorisation'] && $old_date_of_authorisation === null || !Carbon::parse($dedata['date_of_authorisation'])->isSameDay($old_date_of_authorisation))) {
                                $due_date = Carbon::parse($dedata['date_of_authorisation'])->addDays($pickup_setting->change_in_dependent_status);
                                if ($due_date->gte(Carbon::today())) {
                                    $insertData[] = [
                                        'company_id' => $company_id->id,
                                        'pickup_type_id' => 15,
                                        'employee_id' => $request->input('employee_id'),
                                        'dependent_id' => $deid,
                                        'starting_date' => null,
                                        'due_date' => $due_date,
                                        'business_name' => $business_name,
                                        'content' => $content,
                                        'created_at' => now(),
                                    ];
                                }
                            } elseif ($dedata['dependent_type'] && $old_dependent_type === null || $old_dependent_type !== (int)$dedata['dependent_type']) {
                                $due_date = Carbon::now()->addDays($pickup_setting->change_in_dependent_status);
                                $insertData[] = [
                                    'company_id' => $company_id->id,
                                    'pickup_type_id' => 15,
                                    'employee_id' => $request->input('employee_id'),
                                    'dependent_id' => $deid,
                                    'starting_date' => null,
                                    'due_date' => $due_date,
                                    'business_name' => $business_name,
                                    'content' => $content,
                                    'created_at' => now(),
                                ];
                            }
                        }
                    }
                } else {
                    $created_id = Dependent::create($dedata)->id;
                    $excepts[] = $created_id;

                    if (!empty($pickup_setting)) {
                        $relationship_spouses = [
                            '未選択',
                            '夫',
                            '妻',
                            '夫(未届)',
                            '妻(未届)',
                        ];
                        $relationship_dependents = [
                            '未選択',
                            '配偶者',
                            '子供',
                            '養子',
                            '孫',
                            '兄弟姉妹',
                            '父母',
                            '祖父母',
                            '義父母',
                            '義兄弟姉妹',
                            '従兄弟姉妹',
                            '甥・姪',
                            'おじ・おば',
                            '継父母',
                            '継子',
                            'その他の親族',
                        ];
                        $relationship_spouse = $dedata['relationship_spouse'] ?? null;
                        $relationship_dependent = $dedata['relationship_dependent'] ?? null;
                        $relation = '';
                        if (!empty($relationship_spouse)) {
                            $relation = $relationship_spouses[$relationship_spouse];
                        } elseif (!empty($relationship_dependent)) {
                            $relation = $relationship_dependents[$relationship_dependent];
                        }

                        $dependent_name = $dedata['last_name'] . ' ' . $dedata['first_name'];

                        $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                            ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                            ->where('m_pickup_type.id', 15)
                            ->first();

                        $search = ['pickup_type', 'employee', 'relation', 'dependent'];
                        $replace = [
                            '扶養変更',
                            $request->input('last_name') . ' ' . $request->input('first_name'),
                            $relation,
                            $dependent_name,
                        ];

                        $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                        $content = str_replace($search, $replace, $pickupMessage->content);

                        if (!empty($dedata['date_of_expiry'])) {
                            $due_date = Carbon::parse($dedata['date_of_expiry'])->addDays($pickup_setting->change_in_dependent_status);

                            if ($due_date->gte(Carbon::today())) {
                                $insertData[] = [
                                    'company_id' => $company_id->id,
                                    'pickup_type_id' => 15,
                                    'employee_id' => $request->input('employee_id'),
                                    'dependent_id' => $created_id,
                                    'starting_date' => null,
                                    'due_date' => $due_date,
                                    'business_name' => $business_name,
                                    'content' => $content,
                                    'created_at' => now(),
                                ];
                            }
                        } elseif (!empty($dedata['date_of_authorisation'])) {
                            $due_date = Carbon::parse($dedata['date_of_authorisation'])->addDays($pickup_setting->change_in_dependent_status);

                            if ($due_date->gte(Carbon::today())) {
                                $insertData[] = [
                                    'company_id' => $company_id->id,
                                    'pickup_type_id' => 15,
                                    'employee_id' => $request->input('employee_id'),
                                    'dependent_id' => $created_id,
                                    'starting_date' => null,
                                    'due_date' => $due_date,
                                    'business_name' => $business_name,
                                    'content' => $content,
                                    'created_at' => now(),
                                ];
                            }
                        } elseif (!empty($dedata['dependent_type'])) {
                            $due_date = Carbon::now()->addDays($pickup_setting->change_in_dependent_status);

                            $insertData[] = [
                                'company_id' => $company_id->id,
                                'pickup_type_id' => 15,
                                'employee_id' => $request->input('employee_id'),
                                'dependent_id' => $created_id,
                                'starting_date' => null,
                                'due_date' => $due_date,
                                'business_name' => $business_name,
                                'content' => $content,
                                'created_at' => now(),
                            ];
                        }
                    }
                }
            }
            Pickup::insert($insertData);
            Dependent::where('employee_id', $request->input('employee_id'))->where('history_flg', 0)->whereNotIn('id', $excepts)->update(['delete_flg' => 1]);

            $qualifications = $request->input('qualifications', []);
            Employee_qualifications::whereNotIn('qualifications_id', $qualifications)
                ->where('employee_id', $request->input('employee_id'))
                ->where('delete_flg', 0)
                ->update(['delete_flg' => 1]);

            $existingQualificationsRecords = Employee_qualifications::whereIn('qualifications_id', $qualifications)->where('employee_id', $request->input('employee_id'))->where('delete_flg', 0)->get();

            $existingQualificationsIds = $existingQualificationsRecords->pluck('qualifications_id')->toArray();
            $newQualificationsIds = array_diff($qualifications, $existingQualificationsIds);
            if (!empty($newQualificationsIds)) {
                foreach ($newQualificationsIds as $qualificationsId) {
                    Employee_qualifications::insert([
                        'employee_id' => $request->input('employee_id'),
                        'qualifications_id' => $qualificationsId,
                    ]);
                }
            }


            $departments = $request->input('departments', []);
            Employee_department::whereNotIn('department_id', $departments)
                ->where('employee_id', $request->input('employee_id'))
                ->where('delete_flg', 0)
                ->update(['delete_flg' => 1]);

            $existingRecords = Employee_department::whereIn('department_id', $departments)->where('employee_id', $request->input('employee_id'))->where('delete_flg', 0)->get();

            $existingDepartmentIds = $existingRecords->pluck('department_id')->toArray();
            $newDepartmentIds = array_diff($departments, $existingDepartmentIds);
            if (!empty($newDepartmentIds)) {
                foreach ($newDepartmentIds as $departmentId) {
                    Employee_department::insert([
                        'department_id' => $departmentId,
                        'employee_id' => $request->input('employee_id')
                    ]);
                }
            }

            $employee_id = $request->input('employee_id');
            $employee = Employee::where('id', $employee_id)->where('delete_flg', 0)->first();
            $branch = $employee->branch()->first();
            $company = $branch->company()->first();
            $company_id = $company->id;
            $icon_file = $request->file('icon_file');
            $icon_delete_flg = $request->input('icon_delete_flg');
            if ($company_id && $employee_id) {
                if ($icon_delete_flg === "1") {
                    $directory = 'photo/' . $company_id;

                    foreach (Storage::files($directory) as $file) {
                        $fileName = pathinfo($file, PATHINFO_FILENAME);
                        if ($fileName === $employee_id) {
                            Storage::delete($file);
                        }
                    }
                } elseif ($icon_file) {
                    $extension = $icon_file->getClientOriginalExtension();
                    $directory = 'photo/' . $company_id;
                    $filePath = $directory . '/' . $employee_id . '.' . $extension;
                    if (!Storage::exists($directory)) {
                        Storage::makeDirectory($directory);
                    }

                    foreach (Storage::files($directory) as $file) {
                        $fileName = pathinfo($file, PATHINFO_FILENAME);
                        if ($fileName === $employee_id) {
                            Storage::delete($file);
                        }
                    }

                    $icon_file->storeAs($filePath);
                }
            }

            DB::commit();
            $this->putSuccess();
            if ($request->input('query_parameter')) {
                return redirect()->to($request->input('query_parameter'));
            } else {
                return redirect()->route('employee');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);
            return back()->withErrors('エラー');
        }
    }

    public function get_departments(Request $request)
    {
        $company = CurrentUser::currentCompany();
        $departments = Department::select('id', 'name')->where('company_id', $company->id)->where('delete_flg', 0)->get();
        return response()->json($departments);
    }

    private function formatDate($input)
    {
        return $input ? Carbon::createFromFormat('Y年n月j日', $input)->format('Y-m-d') : null;
    }

    private function data_dependent(array $requestData, $index, $id)
    {
        $input_date1 = $requestData['de-birthday'][$index];
        if (!is_null($input_date1) && strtotime($input_date1) === false) {
            $formatted_de_birthday = Carbon::createFromFormat('Y年n月j日', $input_date1)->format('Y-m-d');
        } else {
            $formatted_de_birthday = $input_date1;
        }
        $input_date2 = $requestData['de-date_of_authorisation'][$index];
        if (!is_null($input_date2) && strtotime($input_date2) === false) {
            $formatted_de_date_of_authorisation = Carbon::createFromFormat('Y年n月j日', $input_date2)->format('Y-m-d');
        } else {
            $formatted_de_date_of_authorisation = $input_date2;
        }
        if (isset($requestData['de-date_of_expiry'][$index])) {
            $input_date3 = $requestData['de-date_of_expiry'][$index];
            if (!is_null($input_date3) && strtotime($input_date3) === false) {
                $formatted_de_date_of_expiry = Carbon::createFromFormat('Y年n月j日', $input_date3)->format('Y-m-d');
            } else {
                $formatted_de_date_of_expiry = $input_date3;
            }
        }

        return [
            'employee_id' => $id,
            'relationship_spouse' => $requestData['de-relationship_spouse'][$index] ?? null,
            'relationship_dependent' => $requestData['de-relationship_dependent'][$index] ?? null,
            'spouse_flag' => $requestData['de-spouse_flag'][$index] ?? null,
            'dependent_type' => $requestData['de-dependent_type'][$index] ?? null,
            'last_name' => $requestData['de-last_name'][$index],
            'first_name' => $requestData['de-first_name'][$index],
            'last_name_kana' => $requestData['de-last_name_kana'][$index],
            'first_name_kana' => $requestData['de-first_name_kana'][$index],
            'sex' => $requestData['de-sex'][$index],
            'occupation' => $requestData['de-occupation'][$index],
            'annual_income' => $requestData['de-annual_income'][$index],
            'contact' => $requestData['de-contact'][$index],
            'post_code' => $requestData['de-post_code'][$index],
            'living_type' => $requestData['de-living_type'][$index] ?? null,
            'mynumber_card_no' => $requestData['de-mynumber_card_no'][$index],
            'pension_no' => $requestData['de-pension_no'][$index],
            'history_flg' => $requestData['de-history_flg'][$index] ?? 0,
            'birthday' => $formatted_de_birthday,
            'date_of_authorisation' => $formatted_de_date_of_authorisation,
            'date_of_expiry' => $formatted_de_date_of_expiry ?? null,
            'insurer_no' => $requestData['de-insurer_no'][$index],
            'remarks' => $requestData['de-remarks'][$index],
            'living_type' => $requestData['de-living_type'][$index] ?? 0,
            'post_code' => $requestData['de-post_code'][$index],
            'address_prefecture' => $requestData['de-address_prefecture'][$index],
            'address_city' => $requestData['de-address_city'][$index],
            'address_ward' => $requestData['de-address_ward'][$index],
            'address_apartment' => $requestData['de-address_apartment'][$index],
            'insurance_office_no' => $requestData['de-insurance_office_no'][$index],
        ];
    }
}
