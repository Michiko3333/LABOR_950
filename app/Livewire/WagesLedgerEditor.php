<?php

namespace App\Livewire;

use App\Models\Attendance;
use App\Models\AttendanceColumns;
use App\Models\Branch;
use Illuminate\Support\Facades\Storage;
use App\Models\CurrentUser;
use App\Models\Employee;
use App\Models\Employee_department;
use App\Models\Managerial_position;
use App\Models\Wage;
use App\Models\WageColumns;
use App\Models\WageInsuranceColumn;
use Livewire\Component;
use Livewire\Attributes\On;
use Carbon\Carbon;
use App\PdfService\WageLedger;

const day_base = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

class WagesLedgerEditor extends Component
{
    public $employee_ids = [];
    public $employees = null;
    public $year = 0;
    public $start_month = 1;
    public $month_order = [];
    public $bonus_month_order = [];

    public $wage_column = null;
    public $wage_column_names = [];
    public $bonus_column_names = [];
    public $attendance_column = null;
    public $attendance_column_names = [];
    public $data = [];
    public $current_id = 0;
    public $employee_icon = '';
    public $employee_data = null;
    public $profiles = [
        'employee_no' => '',
        'branch_name' => '',
        'department' => [],
        'managerial_position' => ''
    ];

    public $salary_names = [];
    public $overtime_names = [];
    public $allowance_names = [];

    public $disablePrev = true;
    public $disableNext = true;

    public $currentTab = 'wage';

    public $errorMessage = '';

