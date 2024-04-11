<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCompanyCreateRequest;
use App\Http\Requests\AdminCompanyUpdateRequest;
use App\Http\Requests\AdminEmployeeCreateRequest;
use App\Http\Requests\AdminEmployeeUpdateRequest;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\Http\Requests\AdminLaborCreateRequest;
use App\Http\Requests\AdminLaborUpdateRequest;
use App\Models\CurrentUser;
use App\Models\Company;
use App\Models\User;
use App\Models\Branch;
use App\Models\Values_company_listed_type;
use App\Models\Values_company_business_type;
use App\Models\Company_type;
use App\Models\Prefecture;
use App\Models\Values_employee_labor_insurance_type;
use App\Models\Managerial_position;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Employee;
use App\Models\Values_employee_employee_status;
use App\Models\Values_employee_employee_type;
use App\Models\Values_employee_employment_insurance_type;
use App\Models\Values_employee_insurance_loss_reason;
use App\Models\Values_employee_insured_type;
use App\Models\Values_employee_occupation_type;
use App\Models\Values_employee_over_retired_insurance_loss_reason;
use App\Models\Values_sex;
use App\Models\Department;
use App\Models\Employee_department;
use App\Models\Values_branch_labor_insurance_payment_method;
use App\Models\Values_branch_place_type;
use App\Models\Values_branch_start_days_of_week;
use App\Models\Values_branch_work_style_type;

class AdminController extends Controller
{
    public function __construct(Request $request)
    {
        // Admin権限以外のコントローラー使用を拒否する
        $this->middleware(function ($request, $next) {
            $role_id = CurrentUser::info()->role_id;
            if ($role_id !== 999)
                return redirect()->route('auth.logout');
            return $next($request);
        });
    }
    public function index(Request $request)
    {
        return view('admin.index');
    }

    /** 会社管理 */

    public function company_list(Request $request)
    {
        $paginate = [
            'page' => $request->input('page', 1),
            'limit' => 20,
            'search' => $request->input('search'),
        ];
        return view('admin.companies', compact('paginate'));
    }

    public function company_list_api(Request $request)
    {
        try {
            $data = Company::select('id', 'name', 'company_no', 'company_type_id', 'business_type', 'company_division')->where('delete_flg', 0)->get();
        } catch (\Exception $e) {
            return response()->json([], 400);
        }
        return response()->json($data, 200);
    }

    public function company_create(Request $request)
    {
        $company_listed_type = Values_company_listed_type::pluck('name', 'id');
        $businessTypes = Values_company_business_type::pluck('name', 'id');
        $company_type = Company_type::where('delete_flg', 0)->get();
        $prefectures = Prefecture::pluck('name', 'id');
        $labor_insurance_payment_method = Values_branch_labor_insurance_payment_method::pluck('name', 'id');
        $place_type = Values_branch_place_type::pluck('name', 'id');
        $start_days_of_week = Values_branch_start_days_of_week::pluck('name', 'id');
        $work_style_type = Values_branch_work_style_type::pluck('name', 'id');
        return view('admin.company_create', [
            'company_listed_type' => $company_listed_type,
            'businessTypes' => $businessTypes,
            'branch' => [],
            'company_type' => $company_type,
            'prefectures' => $prefectures,
            'labor_insurance_payment_method' => $labor_insurance_payment_method,
            'place_type' => $place_type,
            'start_days_of_week' => $start_days_of_week,
            'work_style_type' => $work_style_type
        ]);
    }

    public function company_create_post(AdminCompanyCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $this->data_company($request);
            $company_id = Company::create($data)->id;
            $brname = $request->input('br-name');
            foreach ($brname as $index => $name) {
                $brdata = $this->data_branch($request, $index, $company_id);
                Branch::create($brdata);
            }
            DB::commit();
            $this->putSuccess($request);
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (UniqueConstraintViolationException $e) {
            $errorString = $e->getMessage();
            DB::rollback();
            if (strpos($errorString, 'stock_code_unique') !== false) {
                $errorMessage = '{"stock_code_unique":["入力された証券コードは既に登録されています."]}';
                return redirect()->back()->withErrors(json_decode($errorMessage, true))->withInput();
            } else {
                return redirect()->back()->withErrors("")->withInput();
            }
        }
        return redirect()->route('admin.company');
    }

