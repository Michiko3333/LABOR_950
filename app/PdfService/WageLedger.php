<?php

namespace App\PdfService;

use App\Models\AttendanceColumns;
use App\Models\CurrentUser;
use App\Models\Employee;
use App\Models\Employee_department;
use App\Models\Managerial_position;
use App\Models\WageColumns;
use Illuminate\Support\Facades\Storage;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;

use Carbon\Carbon;

class WageLedger
{

    private $year = null;
    private $data = [];
    private $wage_column_names = [];
    private $bonus_column_names = [];
    private $month_order = [];
    private $spreadsheet = null;

    private $wage_column = null;
    private $attendance_column = null;

    private $salary_names = [];
    private $overtime_names = [];
    private $allowance_names = [];
    private $bonus_salary_names = [];

    public function __construct($data, $month_order)
    {
        $this->year = $data['year'];
        $this->data = $data['data'];
        $this->wage_column_names = $data['wage_column_names'];
        $this->bonus_column_names = $data['bonus_column_names'];
        $this->salary_names = $data['salary_names'];
        $this->overtime_names = $data['overtime_names'];
        $this->allowance_names = $data['allowance_names'];
        $this->bonus_salary_names = $data['bonus_salary_names'];

        $this->month_order = $month_order;
        $this->wage_column = WageColumns::select('id', 'key', 'name', 'calc', 'hide_bonus')
            ->where('is_ledger', 1)
            ->where('delete_flg', 0)
            ->orderBy('ledger_order')
            ->get();

        $this->attendance_column = AttendanceColumns::select('id', 'key', 'name')
            ->where('is_ledger', 1)
            ->where('delete_flg', 0)
            ->orderBy('ledger_order')
            ->get();

        $template = Storage::path('wage-template/ledger-format.xlsx');
        $reader = new XlsxReader();
        $this->spreadsheet = $reader->load($template);
        $this->createWageSheet();
    }