    public function mount($employee_ids, $year)
    {
        $current_company = CurrentUser::currentCompany();
        $current_user = CurrentUser::info();
        $branch_ids = $current_company->branch()->where('delete_flg', 0)->pluck('id')->toArray();
        $this->employees = Employee::whereIn('id', $employee_ids)->whereIn('branch_id', $branch_ids)->where('delete_flg', 0)->get();
        $this->employee_ids = $this->employees->pluck('id')->toArray();

        $this->year = $year;
        $this->start_month = $this->getStartMonth();
        $this->month_order = $this->listMonths($this->getStartMonth());

        $carbon_start = Carbon::create($this->year, $this->start_month, 1, 0, 0, 0);

        $wage = Wage::where('company_id', $current_company->id)
            ->whereIn('employee_id', $this->employee_ids)
            ->whereBetween('month', [
                $carbon_start->format('Y-m-d'),
                $carbon_start->clone()->addYear()->subday()->format('Y-m-d')
            ])
            ->with([
                'salary' => function ($query) {
                    $query->where('delete_flg', 0);
                },
                'allowance' => function ($query) {
                    $query->where('delete_flg', 0);
                },
                'overtime' => function ($query) {
                    $query->where('delete_flg', 0);
                }
            ])
            ->orderBy('month')
            ->get();

        $attendance = Attendance::where('company_id', $current_company->id)
            ->whereIn('employee_id', $this->employee_ids)
            ->whereBetween('month', [
                $carbon_start->format('Y-m-d'),
                $carbon_start->clone()->addYear()->subday()->format('Y-m-d')
            ])
            ->orderBy('month')
            ->get();

        $this->wage_column = WageColumns::select('id', 'key', 'name', 'calc', 'hide_bonus')
            ->where('is_ledger', 1)
            ->where('delete_flg', 0)
            ->orderBy('ledger_order')
            ->get();
        $this->wage_column_names = $this->wage_column->pluck('name', 'key')->toArray();
        $this->bonus_column_names = $this->wage_column->where('hide_bonus', 0)->pluck('name', 'key')->toArray();
        $wage_column_keys = $this->wage_column->pluck('key')->toArray();
        $base_month = [];
        foreach ($wage_column_keys as $key => $key_name) {
            $base_month[$key_name] = '';
        }
        $base_month['salary_values'] = [];
        $base_month['overtime_values'] = [];
        $base_month['allowance_values'] = [];

        $this->attendance_column = AttendanceColumns::select('id', 'key', 'name')
            ->where('is_ledger', 1)
            ->where('delete_flg', 0)
            ->get();
        $this->attendance_column_names = $this->attendance_column->pluck('name', 'key')->toArray();
        $attendance_column_keys = $this->attendance_column->pluck('key')->toArray();
        $base_atd_month = [];
        foreach ($attendance_column_keys as $key => $key_name) {
            $base_atd_month[$key_name] = '';
        }

        for ($i = 0; $i < count($this->employee_ids); $i++) {
            $employee_id = $this->employee_ids[$i];
            $d = [
                'month' => [],
                'bonus_month' => [],
                'atd_month' => [],
                'remarks' => ''
            ];
            $carbon_month_start = Carbon::create($this->year, $this->start_month, 1, 0, 0, 0);
            foreach ($this->month_order as $key => &$month) {
                $wage_data = $wage->where('employee_id', $employee_id)
                    ->whereBetween('month', [
                        $carbon_month_start->format('Y-m-d'),
                        $carbon_month_start->clone()->addMonth()->subday()->format('Y-m-d')
                    ])
                    ->where('wage_type', 1)
                    ->first();
                if (empty($wage_data)) $wage_data = [];
                else {
                    $wage_data = $wage_data->toArray();
                    foreach ($wage_data['salary'] as $key => $value) {
                        $this->salary_names[] = $value['name'];
                        $wage_data['salary_values'][$value['name']] = $value['amount'];
                    }
                    foreach ($wage_data['overtime'] as $key => $value) {
                        $this->overtime_names[] = $value['name'];
                        $wage_data['overtime_values'][$value['name']] = $value['amount'];
                    }
                    foreach ($wage_data['allowance'] as $key => $value) {
                        $this->allowance_names[] = $value['name'];
                        $wage_data['allowance_values'][$value['name']] = $value['amount'];
                    }
                }
                $d['month'][$month] = array_merge($base_month, $wage_data);


                $attendance_data = $attendance->where('employee_id', $employee_id)
                    ->whereBetween('month', [
                        $carbon_month_start->format('Y-m-d'),
                        $carbon_month_start->clone()->addMonth()->subday()->format('Y-m-d')
                    ])
                    ->first();
                if (empty($attendance_data)) $attendance_data = [];
                else $attendance_data = $attendance_data->toArray();
                $d['atd_month'][$month] = array_merge($base_atd_month, $attendance_data);

                $carbon_month_start->addMonth();
            }

            $bonus_month_tmp = $wage->where('employee_id', $employee_id)->where('wage_type', 2)->pluck('month')->toArray();
            $this->bonus_month_order = [];
            foreach ($bonus_month_tmp as $date) {
                $date = Carbon::createFromFormat('Y-m-d', $date);
                $bonus_month = $date->month;
                $carbon_month_start = Carbon::create($date->year, $date->month, 1, 0, 0, 0);
                $bonus_data = $wage->where('employee_id', $employee_id)
                    ->whereBetween('month', [
                        $carbon_month_start->format('Y-m-d'),
                        $carbon_month_start->clone()->addMonth()->subday()->format('Y-m-d')
                    ])
                    ->where('wage_type', 2)
                    ->first();
                $this->bonus_month_order[] = $bonus_month;
                $d['bonus_month'][$bonus_month] = $bonus_data->toArray();
            }

            $this->data[$employee_id] = $d;
            if ($i === 0) $this->current_id = $employee_id;
        }

        $this->salary_names = array_unique($this->salary_names, SORT_STRING);
        $this->overtime_names = array_unique($this->overtime_names, SORT_STRING);
        $this->allowance_names = array_unique($this->allowance_names, SORT_STRING);

        $labor = WageInsuranceColumn::select('keys', 'type')->where('company_id', $current_company->id)
            ->where('employee_id', $current_user->id)
            ->where('type', 0)
            ->where('delete_flg', 0)
            ->first();
        $social = WageInsuranceColumn::select('keys', 'type')->where('company_id', $current_company->id)
            ->where('employee_id', $current_user->id)
            ->where('type', 1)
            ->where('delete_flg', 0)
            ->first();

        foreach ($this->data as &$item) {
            foreach ($this->month_order as $_month) {
                $monthly_data = &$item['month'][$_month];
                foreach ($this->salary_names as $name) {
                    if (!in_array($name, array_keys($monthly_data['salary_values']))) {
                        $monthly_data['salary_values'][$name] = '';
                    }
                }
                foreach ($this->overtime_names as $name) {
                    if (!in_array($name, array_keys($monthly_data['overtime_values']))) {
                        $monthly_data['overtime_values'][$name] = '';
                    }
                }
                foreach ($this->allowance_names as $name) {
                    if (!in_array($name, array_keys($monthly_data['allowance_values']))) {
                        $monthly_data['allowance_values'][$name] = '';
                    }
                }

                if (!empty($labor)) {
                    $arr = explode(',', $labor->keys);
                    $sum = 0;
                    foreach ($arr as $name) {
                        if (in_array($name, array_keys($monthly_data))) {
                            $sum += (int) $monthly_data[$name] ?? 0;
                        } else if (in_array($name, array_keys($monthly_data['salary_values']))) {
                            $sum += (int) $monthly_data['salary_values'][$name] ?? 0;
                        } else if (in_array($name, array_keys($monthly_data['overtime_values']))) {
                            $sum += (int) $monthly_data['overtime_values'][$name] ?? 0;
                        } else if (in_array($name, array_keys($monthly_data['allowance_values']))) {
                            $sum += (int) $monthly_data['allowance_values'][$name] ?? 0;
                        }
                    }
                    $monthly_data['labor_insurance_target'] = $sum;
                }
                if (!empty($social)) {
                    $arr = explode(',', $social->keys);
                    $sum = 0;
                    foreach ($arr as $name) {
                        if (in_array($name, array_keys($monthly_data))) {
                            $sum += (int) $monthly_data[$name] ?? 0;
                        } else if (in_array($name, array_keys($monthly_data['salary_values']))) {
                            $sum += (int) $monthly_data['salary_values'][$name] ?? 0;
                        } else if (in_array($name, array_keys($monthly_data['overtime_values']))) {
                            $sum += (int) $monthly_data['overtime_values'][$name] ?? 0;
                        } else if (in_array($name, array_keys($monthly_data['allowance_values']))) {
                            $sum += (int) $monthly_data['allowance_values'][$name] ?? 0;
                        }
                    }
                    $monthly_data['social_insurance_target'] = $sum;
                }
            }
        }
    }

