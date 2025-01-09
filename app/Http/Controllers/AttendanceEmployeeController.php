<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceColumns;
use App\Models\AttendanceFilterConfig;
use App\Models\CurrentUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Permission;

use Illuminate\Support\Facades\DB;

class AttendanceEmployeeController extends Controller
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

    public function attendances(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(19)) {
            return redirect()->route('home.index');
        }

        $current_company = CurrentUser::currentCompany();
        $branch_list = Attendance::select('branch_name')->where('company_id', $current_company->id)->where('delete_flg', 0)->distinct()->pluck('branch_name');
        $departments = Attendance::select('departments')->where('company_id', $current_company->id)->where('delete_flg', 0)->distinct()->pluck('departments');
        $employment_type = Attendance::select('employment_type')->where('company_id', $current_company->id)->where('delete_flg', 0)->distinct()->pluck('employment_type');
        $work_type = Attendance::select('work_type')->where('company_id', $current_company->id)->where('delete_flg', 0)->distinct()->pluck('work_type');

        $departments = array_reduce(
            array_map(fn($item) => explode(', ', $item), $departments->toArray()),
            'array_merge',
            []
        );

        return view('employee.attendances', [
            'branch_list' => $branch_list,
            'departments' => $departments,
            'employment_type' => $employment_type,
            'work_type' => $work_type
        ]);
    }

    public function attendance_list(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(19)) {
            return response()->json([
                'columns_map' => [],
                'data' => []
            ]);
        }

        $conditions = [
            'attendance_year_from' => $request->input('attendance_year_from'),
            'attendance_month_from' => $request->input('attendance_month_from', null),
            'attendance_year_to' => $request->input('attendance_year_to'),
            'attendance_month_to' => $request->input('attendance_month_to', null),
            'attendance_full_name' => $request->input('attendance_full_name', null),
            'attendance_branch' => $request->input('attendance_branch', null),
            'attendance_department' => $request->input('attendance_department', null),
            'employment_type' => $request->input('employment_type', null),
            'work_type' => $request->input('work_type', null)
        ];

        $current_company = CurrentUser::currentCompany();
        $attendance = Attendance::where('company_id', $current_company->id);
        list($attendance) = $this->attendance_condition($attendance, $conditions);

        $data = $attendance->get()->toArray();

        foreach ($data as &$item) {
            // 期待するキーの順序を持つテンプレートを作成
            $sortedItem = array_fill_keys($this->attendance_keys(), null);

            // 元のデータをテンプレートにマージ
            $item = array_merge($sortedItem, $item);
        }

        return response()->json([
            'columns_map' => $this->column_map(),
            'data' => $data
        ]);
    }

    public function attendance_post(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isWritableFor(19)) {
            return response()->json(['result' => 0]);
        }

        $validated = $request->validate([
            'change_name' => 'array|nullable',
            'conditions' => 'array|nullable',
            'remove_name' => 'array|nullable',
            'column' => 'array|nullable',
        ]);

        $current_company = CurrentUser::currentCompany();
        $columns = $request->input('column');
        $condition_data = $request->input('conditions');

        $success = 1;
        DB::beginTransaction();
        try {
            foreach ($columns as $id => $values) {
                Attendance::where('company_id', $current_company->id)
                    ->where('id', $id)
                    ->update($values);
            }
            DB::commit();
        } catch (\Exception $err) {
            DB::rollback();
            \Log::error($err->getMessage());
            $success = 0;
        }
        return response()->json(['result' => $success]);
    }

    public function attendance_filter_load(Request $request)
    {
        $current_company = CurrentUser::currentCompany();
        $current_user = CurrentUser::info();
        $data = AttendanceFilterConfig::select('data')->where('company_id', $current_company->id)
            ->where('employee_id', $current_user->id)
            ->where('delete_flg', 0)
            ->first();

        return response()->json($data);
    }

    public function attendance_filter_save(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isWritableFor(19)) {
            return response()->json(['result' => 0]);
        }

        DB::beginTransaction();
        try {
            $current_company = CurrentUser::currentCompany();
            $current_user = CurrentUser::info();

            $data = [
                'attendance_year_from' => $request->input('attendance_year_from'),
                'attendance_month_from' => $request->input('attendance_month_from', null),
                'attendance_year_to' => $request->input('attendance_year_to'),
                'attendance_month_to' => $request->input('attendance_month_to', null),
                'attendance_full_name' => $request->input('attendance_full_name', null),
                'attendance_branch' => $request->input('attendance_branch', null),
                'attendance_department' => $request->input('attendance_department', null),
                'employment_type' => $request->input('employment_type', null),
                'work_type' => $request->input('work_type', null),
                'show_list' => []
            ];

            $show_list_array = AttendanceColumns::select('key')
                ->where('show', 0)
                ->where('delete_flg', 0)
                ->orderBy('order')
                ->get()->pluck('key')->toArray();

            $show_list = [];
            foreach ($show_list_array as $k => $key) {
                if ($request->input('show-' . $key, null)) {
                    $show_list[$key] = 1;
                }
            }

            $data['show_list'] = $show_list;
            $json_data = json_encode($data);

            $filter_config = AttendanceFilterConfig::where('company_id', $current_company->id)
                ->where('employee_id', $current_user->id);

            if ($filter_config->exists()) {
                $filter_config->update([
                    'company_id' => $current_company->id,
                    'employee_id' => $current_user->id,
                    'data' => $json_data,
                    'delete_flg' => 0
                ]);
            } else {
                AttendanceFilterConfig::create([
                    'company_id' => $current_company->id,
                    'employee_id' => $current_user->id,
                    'data' => $json_data
                ]);
            }

            DB::commit();
        } catch (\Exception $err) {
            DB::rollback();
            \Log::error($err->getMessage());
            return response()->json(['result' => 0]);
        }
        return response()->json(['result' => 1]);
    }

    public function attendance_filter_remove(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isWritableFor(19)) {
            return response()->json(['result' => 0]);
        }

        $current_company = CurrentUser::currentCompany();
        $current_user = CurrentUser::info();
        AttendanceFilterConfig::where('company_id', $current_company->id)
            ->where('employee_id', $current_user->id)
            ->update(['delete_flg' => 1]);
        return response()->json(['result' => 1]);
    }

    public function attendance_filter_showlist(Request $request)
    {
        $data = AttendanceColumns::select('key', 'name')->where('show', 0)->where('delete_flg', 0)->orderBy('order')->get()->toArray();
        return response()->json($data);
    }

    private function column_map()
    {
        $columns = AttendanceColumns::get();
        $map = [];
        foreach ($columns->toArray() as $column) {
            $map[$column['key']] = $column;
        }
        return $map;
    }

    private function attendance_keys()
    {
        $list = AttendanceColumns::select('key')->where('delete_flg', 0)->orderBy('order')->get()->pluck('key')->toArray();
        return $list;
    }

    private function attendance_condition($attendance, $conditions)
    {
        $current_company = CurrentUser::currentCompany();
        $start_day = $current_company->start_day_of_month ?? 1;
        $start_year = $conditions['attendance_year_from'] ?? Carbon::now()->year;
        $end_year = $conditions['attendance_year_to'];

        $start_date = null;
        if (!empty($conditions['attendance_month_from'])) {
            $start_month = $conditions['attendance_month_from'];
            $start_date = Carbon::create($start_year, $start_month, $start_day, 0, 0, 0);
        } else {
            $start_date = Carbon::create($start_year, 1, $start_day, 0, 0, 0);
        }

        $end_date = null;
        if (!empty($end_year)) {
            if (!empty($conditions['attendance_month_to'])) {
                $end_month = $conditions['attendance_month_to'];
                $end_date = Carbon::create($end_year, $end_month, $start_day, 23, 59, 59);
            } else {
                $end_date = Carbon::create($end_year, 1, $start_day, 23, 59, 59)->endOfMonth();
            }

            $attendance = $attendance->whereBetween('month', [
                $start_date->format('Y-m-d'),
                $end_date->format('Y-m-d'),
            ]);
        } else {
            $attendance = $attendance->where('month', '>=', $start_date->format('Y-m-d'));
        }

        if (!empty($conditions['attendance_full_name'])) {
            $str = $conditions['attendance_full_name'];
            $attendance = $attendance->where('employee_name', 'LIKE', "%$str%");
        }

        if (!empty($conditions['attendance_branch'])) {
            $str = $conditions['attendance_branch'];
            $attendance = $attendance->where('branch_name', 'LIKE', "%$str%");
        }
        if (!empty($conditions['attendance_department'])) {
            $str = $conditions['attendance_department'];
            $attendance = $attendance->where('departments', 'LIKE', "%$str%");
        }
        if (!empty($conditions['employment_type'])) {
            $str = $conditions['employment_type'];
            $attendance = $attendance->where('employment_type', 'LIKE', "%$str%");
        }
        if (!empty($conditions['work_type'])) {
            $str = $conditions['work_type'];
            $attendance = $attendance->where('work_type', 'LIKE', "%$str%");
        }

        return [$attendance];
    }
}