    public function company_update(Request $request, $id)
    {
        $company = Company::find($id);
        $company_listed_type = Values_company_listed_type::pluck('name', 'id');
        $businessTypes = Values_company_business_type::pluck('name', 'id');
        $branch = $company->branch()->where('delete_flg', 0)->get();
        $company_type = Company_type::where('delete_flg', 0)->get();
        $prefectures = Prefecture::pluck('name', 'id');
        $labor_insurance_payment_method = Values_branch_labor_insurance_payment_method::pluck('name', 'id');
        $place_type = Values_branch_place_type::pluck('name', 'id');
        $start_days_of_week = Values_branch_start_days_of_week::pluck('name', 'id');
        $work_style_type = Values_branch_work_style_type::pluck('name', 'id');
        return view('admin.company_create', [
            'company_id' => $company->id,
            'company' => $company,
            'company_listed_type' => $company_listed_type,
            'businessTypes' => $businessTypes,
            'branch' => $branch,
            'company_type' => $company_type,
            'prefectures' => $prefectures,
            'labor_insurance_payment_method' => $labor_insurance_payment_method,
            'place_type' => $place_type,
            'start_days_of_week' => $start_days_of_week,
            'work_style_type' => $work_style_type
        ]);
    }

    public function company_update_post(AdminCompanyUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $this->data_company($request);
            Company::where('id', $id)->update($data);
            $brids = $request->input('br-id');
            $excepts = [];
            foreach ($brids as $index => $brid) {
                $brdata = $this->data_branch($request, $index, $id);
                if ($brid > 0) {
                    Branch::where('id', $brid)->update($brdata);
                    $excepts[] = $brid;
                } else {
                    $created_id = Branch::create($brdata)->id;
                    $excepts[] = $created_id;
                }
            }
            Branch::where('company_id', $id)->whereNotIn('id', $excepts)->update(['delete_flg' => 1]);
            DB::commit();
            $this->putSuccess($request);
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (UniqueConstraintViolationException $e) {
            DB::rollback();
            $errorString = $e->getMessage();
            if (strpos($errorString, 'stock_code_unique') !== false) {
                $errorMessage = '{"stock_code_unique":["入力された証券コードは既に登録されています."]}';
                return redirect()->back()->withErrors(json_decode($errorMessage, true))->withInput();
            } else {
                return redirect()->back()->withErrors("")->withInput();
            }
        }
        return redirect()->route('admin.company');
    }
    private function validateAndFormatDate($inputDate)
    {
        if ($inputDate) {
            $formattedDate = \DateTime::createFromFormat('Y年n月j日', $inputDate);
            $formattedDate = $formattedDate->format('Y-m-d');
            $validator = Validator::make(['formatted_date' => $formattedDate], [
                'formatted_date' => 'date_format:Y-m-d',
            ]);
            if (!$validator->passes()) {
                throw new ValidationException($validator);
            }
            return $formattedDate;
        }
        return null;
    }

    private function formatDate($input)
    {
        return $input ? Carbon::createFromFormat('Y年n月j日', $input)->format('Y-m-d') : null;
    }

    private function data_company(Request $request)
    {
        $formatted_founding_date = $request->input('founding_date') ? Carbon::createFromFormat('Y年n月j日', $request->input('founding_date'))->format('Y-m-d') : null;
        $formatted_establishment_date = $request->input('establishment_date') ? Carbon::createFromFormat('Y年n月j日', $request->input('establishment_date'))->format('Y-m-d') : null;
        return [
            'company_division' => $request->input('company_division'),
            'name' => $request->input('name'),
            'name_kana' => $request->input('name_kana'),
            'name_en' => $request->input('name_en'),
            'name_abbreviation' => $request->input('name_abbreviation'),
            'company_no' => $request->input('company_no'),
            'company_type_id' => $request->input('company_type_id'),
            'license_no' => $request->input('license_no'),
            'business_type' => $request->input('business_type'),
            'listed_type' => $request->input('listed_type'),
            'stock_code' => $request->input('stock_code'),
            'founding_date' => $formatted_founding_date,
            'establishment_date' => $formatted_establishment_date,
            'capital' => $request->input('capital'),
            'annual_sales' => $request->input('annual_sales'),
            'employee_sum' => $request->input('employee_sum'),
            'qualification' => $request->input('qualification'),
            'authorized_shares' => $request->input('authorized_shares'),
            'issued_shares' => $request->input('issued_shares'),
            'supplier_company' => $request->input('supplier_company'),
            'outsourcing_company' => $request->input('outsourcing_company'),
            'sales_company' => $request->input('sales_company'),
            'url' => $request->input('url'),
            'purpose' => $request->input('purpose'),
        ];
    }