    public function render()
    {
        $idx = array_search($this->current_id, $this->employee_ids);
        if (!is_null($idx)) {
            $this->disablePrev = $idx <= 0;
            $this->disableNext = $idx >= count($this->employee_ids) - 1;
        }
        $this->employee_data = $this->employees->where('id', $this->current_id)->first();
        $this->employee_icon = $this->getIcon($this->employee_data->id);
        $this->profiles['departments'] = Employee_department::select('name')
            ->where('m_employee_department.delete_flg', 0)
            ->leftJoin('m_department as d', 'department_id', '=', 'd.id')
            ->where('employee_id', $this->employee_data->id)
            ->pluck('name')->toArray();
        $this->profiles['employee_no'] = $this->employee_data->employee_no;
        $this->profiles['branch_name'] = $this->employee_data->branch->name;
        $mp = Managerial_position::select('name')->where('id', $this->employee_data->managerial_position_id)->first();
        if (!empty($mp)) $this->profiles['managerial_position'] = $mp['name'];
        else $this->profiles['managerial_position'] = '-';

        return view('livewire.wages-ledger-editor');
    }

    public function onSubmit()
    {
        try {
            $current_company = CurrentUser::currentCompany();
            $now = Carbon::now();
            $name = $current_company->name;

            $wageLedger = new WageLedger([
                'year' => $this->year,
                'data' => $this->data,
                'wage_column_names' => $this->wage_column_names,
                'bonus_column_names' => $this->bonus_column_names,
                'salary_names' => $this->salary_names,
                'overtime_names' => $this->overtime_names,
                'allowance_names' => $this->allowance_names
            ], $this->month_order);


            $path = 'wage-ledger/' . $current_company->id . '/' . $now->year;
            if (!Storage::exists('wage-ledger/' . $current_company->id)) {
                Storage::makeDirectory('wage-ledger/' . $current_company->id);
            }
            if (!Storage::exists($path)) {
                Storage::makeDirectory($path);
            }

            $file = $now->format('YmdHis');
            $xlsx = Storage::path($path . '/' . $file . '.xlsx');
            $pdf = $path . '/' . $file . '.pdf';

            $wageLedger->outputToFile($xlsx);
            $res = $wageLedger->export($xlsx, Storage::path($path));
            \Log::info($res); // 出力結果をログ出力

            if (!Storage::exists($pdf)) {
                throw new \Exception('faild to create pdffile at ' . $file . '.pdf');
            }

            return Storage::download($pdf, '賃金台帳_' . $name . '.pdf');
        } catch (\Exception $err) {
            \Log::error($err->getMessage());
            $this->errorMessage = '予期せぬエラーが発生しました';
        }
    }

