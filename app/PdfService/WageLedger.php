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

    public function __construct($data, $month_order)
    {
        $this->year = $data['year'];
        $this->data = $data['data'];
        $this->wage_column_names = $data['wage_column_names'];
        $this->bonus_column_names = $data['bonus_column_names'];
        $this->salary_names = $data['salary_names'];
        $this->overtime_names = $data['overtime_names'];
        $this->allowance_names = $data['allowance_names'];

        $this->month_order = $month_order;
        $this->wage_column = WageColumns::select('id', 'key', 'name', 'calc', 'hide_bonus')
            ->where('is_ledger', 1)
            ->where('delete_flg', 0)
            ->orderBy('ledger_order')
            ->get();

        $this->attendance_column = AttendanceColumns::select('id', 'key', 'name')
            ->where('is_ledger', 1)
            ->where('delete_flg', 0)
            ->orderBy('order')
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
            $sheet->setCellValue('F5', $current_company->name);
            $sheet->setCellValue('I5', $branch_department);
            $sheet->setCellValue('L5', $employee_managerial_position);
            $sheet->setCellValue('O5', $employee_no);
            $sheet->setCellValue('P5', $employee_data->last_name . ' ' . $employee_data->first_name);
            $sheet->setCellValue('R5', $employee_sex);
            $sheet->setCellValue('S5', $employee_birthday);
            $sheet->setCellValue('U5', $employee_hired_date);

            $month_i = 0;
            $month_cols = ['D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O'];
            foreach ($this->month_order as $month) {
                $col = $month_cols[$month_i];
                $sheet->setCellValue($col . '8', $month . '月分');
                $month_i++;
            }

            $rowIndex = 11;

            $wage_addition = $this->wage_column->where('calc', 1)->toArray();

            foreach ($wage_addition as $wage_col) {
                $sheet->insertNewRowBefore($rowIndex, 1);
                $sheet->setCellValue('C' . $rowIndex, $wage_col['name']);

                $month_i = 0;
                foreach ($this->month_order as $month) {
                    $wage_data = $wage['month'][$month];
                    $col = $month_cols[$month_i];
                    $sheet->setCellValue($col . $rowIndex, $wage_data[$wage_col['key']] ?? '');
                    $month_i++;
                }
                $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
                $sheet->setCellValue('V' . $rowIndex, '=P' . $rowIndex . '+U' . $rowIndex . '');
                $rowIndex++;
            }

            // add empty
            $sheet->insertNewRowBefore($rowIndex, 1);
            $rowIndex++;

            // customs
            foreach ($this->salary_names as $key_name) {
                $sheet->insertNewRowBefore($rowIndex, 1);
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
                $sheet->setCellValue('V' . $rowIndex, '=P' . $rowIndex . '+U' . $rowIndex . '');
                $rowIndex++;
            }
            foreach ($this->overtime_names as $key_name) {
                $sheet->insertNewRowBefore($rowIndex, 1);
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
                $sheet->setCellValue('V' . $rowIndex, '=P' . $rowIndex . '+U' . $rowIndex . '');
                $rowIndex++;
            }
            foreach ($this->allowance_names as $key_name) {
                $sheet->insertNewRowBefore($rowIndex, 1);
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
                $sheet->setCellValue('V' . $rowIndex, '=P' . $rowIndex . '+U' . $rowIndex . '');
                $rowIndex++;
            }

            $sheet->insertNewRowBefore($rowIndex, 1);
            $rowIndex++;

            // 賞与
            $bonus_month_i = 0;
            $bonus_cols = ['Q', 'R', 'S', 'T'];
            $sheet->setCellValue('C' . $rowIndex, '特別手当');
            foreach ($wage['bonus_month'] as $key => $item) {
                if ($bonus_month_i > 3) break;
                $col = $bonus_cols[$bonus_month_i];
                $sheet->setCellValue($col . '8', $key . '月分');
                $sheet->setCellValue($col . $rowIndex, $item['wage_base_amount']);
                $bonus_month_i++;
            }
            $sheet->setCellValue('U' . $rowIndex, '=SUM(Q' . $rowIndex . ':T' . $rowIndex . ')');
            $rowIndex++;
            $sheet->insertNewRowBefore($rowIndex, 1);
            $rowIndex++;

            // 課税非課税
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['taxable_paymment'] ?? '');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('V' . $rowIndex, '=P' . $rowIndex . '+U' . $rowIndex . '');
            $rowIndex++;
            $tax_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$tax_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['non_taxable_paymment'] ?? '');
                $tax_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('V' . $rowIndex, '=P' . $rowIndex . '+U' . $rowIndex . '');
            $rowIndex += 2;

            // 保険対象賃金
            $ins_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$ins_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['labor_insurance_target'] ?? '');
                $ins_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('V' . $rowIndex, '=P' . $rowIndex . '+U' . $rowIndex . '');
            $rowIndex++;
            $ins_month_i = 0;
            foreach ($this->month_order as $month) {
                $wage_data = $wage['month'][$month];
                $col = $month_cols[$ins_month_i];
                $sheet->setCellValue($col . $rowIndex, $wage_data['social_insurance_target'] ?? '');
                $ins_month_i++;
            }
            $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
            $sheet->setCellValue('V' . $rowIndex, '=P' . $rowIndex . '+U' . $rowIndex . '');
            $rowIndex += 4;

            // 控除
            $wage_deduction = $this->wage_column->where('calc', 2)->toArray();
            foreach ($wage_deduction as $wage_col) {
                $sheet->insertNewRowBefore($rowIndex, 1);
                $sheet->setCellValue('C' . $rowIndex, $wage_col['name']);

                $month_i = 0;
                foreach ($this->month_order as $month) {
                    $wage_data = $wage['month'][$month];
                    $col = $month_cols[$month_i];
                    $sheet->setCellValue($col . $rowIndex, $wage_data[$wage_col['key']] ?? '');
                    $month_i++;
                }

                $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');
                $sheet->setCellValue('V' . $rowIndex, '=P' . $rowIndex . '+U' . $rowIndex . '');

                $rowIndex++;
                if ($wage_col['key'] == 'other_insurance_deduction') {
                    $rowIndex += 3;
                }
            }
            $rowIndex += 4;

            // 勤怠情報
            $attendance_list = $this->attendance_column->toArray();
            $count = 0;
            foreach ($attendance_list as $atd_col) {
                if ($count > 6) $sheet->insertNewRowBefore($rowIndex, 1);
                $sheet->setCellValue('C' . $rowIndex, $atd_col['name']);
                $month_i = 0;
                foreach ($this->month_order as $month) {
                    $atd_data = $wage['atd_month'][$month];
                    $col = $month_cols[$month_i];
                    $sheet->setCellValue($col . $rowIndex, $atd_data[$atd_col['key']] ?? '');
                    $month_i++;
                }
                $sheet->setCellValue('P' . $rowIndex, '=SUM(D' . $rowIndex . ':O' . $rowIndex . ')');

                if ($count == 1) {
                    $sheet->setCellValue('R' . $rowIndex, $wage['remarks']);
                }

                $rowIndex++;
                $count++;
            }
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