    private function data_branch(Request $request, $index, $company_id)
    {
        $input_date1 = $request->input('br-labor_insurance_establishment_date')[$index];
        if (!is_null($input_date1) && strtotime($input_date1) === false) {
            $formatted_br_labor_insurance_establishment_date = Carbon::createFromFormat('Y年n月j日', $input_date1)->format('Y-m-d');
        } else {
            $formatted_br_labor_insurance_establishment_date = $input_date1;
        }
        $input_date2 = $request->input('br-employment_insurance_establishment_date')[$index];
        if (!is_null($input_date2) && strtotime($input_date2) === false) {
            $formatted_br_employment_insurance_establishment_date = Carbon::createFromFormat('Y年n月j日', $input_date1)->format('Y-m-d');
        } else {
            $formatted_br_employment_insurance_establishment_date = $input_date2;
        }
        return [
            'name' => $request->input('br-name')[$index],
            'company_id' => $company_id,
            'post_code' => $request->input('br-post_code')[$index],
            'address_prefecture' => $request->input('br-address_prefecture')[$index],
            'address_city' => $request->input('br-address_city')[$index],
            'address_ward' => $request->input('br-address_ward')[$index],
            'address_apartment' => $request->input('br-address_apartment')[$index],
            'tel_area_code' => $request->input('br-tel_area_code')[$index],
            'tel_city_code' => $request->input('br-tel_city_code')[$index],
            'tel_subscriber_code' => $request->input('br-tel_subscriber_code')[$index],
            'tel_overseas' => $request->input('br-tel_overseas')[$index],
            'place_type' => $request->input('br-place_type')[$index],
            'branch_type' => $request->input('br-branch_type')[$index],
            'labor_insurance_no' => $request->input('br-labor_insurance_no')[$index],
            'labor_insurance_payment_method' => $request->input('br-labor_insurance_payment_method')[$index],
            'labor_insurance_establishment_date' => $formatted_br_labor_insurance_establishment_date,
            'insurance_office_no' => $request->input('br-insurance_office_no')[$index],
            'insurance_office_reference_no' => $request->input('br-insurance_office_reference_no')[$index],
            'pension_office_no' => $request->input('br-pension_office_no')[$index],
            'pension_office_id' => $request->input('br-pension_office_id')[$index],
            'pension_office_reference_prefecture' => $request->input('br-pension_office_reference_prefecture')[$index],
            'pension_office_reference_no_cities' => $request->input('br-pension_office_reference_no_cities')[$index],
            'pension_office_reference_no_office' => $request->input('br-pension_office_reference_no_office')[$index],
            'employment_insurance_office_no' => $request->input('br-employment_insurance_office_no')[$index],
            'employment_insurance_establishment_date' => $formatted_br_employment_insurance_establishment_date,
            'hello_work_id' => $request->input('br-hello_work_id')[$index],
            'labor_bureau_id' => $request->input('br-labor_bureau_id')[$index],
            'labor_supervision_id' => $request->input('br-labor_supervision_id')[$index],
            'start_date_of_month' => $request->input('br-start_date_of_month')[$index],
            'start_days_of_week' => $request->input('br-start_days_of_week')[$index],
            'start_time_of_day' => $request->input('br-start_time_of_day')[$index],
            'work_time_start' => $request->input('br-work_time_start')[$index],
            'work_time_end' => $request->input('br-work_time_end')[$index],
            'agreed_hours_year' => $request->input('br-agreed_hours_year')[$index],
            'agreed_hours_month' => $request->input('br-agreed_hours_month')[$index],
            'agreed_hours_week' => $request->input('br-agreed_hours_week')[$index],
            'agreed_hours_day' => $request->input('br-agreed_hours_day')[$index],
            'working_days_yearly' => $request->input('br-working_days_yearly')[$index],
            'working_days_monthly' => $request->input('br-working_days_monthly')[$index],
            'holiday_yearly' => $request->input('br-holiday_yearly')[$index],
            'holiday_monthly' => $request->input('br-holiday_monthly')[$index],
            'holiday_legal' => $request->input('br-holiday_legal')[$index],
            'holiday_not_logal' => $request->input('br-holiday_not_logal')[$index],
            'work_style_type' => $request->input('br-work_style_type')[$index],
        ];
    }

