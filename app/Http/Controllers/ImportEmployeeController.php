<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportEmployeeRequest;
use App\Models\Attendance;
use App\Models\CurrentUser;
use App\Models\Employee;
use App\Models\AttendanceColumns;
use App\Models\Branch;
use App\Models\Country;
use App\Models\Department;
use App\Models\Employee_department;
use App\Models\Employee_qualifications;
use App\Models\EmployeeColumns;
use App\Models\Managerial_position;
use App\Models\Prefecture;
use App\Models\Qualifications;
use App\Models\Residential_status;
use App\Models\Values_employee_employee_status;
use App\Models\Values_employee_employee_type;
use App\Models\Values_employee_employment_insurance_type;
use App\Models\Values_employee_employment_route;
use App\Models\Values_employee_employment_status;
use App\Models\Values_employee_enrollment_category;
use App\Models\Values_employee_insurance_loss_reason;
use App\Models\Values_employee_insured_age_type;
use App\Models\Values_employee_labor_insurance_type;
use App\Models\Values_employee_occupation_type;
use App\Models\Values_employee_over_retired_insurance_loss_reason;
use App\Models\Values_employee_pay_type;
use App\Models\Values_employee_recruitment_category_detail;
use App\Models\Values_employee_work_category;
use App\Models\Values_sex;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ImportEmployeeController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission();
            if (!$userPermission->isSelectedCompany() || $userPermission->getEmployeeStatus() == 1 || !$userPermission->isBasicDepartment()) {
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(6) || !$userPermission->isWritableFor(6)) {
            return redirect()->route('home.index');
        }

        return view('employee.upload-employees');
    }

    public function column_data(Request $request)
    {
        $EmployeeColumns = EmployeeColumns::get();
        $map = [];
        foreach ($EmployeeColumns->toArray() as $column) {
            $map[$column['key']] = $column;
        }

        $currentCompany = CurrentUser::CurrentCompany();
        $branch = $currentCompany->branch()->select('id', 'name')->where('delete_flg', 0)->get()->pluck('name', 'id');
        $branch_ids = $currentCompany->branch()->select('id')->where('delete_flg', 0)->get()->pluck('id')->toArray();
        $employees = Employee::select('employee_no')->where('delete_flg', 0)->whereIn('branch_id', $branch_ids)->get()->pluck('employee_no')->toArray();
        $currentCompany = CurrentUser::CurrentCompany();

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
        //$departments = Employee_department::where('employee_id', $id)->where('delete_flg', 0)->pluck('department_id');
        $departments_list = Department::select('id', 'name')->where('company_id', $currentCompany->id)->where('delete_flg', 0)->get();
        $managerial_position_list = Managerial_position::where('company_id', $currentCompany->id)->where('delete_flg', 0)->get();
        $residential_status = Residential_status::pluck('content', 'id');
        $employee_insured_age_type = Values_employee_insured_age_type::pluck('name', 'id');
        //$dependent = $employee->dependent()->where('delete_flg', 0)->orderByRaw('spouse_flag DESC')->orderBy('history_flg', 'desc')->get();
        $qualifications = Qualifications::select('id', 'qualification_name')->where('company_id', $currentCompany->id)->where('delete_flg', 0)->get();
        $employee_qualifications = Employee_qualifications::join('m_qualifications', 'm_employee_qualifications.qualifications_id', '=', 'm_qualifications.id')
            ->where('m_employee_qualifications.employee_id', $currentCompany->id)
            ->where('m_qualifications.delete_flg', 0)
            ->where('m_employee_qualifications.delete_flg', 0)
            ->pluck('m_qualifications.id');

        $work_category = Values_employee_work_category::pluck('name', 'id');
        $enrollment_category = Values_employee_enrollment_category::pluck('name', 'id');
        $employment_route = Values_employee_employment_route::pluck('name', 'id');
        $recruitment_category_detail = Values_employee_recruitment_category_detail::pluck('name', 'id');
        $employment_status = Values_employee_employment_status::pluck('name', 'id');
        $pay_type = Values_employee_pay_type::pluck('name', 'id');

        return response()->json([
            'columns_map' => $map,
            'branch' => $branch,
            'employees' => $employees,
            //'departments' => $departments,
            'departments_list' => $departments_list,
            'managerial_position_list' => $managerial_position_list,
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
            'residential_status' => $residential_status,
            'employee_insured_age_type' => $employee_insured_age_type,
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

    public function upload(ImportEmployeeRequest $request)
    {

        $data = $request->input('data', []);
        $success = 0;
        DB::beginTransaction();
        try {
            $userPermission = new Permission();
            if (!$userPermission->isReadableFor(19) || !$userPermission->isWritableFor(19)) {
                throw new \Exception('permission error');
            }

            $currentCompany = CurrentUser::CurrentCompany();

            foreach ($data as $key => $item) {

                // 従業員番号が既にあればスキップ
                $employee_no = $item['employee_no'];
                $emp = $currentCompany->employees()->where('employee_no', $employee_no)->where('delete_flg', 0)->first();
                if (!empty($emp)) {
                    continue;
                }


                $branch = Branch::select('id')->where('company_id', $currentCompany->id)->where('delete_flg', 0)->first();
                if (empty($branch)) {
                    continue;
                }

                $relation_data = [
                    'branch_id' => $item['branch_name'],
                ];

                // remove ununsed

                unset($item['id']);
                unset($item['branch_name']);
                unset($item['managerial_position_name']);

                $created_data = array_merge($item, $relation_data);
                Employee::create($created_data);
            }

            DB::commit();
            $success = 1;
        } catch (\Exception $err) {
            DB::rollback();
            \Log::error($err->getMessage());
            $success = 0;
            return response()->json([
                'result' => $success
            ], 500);
        }

        return response()->json([
            'result' => $success
        ]);
    }
}
