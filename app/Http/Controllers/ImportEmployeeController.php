<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\CurrentUser;
use App\Models\Employee;
use App\Models\AttendanceColumns;
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
        $AttendanceColumns = AttendanceColumns::get();
        $map = [];
        foreach ($AttendanceColumns->toArray() as $column) {
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
            'data.*.month' => 'date|required'
        ]);

        $data = $request->input('data', []);
        $success = 0;
        DB::beginTransaction();
        try {
            $userPermission = new Permission();
            if (!$userPermission->isReadableFor(19) || !$userPermission->isWritableFor(19)) {
                throw new \Exception('permission error');
            }
            $currentCompany = CurrentUser::CurrentCompany();
            $employees = $currentCompany->employees()->select('id', 'employee_no', 'branch_id')->where('delete_flg', 0)->get();

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

                // remove ununsed

                unset($item['id']);

                $target_month = Carbon::create($item['month']);
                $target_from = $target_month->clone()->startOfMonth();
                $target_to = $target_month->clone()->endOfMonth();

                $exists = Attendance::where('employee_no', $employee_no)
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
                } else {
                    $created_data = array_merge($item, $relation_data);
                    $new_wage = Attendance::create($created_data);
                }
            }

            DB::commit();
            $success = 1;
        } catch (\Exception $err) {
            DB::rollback();
            \Log::error($err->getMessage());
            $success = 0;
        }

        return response()->json([
            'result' => $success
        ]);
    }
}
