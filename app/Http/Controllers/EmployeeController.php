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
use App\Models\Values_employee_insured_age_type;
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

        $currentCompany = CurrentUser::CurrentCompany();
        $division = $currentCompany->company_division;

        $paginate = [
            'page' => $request->input('page', 1),
            'limit' => 20,
            'search' => $request->input('search'),
        ];
        return view('employee.employees', compact('division'));
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
            if(!isset($filePath)) {
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
        $occupation_type = Values_employee_occupation_type::pluck('name', 'id');
        $departments = Employee_department::where('employee_id', $id)->where('delete_flg', 0)->pluck('department_id');
        $departments_list = Department::select('id', 'name')->where('company_id', $company->id)->where('delete_flg', 0)->get();
        $managerial_position_list = Managerial_position::where('company_id', $company->id)->where('delete_flg', 0)->get();
        $residential_status = Residential_status::pluck('content', 'id');
        $employee_insured_age_type = Values_employee_insured_age_type::pluck('name', 'id');
        $dependent = $employee->dependent()->where('delete_flg', 0)->get();

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
        ]);
    }

    public function employee_update_post(AdminEmployeeUpdateRequest $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(6) || !$userPermission->isWritableFor(6)) {
            return redirect()->route('home.index');
        }

        $fax = implode('-', [
            $request->input('fax1'),
            $request->input('fax2'),
            $request->input('fax3')
        ]);
        DB::beginTransaction();
        try {
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
                    'blood_type' => $request->input('blood_type'),
                    'qualifications' => $request->input('qualifications'),
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
                ]);
            $employee = Employee::find($request->input('employee_id'));
            $employee->update(['mynumber_card_no' => $request->input('mynumber_card_no')]);

            $deids = $request->input('de-id',[]);
            $excepts = [];
            foreach ($deids as $index => $deid) {
                $dedata = $this->data_dependent($data, $index, $request->input('employee_id'));
                if ($deid > 0) {
                    $dependent = Dependent::find($deid);
                    if ($dependent) {
                        $dependent->fill($dedata);
                        $dependent->save();
                    }
                    $excepts[] = $deid;
                } else {
                    $created_id = Dependent::create($dedata)->id;
                    $excepts[] = $created_id;
                }
            }
            Dependent::where('employee_id', $request->input('employee_id'))->whereNotIn('id', $excepts)->update(['delete_flg' => 1]);

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
            if($company_id && $employee_id) {
                if($icon_delete_flg === "1") {
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
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);
            return back()->withErrors('エラー');
        }
        return redirect()->route('employee');
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
        $input_date3 = $requestData['de-date_of_expiry'][$index];
        if (!is_null($input_date3) && strtotime($input_date3) === false) {
            $formatted_de_date_of_expiry = Carbon::createFromFormat('Y年n月j日', $input_date3)->format('Y-m-d');
        } else {
            $formatted_de_date_of_expiry = $input_date3;
        }

        return [
            'employee_id' => $id,
            'relationship_spouse' => $requestData['de-relationship_spouse'][$index] ?? null,
            'relationship_dependent' => $requestData['de-relationship_dependent'][$index] ?? null,
            'spouse_flag' => $requestData['de-spouse_flag'][$index] ?? null,
            'last_name' => $requestData['de-last_name'][$index],
            'first_name' => $requestData['de-first_name'][$index],
            'last_name_kana' => $requestData['de-last_name_kana'][$index],
            'first_name_kana' => $requestData['de-first_name_kana'][$index],
            'sex' => $requestData['de-sex'][$index],
            'age' => $requestData['de-age'][$index],
            'occupation' => $requestData['de-occupation'][$index],
            'annual_income' => $requestData['de-annual_income'][$index],
            'contact' => $requestData['de-contact'][$index],
            'dependent_type' => $requestData['de-dependent_type'][$index],
            'mynumber_card_no' => $requestData['de-mynumber_card_no'][$index],
            'pension_no' => $requestData['de-pension_no'][$index],
            'other_1' => $requestData['de-other_1'][$index],
            'other_2' => $requestData['de-other_2'][$index],
            'birthday' => $formatted_de_birthday,
            'date_of_authorisation' => $formatted_de_date_of_authorisation,
            'date_of_expiry' => $formatted_de_date_of_expiry,
        ];
    }
}
