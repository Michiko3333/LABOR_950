<?php

namespace App\Http\Controllers;

use App\Models\CurrentUser;
use App\Models\Employee;
use App\Models\Wage;
use App\Models\WageAllowance;
use App\Models\WageColumns;
use App\Models\WageOvertime;
use App\Models\WageSalary;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ImportWageController extends Controller
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
        if (!$userPermission->isReadableFor(17) || !$userPermission->isWritableFor(17)) {
            return redirect()->route('home.index');
        }

        return view('employee.upload-wages');
    }

    public function column_data(Request $request)
    {
        $WageColumns = WageColumns::get();
        $map = [];
        foreach ($WageColumns->toArray() as $column) {
            $map[$column['key']] = $column;
        }

        $currentCompany = CurrentUser::CurrentCompany();
        $branch_ids = $currentCompany->branch()->select('id')->where('delete_flg', 0)->get()->pluck('id')->toArray();
        $employees = Employee::select(
            'm_employee.employee_no',
            'm_employee.last_name',
            'm_employee.first_name',
            'm_branch.name as branch_name'
        )
            ->leftJoin('m_branch', 'm_branch.id', '=', 'm_employee.branch_id')
            ->whereIn('m_employee.branch_id', $branch_ids)
            ->where('m_employee.delete_flg', 0)->get();

        return response()->json([
            'columns_map' => $map,
            'employees' => $employees
        ]);
    }

    public function upload(Request $request)
    {
        $validated = $request->validate([
            'data' => 'array|required',
            'data.*.employee_no' => 'string|required',
            'data.*.employee_name' => 'string|required',
            'data.*.branch_name' => 'string|required',
            'data.*.employment_type' => 'string|required',
            'data.*.month' => 'date|required',
            'data.*.wage_base_amount' => 'integer|required',
        ]);

        $data = $request->input('data', []);
        $success = 0;
        DB::beginTransaction();
        try {
            $userPermission = new Permission();
            if (!$userPermission->isReadableFor(17) || !$userPermission->isWritableFor(17)) {
                throw new \Exception('permission error');
            }
            $currentCompany = CurrentUser::CurrentCompany();
            $employees = $currentCompany->employees()->select('id', 'employee_no', 'branch_id')->where('delete_flg', 0)->get();

            $created_at = (new Carbon())->format('Y-m-d H:i:s');

            foreach ($data as $key => $item) {
                $employee_no = $item['employee_no'];
                $emp = $employees->where('employee_no', $employee_no)->first();
                if (empty($emp)) {
                    continue;
                }

                $relation_data = [
                    'company_id' => $currentCompany->id,
                    'branch_id' => $emp->branch_id,
                    'employee_id' => $emp->id,
                ];

                $salary_values = $item['salary_values'];
                $overtime_values = $item['overtime_values'];
                $allowance_values = $item['allowance_values'];

                unset($item['salary_values']);
                unset($item['overtime_values']);
                unset($item['allowance_values']);

                // remove ununsed
                unset($item['labor_insurance_target']);
                unset($item['social_insurance_target']);
                unset($item['id']);

                $target_month = Carbon::create($item['month']);
                $target_from = $target_month->clone()->startOfMonth();
                $target_to = $target_month->clone()->endOfMonth();

                $exists = Wage::where('employee_no', $employee_no)
                    ->where('company_id', $currentCompany->id)
                    ->where('delete_flg', 0)
                    ->whereBetween('month', [
                        $target_from->format('Y-m-d'),
                        $target_to->format('Y/m/d')
                    ]);

                if ($exists->exists()) {
                    $update_data = array_merge($item, $relation_data);
                    $w = $exists->first();
                    $w->update($update_data);

                    WageSalary::where('wage_id', $w->id)->update(['delete_flg' => 1]);
                    WageOvertime::where('wage_id', $w->id)->update(['delete_flg' => 1]);
                    WageAllowance::where('wage_id', $w->id)->update(['delete_flg' => 1]);

                    foreach ($salary_values as $key => $amount) {
                        $amount = $amount ?? 0;
                        $q = ['company_id' => $currentCompany->id, 'wage_id' => $w->id, 'name' => $key];
                        WageSalary::updateOrCreate(
                            $q,
                            ['name' => $key, 'amount' => $amount, 'delete_flg' => 0]
                        );
                    }
                    foreach ($overtime_values as $key => $amount) {
                        $amount = $amount ?? 0;
                        $q = ['company_id' => $currentCompany->id, 'wage_id' => $w->id, 'name' => $key];
                        WageOvertime::updateOrCreate(
                            $q,
                            ['name' => $key, 'amount' => $amount, 'delete_flg' => 0]
                        );
                    }
                    foreach ($allowance_values as $key => $amount) {
                        $amount = $amount ?? 0;
                        $q = ['company_id' => $currentCompany->id, 'wage_id' => $w->id, 'name' => $key];
                        WageAllowance::updateOrCreate(
                            $q,
                            ['name' => $key, 'amount' => $amount, 'delete_flg' => 0]
                        );
                    }
                } else {
                    $created_data = array_merge($item, $relation_data);
                    $new_wage = Wage::create($created_data);
                    $salary = [];
                    $overtime = [];
                    $allowance = [];
                    foreach ($salary_values as $key => $amount) {
                        $amount = $amount ?? 0;
                        $q = ['company_id' => $currentCompany->id, 'wage_id' => $new_wage->id, 'name' => $key, 'amount' => $amount];
                        $salary[] = $q;
                    }
                    if (!empty($salary)) WageSalary::insert($salary);

                    foreach ($overtime_values as $key => $amount) {
                        $amount = $amount ?? 0;
                        $q = ['company_id' => $currentCompany->id, 'wage_id' => $new_wage->id, 'name' => $key, 'amount' => $amount];
                        $overtime[] = $q;
                    }
                    if (!empty($overtime)) WageOvertime::insert($overtime);

                    foreach ($allowance_values as $key => $amount) {
                        $amount = $amount ?? 0;
                        $q = ['company_id' => $currentCompany->id, 'wage_id' => $new_wage->id, 'name' => $key, 'amount' => $amount, 'created_at' => $created_at];
                        $allowance[] = $q;
                    }
                    if (!empty($allowance)) WageAllowance::insert($allowance);
                }
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
