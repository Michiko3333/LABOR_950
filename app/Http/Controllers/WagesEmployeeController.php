<?php

namespace App\Http\Controllers;

use App\Livewire\FilterColumn;
use App\Models\CurrentUser;
use App\Models\FilterEmployeeList;
use App\Models\UserFilterEmployeeList;
use App\Models\Wage;
use App\Models\WageAllowance;
use App\Models\WageColumns;
use App\Models\WageFilterConfig;
use App\Models\WageInsuranceColumn;
use App\Models\WageOvertime;
use App\Models\WageSalary;
use App\Permission;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class WagesEmployeeController extends Controller
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
        if (!$userPermission->isReadableFor(18) || !$userPermission->isWritableFor(18)) {
            return redirect()->route('home.index');
        }

        $currentUser = CurrentUser::info();
        $currentCompany = CurrentUser::CurrentCompany();
        $division = $currentCompany->company_division;

        $paginate = [
            'page' => $request->input('page', 1),
            'limit' => 20,
            'search' => $request->input('search'),
        ];

        $columnList = FilterEmployeeList::select('name', 'value');

        if ($userPermission->isBasicDepartment()) {
            $columnList = $columnList->where('hidden_basic_department', 0);
        }

        $masterColumnList = $columnList->orderBy('order')->get()->toArray();
        $userDefaultList = [];
        $userList = UserFilterEmployeeList::select('value')->where('delete_flg', 0)->where('employee_id', $currentUser->id)->orderBy('order')->get()->pluck('value')->toArray();
        if (count($userList) > 0) {
            foreach ($userList as $key => $value) {
                $key = array_search($value, array_column($masterColumnList, 'value'));
                $userDefaultList[] = $masterColumnList[$key];
            }
        } else {
            $defaultList = $columnList->where('hidden_default', 0)->orderBy('order')->get()->toArray();
            $userDefaultList = $defaultList;
        }

        return view('employee.wages-employees-ledger', ['division' => $division, 'columnList' => $masterColumnList, 'defaultList' => $userDefaultList]);
    }

    public function select(Request $request)
    {
        $validated = $request->validate([
            'selected' => 'array|required',
            'selected.*' => 'int',
        ]);

        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(18) || !$userPermission->isWritableFor(18)) {
            return redirect()->route('home.index');
        }

        $employee_ids = $request->input('selected', []);
        return view('employee.wages-employees-ledger-edit', ['employee_ids' => $employee_ids]);
    }

    public function wages(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(17)) {
            return redirect()->route('home.index');
        }

        $current_company = CurrentUser::currentCompany();
        $branch_list = Wage::select('branch_name')->where('company_id', $current_company->id)->where('delete_flg', 0)->distinct()->pluck('branch_name');
        $departments = Wage::select('departments')->where('company_id', $current_company->id)->where('delete_flg', 0)->distinct()->pluck('departments');
        $employment_type = Wage::select('employment_type')->where('company_id', $current_company->id)->where('delete_flg', 0)->distinct()->pluck('employment_type');
        $work_type = Wage::select('work_type')->where('company_id', $current_company->id)->where('delete_flg', 0)->distinct()->pluck('work_type');
        $grade = Wage::select('grade')->where('company_id', $current_company->id)->where('delete_flg', 0)->distinct()->pluck('grade');
        $gradational_salary = Wage::select('gradational_salary')->where('company_id', $current_company->id)->where('delete_flg', 0)->distinct()->pluck('gradational_salary');
        $other_type = Wage::select('other_type')->where('company_id', $current_company->id)->where('delete_flg', 0)->distinct()->pluck('other_type');

        $departments = array_reduce(
            array_map(fn($item) => explode(', ', $item), $departments->toArray()),
            'array_merge',
            []
        );

        return view('employee.wages', [
            'branch_list' => $branch_list,
            'departments' => $departments,
            'employment_type' => $employment_type,
            'work_type' => $work_type,
            'grade' => $grade,
            'gradational_salary' => $gradational_salary,
            'other_type' => $other_type
        ]);
    }

    public function wages_list(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(17)) {
            return response()->json([
                'columns_map' => [],
                'salary_columns' => [],
                'allowance_columns' => [],
                'overtime_columns' => [],
                'data' => []
            ]);
        }
        $cond_target = $request->input('cond_target', []);
        $cond_amount = $request->input('cond_amount', []);
        $cond_comparison = $request->input('cond_comparison', []);
        $details = [];
        foreach ($cond_target as $k => $target) {
            $amount = $cond_amount[$k];
            $comparison = $cond_comparison[$k];
            $details[] = [
                'name' => $target,
                'amount' => $amount,
                'comparison' => $comparison
            ];
        }
        $conditions = [
            'wage_year' => $request->input('wage_year'),
            'wage_month' => $request->input('wage_month', null),
            'wage_branch' => $request->input('wage_branch', null),
            'wage_department' => $request->input('wage_department', null),
            'employment_type' => $request->input('employment_type', null),
            'work_type' => $request->input('work_type', null),
            'grade' => $request->input('grade', null),
            'gradational_salary' => $request->input('gradational_salary', null),
            'other_type' => $request->input('other_type', null),
            'details' => $details
        ];

        $current_company = CurrentUser::currentCompany();
        $wage = Wage::where('company_id', $current_company->id);
        // 絞り込み条件を適用
        list($wage, $conds) = $this->wage_condition($wage, $conditions);
        $wage = $wage->with([
            'salary' => function ($query) {
                $query->where('delete_flg', 0);
            },
            'allowance' => function ($query) {
                $query->where('delete_flg', 0);
            },
            'overtime' => function ($query) {
                $query->where('delete_flg', 0);
            }
        ])->get();

        // 可変項目の詳細条件でフィルタリング
        $wage = $this->wage_detail_filter($wage, $conds);

        // Collectionを配列化
        $data = array_values($wage->toArray());

        // カラム取り出し、マッピング処理
        $salary_columns = [];
        $allowance_columns = [];
        $overtime_columns = [];
        foreach ($data as &$item) {
            $item['salary_values'] = [];
            $item['allowance_values'] = [];
            $item['overtime_values'] = [];

            if (!empty($item['salary'])) {
                foreach ($item['salary'] as $salary) {
                    $salary_columns[$salary['name']] = true;
                    $item['salary_values'][$salary['name']] = $salary;
                }
            }

            if (!empty($item['allowance'])) {
                foreach ($item['allowance'] as $allowance) {
                    $allowance_columns[$allowance['name']] = true;
                    $item['allowance_values'][$allowance['name']] = $allowance;
                }
            }

            if (!empty($item['overtime'])) {
                foreach ($item['overtime'] as $overtime) {
                    $overtime_columns[$overtime['name']] = true;
                    $item['overtime_values'][$overtime['name']] = $overtime;
                }
            }
            unset($item['salary'], $item['allowance'], $item['overtime']);
        }

        // カラム確定
        $salary_columns = array_keys($salary_columns);
        $allowance_columns = array_keys($allowance_columns);
        $overtime_columns = array_keys($overtime_columns);

        // 全データに対して欠損分を埋める
        foreach ($data as &$item) {
            foreach ($salary_columns as $salary_name) {
                if (!isset($item['salary_values'][$salary_name])) {
                    $item['salary_values'][$salary_name] = [
                        'id' => null,
                        'name' => $salary_name,
                        'amount' => null,
                        'type' => 0
                    ];
                }
            }
            foreach ($allowance_columns as $allowance_name) {
                if (!isset($item['allowance_values'][$allowance_name])) {
                    $item['allowance_values'][$allowance_name] = [
                        'id' => null,
                        'name' => $allowance_name,
                        'amount' => null,
                        'type' => 0
                    ];
                }
            }

            foreach ($overtime_columns as $overtime_name) {
                if (!isset($item['overtime_values'][$overtime_name])) {
                    $item['overtime_values'][$overtime_name] = [
                        'id' => null,
                        'name' => $overtime_name,
                        'amount' => null,
                        'type' => 0
                    ];
                }
            }
        }

        // キーソート
        foreach ($data as &$item) {
            // 期待するキーの順序を持つテンプレートを作成
            $sortedItem = array_fill_keys($this->wage_keys(), null);

            // 元のデータをテンプレートにマージ
            $item = array_merge($sortedItem, $item);
        }

        return response()->json([
            'columns_map' => $this->wage_map(),
            'salary_columns' => $salary_columns,
            'allowance_columns' => $allowance_columns,
            'overtime_columns' => $overtime_columns,
            'data' => $data
        ]);
    }

    public function wage_post(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isWritableFor(17)) {
            return response()->json(['result' => 0]);
        }

        $validated = $request->validate([
            'column' => 'array',
            'salary' => 'array',
            'allowance' => 'array',
            'overtime' => 'array',
            'change_name' => 'array',
            'remove_name' => 'array',
            'conditions' => 'array',
        ]);

        $current_company = CurrentUser::currentCompany();

        $columns = $request->input('column');
        $salaries = $request->input('salary');
        $allowances = $request->input('allowance');
        $overtimes = $request->input('overtime');

        $changes = $request->input('change_name');
        $removes = $request->input('remove_name');
        $condition_data = $request->input('conditions');

        $success = 1;
        DB::beginTransaction();
        try {
            foreach ($columns as $id => $values) {
                Wage::where('company_id', $current_company->id)
                    ->where('id', $id)
                    ->update($values);
            }

            foreach ($salaries as $wage_id => $values) {
                foreach ($values as $key => $v) {
                    $q = WageSalary::where('wage_id', $wage_id)->where('delete_flg', 0)->where('name', $key);
                    if ($q->exists()) {
                        $q->update(['amount' => $v]);
                    } else {
                        WageSalary::create([
                            'company_id' => $current_company->id,
                            'wage_id' => $wage_id,
                            'name' => $key,
                            'amount' => $v
                        ]);
                    }
                }
            }

            foreach ($overtimes as $wage_id => $values) {
                foreach ($values as $key => $v) {
                    $q = WageOvertime::where('wage_id', $wage_id)->where('delete_flg', 0)->where('name', $key);
                    if ($q->exists()) {
                        $q->update(['amount' => $v]);
                    } else {
                        WageOvertime::create([
                            'company_id' => $current_company->id,
                            'wage_id' => $wage_id,
                            'name' => $key,
                            'amount' => $v
                        ]);
                    }
                }
            }

            foreach ($allowances as $wage_id => $values) {
                foreach ($values as $key => $v) {
                    $q = WageAllowance::where('wage_id', $wage_id)->where('delete_flg', 0)->where('name', $key);
                    if ($q->exists()) {
                        $q->update(['amount' => $v]);
                    } else {
                        WageAllowance::create([
                            'company_id' => $current_company->id,
                            'wage_id' => $wage_id,
                            'name' => $key,
                            'amount' => $v
                        ]);
                    }
                }
            }

            $conditions = [
                'wage_year' => $condition_data['conditions']['wage_year'] ?? null,
                'wage_month' => $condition_data['conditions']['wage_month'] ?? null,
                'wage_branch' => $condition_data['conditions']['wage_branch'] ?? null,
                'wage_department' => $condition_data['conditions']['wage_department'] ?? null,
                'employment_type' => $condition_data['conditions']['employment_type'] ?? null,
                'work_type' => $condition_data['conditions']['work_type'] ?? null,
                'grade' => $condition_data['conditions']['grade'] ?? null,
                'gradational_salary' => $condition_data['conditions']['gradational_salary'] ?? null,
                'other_type' => $condition_data['conditions']['other_type'] ?? null,
                'details' => $condition_data['detail']
            ];

            $wage = Wage::where('company_id', $current_company->id);
            list($wage, $conds) = $this->wage_condition($wage, $conditions);
            $wage = $wage->with([
                'salary' => function ($query) {
                    $query->where('delete_flg', 0);
                },
                'allowance' => function ($query) {
                    $query->where('delete_flg', 0);
                },
                'overtime' => function ($query) {
                    $query->where('delete_flg', 0);
                }
            ])->get();
            $wage = $this->wage_detail_filter($wage, $conds);
            $target_ids = $wage->pluck('id');

            foreach ($removes as $key => $remove) {
                if ($remove['section'] == 'salary') {
                    WageSalary::whereIn('wage_id', $target_ids)
                        ->where('name', $remove['key'])
                        ->where('delete_flg', 0)
                        ->update(['delete_flg' => 1]);
                } else if ($remove['section'] == 'overtime') {
                    WageOvertime::whereIn('wage_id', $target_ids)
                        ->where('name', $remove['key'])
                        ->where('delete_flg', 0)
                        ->update(['delete_flg' => 1]);
                } else if ($remove['section'] == 'allowance') {
                    WageAllowance::whereIn('wage_id', $target_ids)
                        ->where('name', $remove['key'])
                        ->where('delete_flg', 0)
                        ->update(['delete_flg' => 1]);
                }
            }

            foreach ($changes as $key => $change) {
                if ($change['section'] == 'salary') {
                    WageSalary::whereIn('wage_id', $target_ids)
                        ->where('name', $change['key'])
                        ->where('delete_flg', 0)
                        ->update(['name' => $change['val']]);
                } else if ($change['section'] == 'overtime') {
                    WageOvertime::whereIn('wage_id', $target_ids)
                        ->where('name', $change['key'])
                        ->where('delete_flg', 0)
                        ->update(['name' => $change['val']]);
                } else if ($change['section'] == 'allowance') {
                    WageAllowance::whereIn('wage_id', $target_ids)
                        ->where('name', $change['key'])
                        ->where('delete_flg', 0)
                        ->update(['name' => $change['val']]);
                }
            }

            DB::commit();
        } catch (\Exception $err) {
            DB::rollback();
            \Log::error($err->getMessage());
            $success = 0;
        }

        return response()->json(['result' => $success]);
    }

    public function wage_filter_showlist(Request $request)
    {
        $data = WageColumns::select('key', 'name')->where('show', 0)->where('delete_flg', 0)->orderBy('order')->get()->toArray();
        return response()->json($data);
    }

    public function wage_filter_load(Request $request)
    {
        $current_company = CurrentUser::currentCompany();
        $current_user = CurrentUser::info();
        $data = WageFilterConfig::select('data')->where('company_id', $current_company->id)
            ->where('employee_id', $current_user->id)
            ->where('delete_flg', 0)
            ->first();

        return response()->json($data);
    }

    public function wage_filter_save(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isWritableFor(17)) {
            return response()->json(['result' => 0]);
        }
        DB::beginTransaction();
        try {
            $current_company = CurrentUser::currentCompany();
            $current_user = CurrentUser::info();
            $data = [
                'wage_year' => $request->input('wage_year', ''),
                'wage_month' => $request->input('wage_month', ''),
                'wage_type' => $request->input('wage_type', null),
                'wage_branch' => $request->input('wage_branch', ''),
                'wage_department' => $request->input('wage_department', ''),
                'employment_type' => $request->input('employment_type', ''),
                'work_type' => $request->input('work_type', ''),
                'grade' => $request->input('grade', ''),
                'gradational_salary' => $request->input('gradational_salary', ''),
                'other_type' => $request->input('other_type', ''),
                'conditions' => [],
                'show_list' => []
            ];

            $cond_target = $request->input('cond_target', []);
            $cond_amount = $request->input('cond_amount', []);
            $cond_comparison = $request->input('cond_comparison', []);
            foreach ($cond_target as $key => $target) {
                $data['conditions'][] = ['name' => $target, 'amount' => $cond_amount[$key], 'comparison' => $cond_comparison[$key]];
            }

            $show_list_array = WageColumns::select('key')
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

            $filter_config = WageFilterConfig::where('company_id', $current_company->id)
                ->where('employee_id', $current_user->id);

            if ($filter_config->exists()) {
                $filter_config->update([
                    'company_id' => $current_company->id,
                    'employee_id' => $current_user->id,
                    'data' => $json_data,
                    'delete_flg' => 0
                ]);
            } else {
                WageFilterConfig::create([
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

    public function wage_filter_remove(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isWritableFor(17)) {
            return response()->json(['result' => 0]);
        }
        $current_company = CurrentUser::currentCompany();
        $current_user = CurrentUser::info();
        WageFilterConfig::where('company_id', $current_company->id)
            ->where('employee_id', $current_user->id)
            ->update(['delete_flg' => 1]);
        return response()->json(['result' => 1]);
    }

    public function wage_insurance_get(Request $request)
    {
        $current_company = CurrentUser::currentCompany();
        $current_user = CurrentUser::info();
        $data = WageInsuranceColumn::select('keys', 'type')->where('company_id', $current_company->id)
            ->where('employee_id', $current_user->id)
            ->where('delete_flg', 0)
            ->get();

        return response()->json($data);
    }

    public function wage_insurance_save(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isWritableFor(17)) {
            return response()->json(['result' => 0]);
        }

        $validated = $request->validate([
            'labor' => 'array|required',
            'social' => 'array|required',
        ]);

        $current_company = CurrentUser::currentCompany();
        $current_user = CurrentUser::info();

        DB::beginTransaction();
        try {
            $labor = $request->input('labor');
            $social = $request->input('social');
            $query = WageInsuranceColumn::where('company_id', $current_company->id)
                ->where('employee_id', $current_user->id)
                ->where('delete_flg', 0);

            if ($query->where('type', 0)->exists()) {
                $query->where('type', 0)->update([
                    'keys' => implode(',', $labor)
                ]);
            } else {
                $query->create([
                    'company_id' => $current_company->id,
                    'employee_id' => $current_user->id,
                    'type' => 0,
                    'keys' => implode(',', $labor)
                ]);
            }
            if ($query->where('type', 1)->exists()) {
                $query->where('type', 1)->update([
                    'keys' => implode(',', $social)
                ]);
            } else {
                $query->create([
                    'company_id' => $current_company->id,
                    'employee_id' => $current_user->id,
                    'type' => 1,
                    'keys' => implode(',', $social)
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

    private function wage_keys()
    {
        $list = WageColumns::select('key')->where('delete_flg', 0)->orderBy('order')->get()->pluck('key')->toArray();
        return $list;
    }

    private function wage_map()
    {
        $WageColumns = WageColumns::get();
        $map = [];
        foreach ($WageColumns->toArray() as $column) {
            $map[$column['key']] = $column;
        }
        return $map;
    }

    private function wage_condition($wage, $conditions)
    {
        $current_company = CurrentUser::currentCompany();
        $start_day = $current_company->start_day_of_month ?? 1;
        $start_year = $conditions['wage_year'] ?? Carbon::now()->year;

        // 年度・月条件
        if (!empty($conditions['wage_month'])) {
            $start_month = $conditions['wage_month'];
            $start_date = Carbon::create($start_year, $start_month, $start_day, 0, 0, 0);
            $wage = $wage->whereBetween('month', [
                $start_date->format('Y-m-d'),
                $start_date->clone()->addYear()->subday()->format('Y/m/d')
            ]);
        } else {
            $start_date = Carbon::create($start_year, 1, $start_day, 0, 0, 0);
            $wage = $wage->whereBetween('month', [
                $start_date->format('Y-m-d'),
                $start_date->clone()->addYear()->subday()->format('Y/m/d')
            ]);
        }

        if (!empty($conditions['wage_branch'])) {
            $str = $conditions['wage_branch'];
            $wage = $wage->where('branch_name', 'LIKE', "%$str%");
        }
        if (!empty($conditions['wage_department'])) {
            $str = $conditions['wage_department'];
            $wage = $wage->where('departments', 'LIKE', "%$str%");
        }
        if (!empty($conditions['employment_type'])) {
            $str = $conditions['employment_type'];
            $wage = $wage->where('employment_type', 'LIKE', "%$str%");
        }
        if (!empty($conditions['work_type'])) {
            $str = $conditions['work_type'];
            $wage = $wage->where('work_type', 'LIKE', "%$str%");
        }
        if (!empty($conditions['grade'])) {
            $str = $conditions['grade'];
            $wage = $wage->where('grade', 'LIKE', "%$str%");
        }
        if (!empty($conditions['gradational_salary'])) {
            $str = $conditions['gradational_salary'];
            $wage = $wage->where('gradational_salary', 'LIKE', "%$str%");
        }
        if (!empty($conditions['other_type'])) {
            $str = $conditions['other_type'];
            $wage = $wage->where('other_type', 'LIKE', "%$str%");
        }

        // 固定項目の詳細条件
        $WageColumns = WageColumns::select('key', 'name')->get()->pluck('name', 'key')->toArray();
        $conds = [];
        $details = $conditions['details'];
        foreach ($details as $key => $detail) {
            $exists = array_search($detail['name'], $WageColumns);
            if ($exists) {
                $c = empty($detail['comparison']) ? '>=' : '<=';
                $wage = $wage->where($exists, $c, $detail['amount']);
            } else {
                $conds[] = ['name' => $detail['name'], 'amount' => $detail['amount'], 'comparison' => $detail['comparison']];
            }
        }
        return [$wage, $conds];
    }

    private function wage_detail_filter($wage, $conds)
    {
        foreach ($conds as $cond) {
            $wage = $wage->reject(function ($w) use ($cond) {
                $hasCommuteAllowance = $w->allowance->contains(function ($allowance) use ($cond) {
                    return $allowance->name === $cond['name'];
                });
                if (!$hasCommuteAllowance) {
                    return false;
                }
                $contain = $w->allowance->contains(function ($allowance) use ($cond) {
                    if (empty($cond['comparison'])) {
                        return $allowance->name === $cond['name'] && $allowance->amount >= $cond['amount'];
                    } else {
                        return $allowance->name === $cond['name'] && $allowance->amount <= $cond['amount'];
                    }
                });
                return !$contain;
            });
            $wage = $wage->reject(function ($w) use ($cond) {
                $hasCommuteSalary = $w->salary->contains(function ($salary) use ($cond) {
                    return $salary->name === $cond['name'];
                });
                if (!$hasCommuteSalary) {
                    return false;
                }
                $contain = $w->salary->contains(function ($salary) use ($cond) {
                    if (empty($cond['comparison'])) {
                        return $salary->name === $cond['name'] && $salary->amount >= $cond['amount'];
                    } else {
                        return $salary->name === $cond['name'] && $salary->amount <= $cond['amount'];
                    }
                });
                return !$contain;
            });

            $wage = $wage->reject(function ($w) use ($cond) {
                $hasCommuteOvertime = $w->overtime->contains(function ($overtime) use ($cond) {
                    return $overtime->name === $cond['name'];
                });
                if (!$hasCommuteOvertime) {
                    return false;
                }
                $contain = $w->overtime->contains(function ($overtime) use ($cond) {
                    if (empty($cond['comparison'])) {
                        return $overtime->name === $cond['name'] && $overtime->amount >= $cond['amount'];
                    } else {
                        return $overtime->name === $cond['name'] && $overtime->amount <= $cond['amount'];
                    }
                });
                return !$contain;
            });
        }
        return $wage;
    }

    function getOneYearLater($year, $month, $day)
    {
        $date = Carbon::create($year, $month, $day, 0, 0, 0);
        $oneYearLater = $date->copy()->addYear();
        if ($date->day > $oneYearLater->daysInMonth) {
            $oneYearLater->day($oneYearLater->daysInMonth);
        }
        return $oneYearLater;
    }
}