    public function createWageSheet()
    {
        $current_company = CurrentUser::currentCompany();
        $start_month = $current_company->start_month_of_year ?? 1;
        $carbon_start = Carbon::create($this->year, $start_month, 1, 0, 0, 0);
        $carbon_end = $carbon_start->clone()->addYear()->subDay();

        foreach ($this->data as $employee_id => $wage) {
            $employee_data = Employee::where('id', $employee_id)->where('delete_flg', 0)->first();
            $employee_no = $employee_data->employee_no;
            $employee_name = $employee_no . '_' . $employee_data->last_name . '_' . $employee_data->first_name;
            $employee_sex = $employee_data->sex == 1 ? '男' : '女';
            $employee_birthday_carbon = Carbon::createFromFormat('Y-m-d', $employee_data->birthday);
            $employee_birthday = $employee_birthday_carbon->format('Y年m月d日');
            $employee_hired_date = '-';
            if (!empty($employee_data->hired_date)) {
                $d = Carbon::createFromFormat('Y-m-d', $employee_data->hired_date);
                $employee_hired_date = $d->format('Y年m月d日');
            }
            $employee_department = Employee_department::select('name')
                ->where('m_employee_department.delete_flg', 0)
                ->leftJoin('m_department as d', 'department_id', '=', 'd.id')
                ->where('employee_id', $employee_data->id)
                ->pluck('name')->toArray();
            $employee_branch_name = $employee_data->branch->name;
            $employee_managerial_position = '';
            $mp = Managerial_position::select('name')->where('id', $employee_data->managerial_position_id)->first();
            if (!empty($mp)) $employee_managerial_position = $mp['name'];
            else $employee_managerial_position = '-';

            $branch_department = $employee_branch_name . ' / ' . implode(",", $employee_department);

            $this->duplicateSheet($employee_name);
            $sheet = $this->spreadsheet->getSheetByName($employee_name);

            $sheet->setCellValue('B5', $carbon_start->format('Y年m月') . '～' . $carbon_end->format('Y年m月'));
            $sheet->setCellValue('G5', $current_company->name);
            $sheet->setCellValue('J5', $branch_department);
            $sheet->setCellValue('M5', $employee_managerial_position);
            $sheet->setCellValue('P5', $employee_no);
            $sheet->setCellValue('R5', $employee_data->last_name . ' ' . $employee_data->first_name);
            $sheet->setCellValue('T5', $employee_sex);
            $sheet->setCellValue('U5', $employee_birthday);
            $sheet->setCellValue('W5', $employee_hired_date);

            $month_i = 0;
            $month_cols = ['D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O'];
            foreach ($this->month_order as $month) {
                $col = $month_cols[$month_i];
                $sheet->setCellValue($col . '8', $month . '月分');
                $month_i++;
            }

            $rowIndex = 11;
            $base_amount = $this->wage_column->where('key', 'wage_base_amount')->first();
            $sheet->setCellValue('C' . $rowIndex, $base_amount['name']);
            $month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data[$base_amount['key']] ?? '');
                $month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');

            $bonus_month_i = 0;
            $bonus_cols = ['S', 'T', 'U', 'V'];
            $sheet->setCellValue('R' . $rowIndex, $base_amount['name']);
            foreach ($wage['bonus_month'] as $key => $item) {
                if ($bonus_month_i > 3) break;
                $col = $bonus_cols[$bonus_month_i];
                $sheet->setCellValue($col . '8', $key . '月分');
                $sheet->setCellValue($col . $rowIndex, $item['wage_base_amount']);
                $bonus_month_i++;
            }

            $rowIndex++;

            foreach ($this->overtime_names as $key_name) {
                if ($rowIndex > 11) $sheet->insertNewRowBefore($rowIndex, 1);
                $sheet->setCellValue('C' . $rowIndex, $key_name);
                $month_i = 0;
                foreach ($this->month_order as $month) {
                    $wage_data = $wage['month'][$month];
                    $col = $month_cols[$month_i];
                    $overtime_values = $wage_data['overtime_values'];
                    if (in_array($key_name, array_keys($overtime_values))) {
                        $sheet->setCellValue($col . $rowIndex, $overtime_values[$key_name] ?? '');
                    }
                    $month_i++;
                }

                $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
                $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');
                $rowIndex++;
            }


            foreach ($this->allowance_names as $key_name) {
                if ($rowIndex > 11) $sheet->insertNewRowBefore($rowIndex, 1);
                $sheet->setCellValue('C' . $rowIndex, $key_name);
                $month_i = 0;
                foreach ($this->month_order as $month) {
                    $wage_data = $wage['month'][$month];
                    $col = $month_cols[$month_i];
                    $allowance_values = $wage_data['allowance_values'];
                    if (in_array($key_name, array_keys($allowance_values))) {
                        $sheet->setCellValue($col . $rowIndex, $allowance_values[$key_name] ?? '');
                    }
                    $month_i++;
                }

                $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
                $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');
                $rowIndex++;
            }

            foreach ($this->bonus_salary_names as $key_name) {
                if ($rowIndex > 11) $sheet->insertNewRowBefore($rowIndex, 1);
                $sheet->setCellValue('R' . $rowIndex, $key_name);
                $bonus_month_i = 0;
                $bonus_cols = ['S', 'T', 'U', 'V'];
                foreach ($wage['bonus_month'] as $key => $item) {
                    if ($bonus_month_i > 3) break;
                    $salaries = $item['salary_values'];
                    $col = $bonus_cols[$bonus_month_i];
                    $sheet->setCellValue($col . $rowIndex, $salaries[$key_name]);
                    $bonus_month_i++;
                }
                $sheet->setCellValue('W' . $rowIndex, '=SUM(S' . $rowIndex . ':V' . $rowIndex . ')');
                $sheet->setCellValue('X' . $rowIndex, '=W' . $rowIndex);
                $rowIndex++;
            }

            $sheet->insertNewRowBefore($rowIndex, 1);
            $rowIndex++;

            foreach ($this->salary_names as $key_name) {

                if ($rowIndex > 11) $sheet->insertNewRowBefore($rowIndex, 1);
                $sheet->setCellValue('C' . $rowIndex, $key_name);

                $month_i = 0;
                foreach ($this->month_order as $month) {
                    $wage_data = $wage['month'][$month];
                    $col = $month_cols[$month_i];
                    $salary_values = $wage_data['salary_values'];
                    if (in_array($key_name, array_keys($salary_values))) {
                        $sheet->setCellValue($col . $rowIndex, $salary_values[$key_name] ?? '');
                    }
                    $month_i++;
                }

                $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
                $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');
                $rowIndex++;
            }

            $rowIndex++;
            // 支給控除
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['absence_deduction'] ?? '');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');
            $rowIndex++;
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['late_deduction'] ?? '');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');
            $rowIndex++;
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['other_deduction'] ?? '');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');


            $rowIndex += 2;
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['taxable_paymment'] ?? '');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');

            $bonus_month_i = 0;
            $bonus_cols = ['S', 'T', 'U', 'V'];
            foreach ($wage['bonus_month'] as $key => $item) {
                if ($bonus_month_i > 3) break;
                $col = $bonus_cols[$bonus_month_i];
                $sheet->setCellValue($col . '8', $key . '月分');
                $sheet->setCellValue($col . $rowIndex, $item['taxable_paymment']);
                $bonus_month_i++;
            }

            $rowIndex++;
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['non_taxable_paymment'] ?? '');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');

            $bonus_month_i = 0;
            $bonus_cols = ['S', 'T', 'U', 'V'];
            foreach ($wage['bonus_month'] as $key => $item) {
                if ($bonus_month_i > 3) break;
                $col = $bonus_cols[$bonus_month_i];
                $sheet->setCellValue($col . '8', $key . '月分');
                $sheet->setCellValue($col . $rowIndex, $item['non_taxable_paymment']);
                $bonus_month_i++;
            }


            $rowIndex += 2;
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['labor_insurance_target'] ?? '-');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex);
            $rowIndex++;
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['social_insurance_target'] ?? '-');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex);


            $rowIndex++;
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['health_insurance_deduction'] ?? '');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');
            $bonus_month_i = 0;
            $bonus_cols = ['S', 'T', 'U', 'V'];
            foreach ($wage['bonus_month'] as $key => $item) {
                if ($bonus_month_i > 3) break;
                $col = $bonus_cols[$bonus_month_i];
                $sheet->setCellValue($col . '8', $key . '月分');
                $sheet->setCellValue($col . $rowIndex, $item['health_insurance_deduction']);
                $bonus_month_i++;
            }


            $rowIndex++;
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['nursing_care_insurance_deduction'] ?? '');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');
            $bonus_month_i = 0;
            $bonus_cols = ['S', 'T', 'U', 'V'];
            foreach ($wage['bonus_month'] as $key => $item) {
                if ($bonus_month_i > 3) break;
                $col = $bonus_cols[$bonus_month_i];
                $sheet->setCellValue($col . '8', $key . '月分');
                $sheet->setCellValue($col . $rowIndex, $item['nursing_care_insurance_deduction']);
                $bonus_month_i++;
            }

            $rowIndex++;
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['welfare_pension_deduction'] ?? '');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');
            $bonus_month_i = 0;
            $bonus_cols = ['S', 'T', 'U', 'V'];
            foreach ($wage['bonus_month'] as $key => $item) {
                if ($bonus_month_i > 3) break;
                $col = $bonus_cols[$bonus_month_i];
                $sheet->setCellValue($col . '8', $key . '月分');
                $sheet->setCellValue($col . $rowIndex, $item['welfare_pension_deduction']);
                $bonus_month_i++;
            }

            $rowIndex++;
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['welfare_pension_insurance_deduction'] ?? '');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');
            $bonus_month_i = 0;
            $bonus_cols = ['S', 'T', 'U', 'V'];
            foreach ($wage['bonus_month'] as $key => $item) {
                if ($bonus_month_i > 3) break;
                $col = $bonus_cols[$bonus_month_i];
                $sheet->setCellValue($col . '8', $key . '月分');
                $sheet->setCellValue($col . $rowIndex, $item['welfare_pension_insurance_deduction']);
                $bonus_month_i++;
            }

            $rowIndex++;
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['employment_insurance_deduction'] ?? '');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');
            $bonus_month_i = 0;
            $bonus_cols = ['S', 'T', 'U', 'V'];
            foreach ($wage['bonus_month'] as $key => $item) {
                if ($bonus_month_i > 3) break;
                $col = $bonus_cols[$bonus_month_i];
                $sheet->setCellValue($col . '8', $key . '月分');
                $sheet->setCellValue($col . $rowIndex, $item['employment_insurance_deduction']);
                $bonus_month_i++;
            }


            $rowIndex += 4;
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['resident_tax'] ?? '');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');
            $bonus_month_i = 0;
            $bonus_cols = ['S', 'T', 'U', 'V'];
            foreach ($wage['bonus_month'] as $key => $item) {
                if ($bonus_month_i > 3) break;
                $col = $bonus_cols[$bonus_month_i];
                $sheet->setCellValue($col . '8', $key . '月分');
                $sheet->setCellValue($col . $rowIndex, $item['resident_tax']);
                $bonus_month_i++;
            }

            $rowIndex++;
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['withholding_tax'] ?? '');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');
            $bonus_month_i = 0;
            $bonus_cols = ['S', 'T', 'U', 'V'];
            foreach ($wage['bonus_month'] as $key => $item) {
                if ($bonus_month_i > 3) break;
                $col = $bonus_cols[$bonus_month_i];
                $sheet->setCellValue($col . '8', $key . '月分');
                $sheet->setCellValue($col . $rowIndex, $item['withholding_tax']);
                $bonus_month_i++;
            }


            $rowIndex++;
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['mutual_aid'] ?? '');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');
            $rowIndex++;
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['asset_saving'] ?? '');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('X' . $rowIndex, '=P' . $rowIndex . '+W' . $rowIndex . '');


            $rowIndex += 5;
            $month_i = 0;
            foreach ($this->month_order as $month) {
                $atd_data = $wage['atd_month'][$month];
                $col = $month_cols[$month_i];
                $sheet->setCellValue($col . $rowIndex, $atd_data['actual_working_days'] ?? '');
                $month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');

            $rowIndex++;
            $month_i = 0;
            foreach ($this->month_order as $month) {
                $atd_data = $wage['atd_month'][$month];
                $col = $month_cols[$month_i];
                $sheet->setCellValue($col . $rowIndex, $atd_data['paid_leave'] ?? '');
                $month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');

            $rowIndex++;
            $month_i = 0;
            foreach ($this->month_order as $month) {
                $atd_data = $wage['atd_month'][$month];
                $col = $month_cols[$month_i];
                $sheet->setCellValue($col . $rowIndex, $atd_data['absent_days'] ?? '');
                $month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');

            $sheet->setCellValue('R' . $rowIndex, $wage['remarks'] ?? '');

            $rowIndex++;
            $month_i = 0;
            foreach ($this->month_order as $month) {
                $atd_data = $wage['atd_month'][$month];
                $col = $month_cols[$month_i];
                $sheet->setCellValue($col . $rowIndex, $atd_data['late_days'] ?? '');
                $month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');

            $rowIndex++;
            $month_i = 0;
            foreach ($this->month_order as $month) {
                $atd_data = $wage['atd_month'][$month];
                $col = $month_cols[$month_i];
                $sheet->setCellValue($col . $rowIndex, $atd_data['working_time'] ?? '');
                $month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');

            $rowIndex++;
            $month_i = 0;
            foreach ($this->month_order as $month) {
                $atd_data = $wage['atd_month'][$month];
                $col = $month_cols[$month_i];
                $sheet->setCellValue($col . $rowIndex, $atd_data['working_off_time'] ?? '');
                $month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');

            $rowIndex++;
            $month_i = 0;
            foreach ($this->month_order as $month) {
                $atd_data = $wage['atd_month'][$month];
                $col = $month_cols[$month_i];
                $sheet->setCellValue($col . $rowIndex, $atd_data['overtime'] ?? '');
                $month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');

            $rowIndex++;
            $month_i = 0;
            foreach ($this->month_order as $month) {
                $atd_data = $wage['atd_month'][$month];
                $col = $month_cols[$month_i];
                $sheet->setCellValue($col . $rowIndex, $atd_data['overtime_late'] ?? '');
                $month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');

            $rowIndex++;
            $month_i = 0;
            foreach ($this->month_order as $month) {
                $atd_data = $wage['atd_month'][$month];
                $col = $month_cols[$month_i];
                $sheet->setCellValue($col . $rowIndex, $atd_data['late_time'] ?? '');
                $month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
        }
    }

    public function duplicateSheet($newSheetName, $sheetName = 'base')
    {
        $sheet = $this->spreadsheet->getSheetByName($sheetName);

        if (!$sheet) {
            throw new \PhpOffice\PhpSpreadsheet\Exception("Sheet with name '{$sheetName}' does not exist.");
        }

        $newSheet = $sheet->copy();
        $newSheet->setTitle($newSheetName);

        $this->spreadsheet->addSheet($newSheet);
    }

    public function duplicateRow($sheet, $rowIndex)
    {
        $sheet->insertNewRowBefore($rowIndex + 1, 1);
        return $rowIndex + 1;
    }

    public function outputToFile($outputPath)
    {
        $this->spreadsheet->removeSheetByIndex(0);
        $writer = new XlsxWriter($this->spreadsheet);
        $writer->save($outputPath);
        \Log::info("Spreadsheet saved to: {$outputPath}");
    }

    public function export($export_excel_path, $export_pdf_path)
    {
        if (file_exists($export_excel_path)) {
            $path = app_path() . '/PdfService';
            $cmd = 'export HOME=/tmp; export LANG=ja_JP.UTF-8; export LC_ALL=ja_JP.UTF-; libreoffice --headless -env:UserInstallation=file://' . $path . ' --convert-to pdf --outdir ' . $export_pdf_path . ' ' . $export_excel_path;
            return exec($cmd);
        }
    }
}