    public function currentData($str = null)
    {
        if (!empty($str)) return $this->data[$this->current_id][$str];
        return $this->data[$this->current_id];
    }

    public function getRowSum($key, $is_bonus = false)
    {
        $target = $is_bonus ? 'bonus_month' : 'month';
        $month_list = $this->currentData($target);
        $sum = 0;
        foreach ($month_list as $month) {
            $sum += !empty($month[$key]) ? (int) $month[$key] : 0;
        }
        return $sum;
    }

    public function getRowSumAttendance($key)
    {
        $target = 'atd_month';
        $month_list = $this->currentData($target);
        $sum = 0;
        foreach ($month_list as $month) {
            $sum += !empty($month[$key]) ? (int) $month[$key] : 0;
        }
        return $sum;
    }

    public function getControllableRowSum($key, $name)
    {
        $month_list = $this->currentData('month');
        $sum = 0;
        foreach ($month_list as $month) {
            foreach ($month[$key] as $k => $value) {
                if ($k != $name) continue;
                $sum += (int) $value ?? 0;
            }
        }
        return $sum;
    }
    public function getAddtionSumRow($is_bonus = false)
    {
        $sum = 0;
        if ($is_bonus) {
            foreach ($this->bonus_month_order as $month) {
                $sum += $this->getAddtionSumCol($month, true);
            }
        } else {
            foreach ($this->month_order as $month) {
                $sum += $this->getAddtionSumCol($month);
            }
        }

        return $sum;
    }
    public function getAddtionSumCol($month, $is_bonus = false)
    {
        $query = $this->wage_column->where('calc', 1);
        if ($is_bonus) $query = $query->where('hide_bonus', 0);
        $addition_keys = $query->pluck('key')->toArray();

        $target = 'month';
        if ($is_bonus) $target = 'bonus_month';

        $month_list = $this->currentData($target);
        $month_data = $month_list[$month];
        $addition = 0;
        foreach ($addition_keys as $key_name) {
            $addition += (int) $month_data[$key_name] ?? 0;
        }
        if (!$is_bonus) {
            foreach ($month_data['salary_values'] as $amount) {
                $addition += (int) $amount ?? 0;
            }
            foreach ($month_data['overtime_values'] as $amount) {
                $addition += (int) $amount ?? 0;
            }
            foreach ($month_data['allowance_values'] as $amount) {
                $addition += (int) $amount ?? 0;
            }
        }
        return $addition;
    }


    public function getDeductionSumRow($is_bonus = false)
    {
        $sum = 0;
        if ($is_bonus) {
            foreach ($this->bonus_month_order as $month) {
                $sum += $this->getDeductionSumCol($month, true);
            }
        } else {
            foreach ($this->month_order as $month) {
                $sum += $this->getDeductionSumCol($month);
            }
        }

        return $sum;
    }
    public function getDeductionSumCol($month, $is_bonus = false)
    {
        $query = $this->wage_column->where('calc', 2);
        if ($is_bonus) $query = $query->where('hide_bonus', 0);
        $deduction_keys = $query->pluck('key')->toArray();

        $target = 'month';
        if ($is_bonus) $target = 'bonus_month';

        $month_list = $this->currentData($target);
        $month_data = $month_list[$month];
        $deduction = 0;
        foreach ($deduction_keys as $key_name) {
            $deduction += (int) $month_data[$key_name] ?? 0;
        }
        return $deduction;
    }