    public function company_department_update(Request $request, $id)
    {
        $company = Company::find($id);
        $company_name = $company->name;
        return view('admin.department', ['company_id' => $id, 'company_name' => $company_name]);
    }

    // ---------------------------------------------------------------------------------------
    // 従業員一覧
    // ---------------------------------------------------------------------------------------

    public function labor_list(Request $request)
    {
        $paginate = [
            'page' => $request->input('page', 1),
            'limit' => 20,
            'search' => $request->input('search'),
        ];
        return view('admin.labors', ['paginate' => $paginate]);
    }

    // ---------------------------------------------------------------------------------------
    // 社労士登録編集
    // ---------------------------------------------------------------------------------------

    public function labor_create(Request $request)
    {
        $employee_type = Values_employee_employee_type::pluck('name', 'id');

        return view('admin.labor-create', [
            'departments' => [],
            'employee_type' => $employee_type
        ]);
    }

    public function labor_create_post(AdminLaborCreateRequest $request)
    {

        DB::beginTransaction();

        try {
            $employee_id = Employee::create([
                'last_name' => $request->input('last_name'),
                'last_name_kana' => $request->input('last_name_kana'),
                'last_name_alphabet' => $request->input('last_name_alphabet'),
                'first_name' => $request->input('first_name'),
                'first_name_kana' => $request->input('first_name_kana'),
                'first_name_alphabet' => $request->input('first_name_alphabet'),
                'employee_no' => $request->input('employee_no'),
                'employee_type' => $request->input('employee_type'),
                'branch_id' => $request->input('branch_id'),
                'tel_area_code' => $request->input('tel_area_code'),
                'tel_city_code' => $request->input('tel_city_code'),
                'tel_subscriber_code' => $request->input('tel_subscriber_code'),
                'mail_address2' => $request->input('mail_address2'),
            ])->id;

            Employee::where('id', $employee_id)->update(['role_id' => 500]);

            $departments = $request->input('departments', []);
            foreach ($departments as $dep) {
                Employee_department::insert([
                    'department_id' => $dep,
                    'employee_id' => $employee_id
                ]);
            }

            $data = [
                'name' => $request->input('last_name') . ' ' . $request->input('first_name'),
                'email' => $request->input('user_email'),
                'password' => Hash::make($request->input('user_pass')),
                'employee_id' => $employee_id
            ];

            User::create($data);


            DB::commit();
            $this->putSuccess($request);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);
            return back()->withErrors('エラー');
        }
        return redirect()->route('admin.labor');
    }

    public function labor_update(Request $request, $id)
    {
        $employee_type = Values_employee_employee_type::pluck('name', 'id');
        $employee = Employee::where('delete_flg', 0)->where('id', $id)->first();
        $branch = Branch::find($employee->branch_id)->with('company')->first();
        $user = User::where('employee_id', $employee->id)->first();
        $departments = Employee_department::where('employee_id', $id)->where('delete_flg', 0)->pluck('department_id');


        $employee->company_name = $branch->company->name;
        $employee->company_id = $branch->company->id;
        $employee->branch_name = $branch->name;
        $employee->branch_id = $branch->id;

        return view('admin.labor-create', [
            'departments' => $departments,
            'employee_id' => $id,
            'employee' => $employee,
            'employee_type' => $employee_type
        ]);
    }

    public function labor_update_post(AdminLaborUpdateRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            Employee::where('id', $id)->update([
                'last_name' => $request->input('last_name'),
                'last_name_kana' => $request->input('last_name_kana'),
                'last_name_alphabet' => $request->input('last_name_alphabet'),
                'first_name' => $request->input('first_name'),
                'first_name_kana' => $request->input('first_name_kana'),
                'first_name_alphabet' => $request->input('first_name_alphabet'),
                'employee_no' => $request->input('employee_no'),
                'employee_type' => $request->input('employee_type'),
                'branch_id' => $request->input('branch_id'),
                'tel_area_code' => $request->input('tel_area_code'),
                'tel_city_code' => $request->input('tel_city_code'),
                'tel_subscriber_code' => $request->input('tel_subscriber_code'),
                'mail_address2' => $request->input('mail_address2'),
            ]);

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

            DB::commit();
            $this->putSuccess($request);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);
            return back()->withErrors('エラー');
        }
        return redirect()->route('admin.labor');
    }

    // ---------------------------------------------------------------------------------------
    // 一般従業員登録・編集
    // ---------------------------------------------------------------------------------------

    public function employee_create(Request $request)
    {
        $employee_type = Values_employee_employee_type::pluck('name', 'id');
        $sex_type = Values_sex::pluck('name', 'id');
        $prefectures = Prefecture::pluck('name', 'id');
        $country_type = Country::pluck('country_name', 'id');
        $employee_status_type = Values_employee_employee_status::pluck('name', 'id');
        $labor_insurance_type = Values_employee_labor_insurance_type::pluck('name', 'id');
        $employment_insurance_type = Values_employee_employment_insurance_type::pluck('name', 'id');
        $insurance_loss_reason = Values_employee_insurance_loss_reason::pluck('name', 'id');
        $over_retired_insurance_loss_reason = Values_employee_over_retired_insurance_loss_reason::pluck('name', 'id');
        $occupation_type = Values_employee_occupation_type::pluck('name', 'id');

        return view('admin.employee_create', [
            'departments' => [],
            'employee_type' => $employee_type,
            'sex_type' => $sex_type,
            'prefectures' => $prefectures,
            'country_type' => $country_type,
            'employee_status_type' => $employee_status_type,
            'labor_insurance_type' => $labor_insurance_type,
            'employment_insurance_type' => $employment_insurance_type,
            'insurance_loss_reason' => $insurance_loss_reason,
            'over_retired_insurance_loss_reason' => $over_retired_insurance_loss_reason,
            'occupation_type' => $occupation_type
        ]);
    }

    public function employee_create_post(AdminEmployeeCreateRequest $request)
    {
        DB::beginTransaction();

        try {
            $employee_id = Employee::create([
                'employee_no' => $request->input('employee_no'),
                'branch_id' => $request->input('branch_id'),
                'managerial_position_id' => $request->input('managerial_position_id'),
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
                'birthday' => $this->formatDate($request->input('birthday')),
                'post_code' => $request->input('post_code'),
                'address_prefecture' => $request->input('address_prefecture'),
                'address_city' => $request->input('address_city'),
                'address_ward' => $request->input('address_ward'),
                'address_apartment' => $request->input('address_apartment'),
                // 'address_prefecture_kana' => $request->input('address_prefecture_kana'),developがint
                'address_city_kana' => $request->input('address_city_kana'),
                'address_ward_kana' => $request->input('address_ward_kana'),
                'address_apartment_kana' => $request->input('address_apartment_kana'),
                'tel_area_code' => $request->input('tel_area_code'),
                'tel_city_code' => $request->input('tel_city_code'),
                'tel_subscriber_code' => $request->input('tel_subscriber_code'),
                'fax' => $request->input('fax'),
                'mail_address1' => $request->input('mail_address1'),
                'mail_address2' => $request->input('mail_address2'),
                'emergency_contact1' => $request->input('emergency_contact1'),
                'emergency_relationship1' => $request->input('emergency_relationship1'),
                'emergency_tel1' => $request->input('emergency_tel1'),
                'emergency_address_prefecture1' => $request->input('emergency_address_prefecture1'),
                'emergency_address_city1' => $request->input('emergency_address_city1'),
                'emergency_address_ward1' => $request->input('emergency_address_ward1'),
                'emergency_address_apartment1' => $request->input('emergency_address_apartment1'),
                'emergency_contact2' => $request->input('emergency_contact2'),
                'emergency_relationship2' => $request->input('emergency_relationship2'),
                'emergency_tel2' => $request->input('emergency_tel2'),
                'emergency_address_prefecture2' => $request->input('emergency_address_prefecture2'),
                'emergency_address_city2' => $request->input('emergency_address_city2'),
                'emergency_address_ward2' => $request->input('emergency_address_ward2'),
                'emergency_address_apartment2' => $request->input('emergency_address_apartment2'),
                'spouse_flg' => $request->input('spouse_flg'),
                'dependent_flg' => $request->input('dependent_flg'),
                'dependent_family_number' => $request->input('dependent_family_number'),
                'country_id' => $request->input('country_id'),
                'salary_notices' => $request->input('salary_notices'),
                'insured_age_type' => $request->input('insured_age_type'),
                'residence_card_no' => $request->input('residence_card_no'),
                // 'stay_date_period' => $this->formatDate($request->input('stay_date_period')),
                'residential_status_id' => $request->input('residential_status_id'),
                'residential_status_unknown_reason' => $request->input('residential_status_unknown_reason'),
                'unauthorized_activities_permission_flg' => $request->input('unauthorized_activities_permission_flg'),
                'mynumber_card_no' => $request->input('mynumber_card_no'),
                'social_insurance_no' => $request->input('social_insurance_no'),
                'pension_office_no' => $request->input('pension_office_no'),
                // 'pension_office_reference_no' => $request->input('pension_office_reference_no'),
                'pension_no' => $request->input('pension_no'),
                'labor_insurance_type' => $request->input('labor_insurance_type'),
                'employment_insurance_type' => $request->input('employment_insurance_type'),
                'insurance_office_no' => $request->input('insurance_office_no'),
                'insurance_office_reference_no' => $request->input('insurance_office_reference_no'),
                'employment_insurance_office_no' => $request->input('employment_insurance_office_no'),
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
                'retired_reason_type' => $request->input('retired_reason_type'),
                'insurance_loss_reason' => $request->input('insurance_loss_reason'),
                'over_retired_insurance_loss_reason' => $request->input('over_retired_insurance_loss_reason'), // developにない
                // 'over_70_non_applicable_flg' => $request->input('over_70_non_applicable_flg'), // developにない
                'passed_away_date' => $this->formatDate($request->input('passed_away_date')),
                //'personal_information_access_flg' => $request->input('personal_information_access_flg'),
                //'personal_information_access_flg_tmsp' => $request->input('personal_information_access_flg_tmsp'),
                'external_advisor_flg' => $request->input('external_advisor_flg'),
                'occupation_type' => $request->input('occupation_type'),
                //'employment_route' => $request->input('employment_route'),
                //'insured_reason' => $request->input('insured_reason'),
                //'insured_reason_details' => $request->input('insured_reason_details'),
                //'currency_id' => $request->input('currency_id'),
                //'salary_payment_system' => $request->input('salary_payment_system'),
                // 'caregiver_leave_benefit_receive_bank_id' => $request->input('caregiver_leave_benefit_receive_bank_id'),// developにない
                // 'japan_post_bank_code_no' => $request->input('japan_post_bank_code_no'),// developにない
                // 'japan_post_bank_account_no' => $request->input('japan_post_bank_account_no'),// developにない
                // 'bank_account_no' => $request->input('bank_account_no'),// developにない
                'employment_type' => $request->input('employment_type'),
                'employment_status' => $request->input('employment_status'),
                'employer_type' => $request->input('employer_type'),
                'employment_start_date' => $this->formatDate($request->input('employment_start_date')),
                'employment_end_date' => $this->formatDate($request->input('employment_end_date')),
            ])->id;

            $departments = $request->input('departments', []);
            foreach ($departments as $dep) {
                Employee_department::insert([
                    'department_id' => $dep,
                    'employee_id' => $employee_id
                ]);
            }

            Employee::where('id', $employee_id)->update(['role_id' => 100]);

            $data = [
                'name' => $request->input('last_name') . ' ' . $request->input('first_name'),
                'email' => $request->input('user_email'),
                'password' => Hash::make($request->input('user_pass')),
                'employee_id' => $employee_id
            ];

            User::create($data);

            DB::commit();
            $this->putSuccess($request);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);
            return back()->withErrors('エラー');
        }
        return redirect()->route('admin.labor');
    }

    public function employee_update(Request $request, $id)
    {
        $employee = Employee::where('id', $id)->where('delete_flg', 0)->first();
        $branch = $employee->branch()->first();
        $company = $branch->company()->first();

        $employee->company_name = $company->name;
        $employee->company_id = $company->id;
        $employee->branch_name = $branch->name;

        $employee_type = Values_employee_employee_type::pluck('name', 'id');
        $sex_type = Values_sex::pluck('name', 'id');
        $prefectures = Prefecture::pluck('name', 'id');
        $country_type = Country::pluck('country_name', 'id');
        $employee_status_type = Values_employee_employee_status::pluck('name', 'id');
        $labor_insurance_type = Values_employee_labor_insurance_type::pluck('name', 'id');
        $employment_insurance_type = Values_employee_employment_insurance_type::pluck('name', 'id');
        $insurance_loss_reason = Values_employee_insurance_loss_reason::pluck('name', 'id');
        $over_retired_insurance_loss_reason = Values_employee_over_retired_insurance_loss_reason::pluck('name', 'id');
        $occupation_type = Values_employee_occupation_type::pluck('name', 'id');
        $departments = Employee_department::where('employee_id', $id)->where('delete_flg', 0)->pluck('department_id');

        return view('admin.employee_create', [
            'employee' => $employee,
            'departments' => $departments,
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
            'occupation_type' => $occupation_type
        ]);
    }

    public function employee_update_post(AdminEmployeeUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            Employee::where('id', $request->input('employee_id'))
                ->update([
                    'employee_no' => $request->input('employee_no'),
                    'branch_id' => $request->input('branch_id'),
                    'managerial_position_id' => $request->input('managerial_position_id'),
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
                    'birthday' => $this->formatDate($request->input('birthday')),
                    'post_code' => $request->input('post_code'),
                    'address_prefecture' => $request->input('address_prefecture'),
                    'address_city' => $request->input('address_city'),
                    'address_ward' => $request->input('address_ward'),
                    'address_apartment' => $request->input('address_apartment'),
                    // 'address_prefecture_kana' => $request->input('address_prefecture_kana'),developがint
                    'address_city_kana' => $request->input('address_city_kana'),
                    'address_ward_kana' => $request->input('address_ward_kana'),
                    'address_apartment_kana' => $request->input('address_apartment_kana'),
                    'tel_area_code' => $request->input('tel_area_code'),
                    'tel_city_code' => $request->input('tel_city_code'),
                    'tel_subscriber_code' => $request->input('tel_subscriber_code'),
                    'fax' => $request->input('fax'),
                    'mail_address1' => $request->input('mail_address1'),
                    'mail_address2' => $request->input('mail_address2'),
                    'emergency_contact1' => $request->input('emergency_contact1'),
                    'emergency_relationship1' => $request->input('emergency_relationship1'),
                    'emergency_tel1' => $request->input('emergency_tel1'),
                    'emergency_address_prefecture1' => $request->input('emergency_address_prefecture1'),
                    'emergency_address_city1' => $request->input('emergency_address_city1'),
                    'emergency_address_ward1' => $request->input('emergency_address_ward1'),
                    'emergency_address_apartment1' => $request->input('emergency_address_apartment1'),
                    'emergency_contact2' => $request->input('emergency_contact2'),
                    'emergency_relationship2' => $request->input('emergency_relationship2'),
                    'emergency_tel2' => $request->input('emergency_tel2'),
                    'emergency_address_prefecture2' => $request->input('emergency_address_prefecture2'),
                    'emergency_address_city2' => $request->input('emergency_address_city2'),
                    'emergency_address_ward2' => $request->input('emergency_address_ward2'),
                    'emergency_address_apartment2' => $request->input('emergency_address_apartment2'),
                    'spouse_flg' => $request->input('spouse_flg'),
                    'dependent_flg' => $request->input('dependent_flg'),
                    'dependent_family_number' => $request->input('dependent_family_number'),
                    'country_id' => $request->input('country_id'),
                    'salary_notices' => $request->input('salary_notices'),
                    'insured_age_type' => $request->input('insured_age_type'),
                    'residence_card_no' => $request->input('residence_card_no'),
                    // 'stay_date_period' => $this->formatDate($request->input('stay_date_period')),
                    'residential_status_id' => $request->input('residential_status_id'),
                    'residential_status_unknown_reason' => $request->input('residential_status_unknown_reason'),
                    'unauthorized_activities_permission_flg' => $request->input('unauthorized_activities_permission_flg'),
                    'mynumber_card_no' => $request->input('mynumber_card_no'),
                    'social_insurance_no' => $request->input('social_insurance_no'),
                    'pension_office_no' => $request->input('pension_office_no'),
                    //'pension_office_reference_no' => $request->input('pension_office_reference_no'),
                    'pension_no' => $request->input('pension_no'),
                    'labor_insurance_type' => $request->input('labor_insurance_type'),
                    'employment_insurance_type' => $request->input('employment_insurance_type'),
                    'insurance_office_no' => $request->input('insurance_office_no'),
                    'insurance_office_reference_no' => $request->input('insurance_office_reference_no'),
                    'employment_insurance_office_no' => $request->input('employment_insurance_office_no'),
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
                    'retired_reason_type' => $request->input('retired_reason_type'),
                    'insurance_loss_reason' => $request->input('insurance_loss_reason'),
                    'over_retired_insurance_loss_reason' => $request->input('over_retired_insurance_loss_reason'), // developにない
                    //'over_70_non_applicable_flg' => $request->input('over_70_non_applicable_flg'), // developにない
                    'passed_away_date' => $this->formatDate($request->input('passed_away_date')),
                    //'personal_information_access_flg' => $request->input('personal_information_access_flg'),
                    //'personal_information_access_flg_tmsp' => $request->input('personal_information_access_flg_tmsp'),
                    'external_advisor_flg' => $request->input('external_advisor_flg'),
                    'occupation_type' => $request->input('occupation_type'),
                    //'employment_route' => $request->input('employment_route'),
                    //'insured_reason' => $request->input('insured_reason'),
                    //'insured_reason_details' => $request->input('insured_reason_details'),
                    //'currency_id' => $request->input('currency_id'),
                    //'salary_payment_system' => $request->input('salary_payment_system'),
                    // 'caregiver_leave_benefit_receive_bank_id' => $request->input('caregiver_leave_benefit_receive_bank_id'),// developにない
                    // 'japan_post_bank_code_no' => $request->input('japan_post_bank_code_no'),// developにない
                    // 'japan_post_bank_account_no' => $request->input('japan_post_bank_account_no'),// developにない
                    // 'bank_account_no' => $request->input('bank_account_no'),// developにない
                    'employment_type' => $request->input('employment_type'),
                    'employment_status' => $request->input('employment_status'),
                    'employer_type' => $request->input('employer_type'),
                    'employment_start_date' => $this->formatDate($request->input('employment_start_date')),
                    'employment_end_date' => $this->formatDate($request->input('employment_end_date')),
                ]);

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

            DB::commit();
            $this->putSuccess($request);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);
            return back()->withErrors('エラー');
        }
        return redirect()->route('admin.labor');
    }

    public function get_departments(Request $request)
    {
        $departments = Department::select('id', 'name')->where('company_id', $request->input('company_id'))->where('delete_flg', 0)->get();
        return response()->json($departments);
    }
}