    public function getTotalAmountRow($is_bonus = false)
    {
        $sum = 0;
        if ($is_bonus) {
            foreach ($this->bonus_month_order as $month) {
                $sum += $this->getTotalAmountCol($month, true);
            }
        } else {
            foreach ($this->month_order as $month) {
                $sum += $this->getTotalAmountCol($month);
            }
        }
        return $sum;
    }

    public function getTotalAmountCol($month, $is_bonus = false)
    {
        $addition = 0;
        $deduction = 0;
        if ($is_bonus) {
            $addition = $this->getAddtionSumCol($month, true);
            $deduction = $this->getDeductionSumCol($month, true);
        } else {
            $addition = $this->getAddtionSumCol($month);
            $deduction = $this->getDeductionSumCol($month);
        }

        return $addition - $deduction;
    }

    public function currentIndex()
    {
        return array_search($this->current_id, $this->employee_ids);
    }

    #[On('approve-addition')]
    public function pushAllowanceToCurrent($name, $type)
    {
        foreach ($this->data as &$item) {
            foreach ($this->month_order as $month) {
                $item['month'][$month][$type][$name] = '';
            }
        }
        if ($type == 'salary_values') $this->salary_names[] = $name;
        else if ($type == 'overtime_values') $this->overtime_names[] = $name;
        else if ($type == 'allowance_values') $this->allowance_names[] = $name;
    }

    public function removeAddition($name, $type)
    {
        foreach ($this->data as &$item) {
            foreach ($this->month_order as $month) {
                unset($item['month'][$month][$type][$name]);
            }
        }
        if ($type == 'salary_values') {
            $key = array_search($name, $this->salary_names);
            if (!is_bool($key)) {
                unset($this->salary_names[$key]);
                $this->salary_names = array_values($this->salary_names);
            }
        } else if ($type == 'overtime_values') {
            $key = array_search($name, $this->overtime_names);
            if (!is_bool($key)) {
                unset($this->overtime_names[$key]);
                $this->overtime_names = array_values($this->overtime_names);
            }
        } else if ($type == 'allowance_values') {
            $key = array_search($name, $this->allowance_names);
            if (!is_bool($key)) {
                unset($this->allowance_names[$key]);
                $this->allowance_names = array_values($this->allowance_names);
            }
        }
    }

    public function moveNext()
    {
        $nextIndex = $this->currentIndex() + 1;
        $key = $this->employee_ids[$nextIndex];
        $this->current_id = $key;
    }

    public function movePrev()
    {
        $nextIndex = $this->currentIndex() - 1;
        $key = $this->employee_ids[$nextIndex];
        $this->current_id = $key;
    }

    public function changeTab($name)
    {
        $this->currentTab = $name;
    }

    private function listMonths($startMonth)
    {
        $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

        if ($startMonth < 1 || $startMonth > 12) {
            $startMonth = 1;
        }

        $startIndex = array_search($startMonth, $months);
        $firstPart = array_slice($months, $startIndex);
        $secondPart = array_slice($months, 0, $startIndex);

        return array_merge($firstPart, $secondPart);
    }

    private function getStartMonth()
    {
        $current_company = CurrentUser::currentCompany();
        return $current_company->start_month_of_year ?? 1;
    }

    private function getIcon($employee_id)
    {
        $currentCompany = CurrentUser::currentCompany();

        $directory = 'photo/' . $currentCompany->id;
        $files = Storage::files($directory);
        $filePath = '';
        foreach ($files as $file) {
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            if ($fileName == $employee_id) {
                $filePath = '/' . $file . '?v=' . time();
            }
        }
        if (empty($filePath)) {
            $filePath = '/img/image.png';
        }
        return $filePath;
    }

    private function findArray($array, $key, $value)
    {
        $k = array_search($value, array_column($array, $key));
        return $k === false ? false : $array[$k];
    }
}
