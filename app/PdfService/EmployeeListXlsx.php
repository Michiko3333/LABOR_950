<?php

namespace App\PdfService;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

use App\Formats\EmployeeListFormats;

class EmployeeListXlsx
{
    use EmployeeListFormats;

    private $spreadsheet;
    private $sheet;
    private $template;
    private $items;
    private $showColumns;

    public function __construct($items, $showColumns)
    {
        $this->items = $items;
        $this->showColumns = $showColumns;
    }

    public function run()
    {
        $this->spreadsheet = new Spreadsheet();
        $this->sheet = $this->spreadsheet->getActiveSheet();

        $showColumns = array_merge([
            [
                'name' => '名前',
                'value' => 'full_name',
                'parent' => 'default',
            ],
            [
                'name' => '雇用',
                'value' => 'employee_type',
                'parent' => 'default',
            ],
            [
                'name' => '番号',
                'value' => 'employee_no',
                'parent' => 'default',
            ]
        ], $this->showColumns);

        $data = [];
        $names = [];
        foreach ($showColumns as $column) {
            $names[] = $column['name'];
        }
        $data[] = $names;

        foreach ($this->items as $item) {
            $row = [];
            foreach ($showColumns as $column) {
                $key = $column['value'];
                $value = '';
                switch ($key) {
                    case 'full_name':
                        $value = $item->last_name . ' ' . $item->first_name;
                        break;
                    case 'employee_type':
                        $value = $item->employee_status_name;
                        break;
                    case 'employee_no':
                        $value = $item->employee_no;
                        break;
                    case 'belong':
                        $value = $item->branch_name;
                        if (count($item->departments) > 0) {
                            $value .= '(';
                            $value .= implode(',', $item->departments->toArray());
                            $value .= ')';
                        }
                        break;
                    case 'qualification':
                        $value = implode(',', $item->qualifications->toArray());
                        break;
                    case 'hired_date':
                        $value = $this->formatDate($item->hired_date);
                        break;
                    case 'birth_date':
                        $value = $this->formatDate($item->birthday);
                        break;
                    case 'full_address':
                        $value = $item->address_prefecture_name . ' ' . $item->address_city . ' ' . $item->address_ward . ' ' . $item->address_apartment;
                        break;
                    case 'employment_insured_date':
                        $value = $this->formatDate($item->employment_insured_date);
                        break;
                    case 'employment_not_insured_date':
                        $value = $this->formatDate($item->employment_not_insured_date);
                        break;
                    case 'insured_status':
                        $value = $this->format_insured_status($item->insured_status);
                        break;
                    case 'health_insurance_acquisition_date':
                        $value = $this->formatDate($item->health_insurance_acquisition_date);
                        break;
                    case 'health_insurance_loss_date':
                        $value = $this->formatDate($item->health_insurance_loss_date);
                        break;
                    case 'overseas_special_exception_date':
                        $value = $this->formatDate($item->overseas_special_exception_date);
                        break;
                    case 'overseas_special_not_exception_date':
                        $value = $this->formatDate($item->overseas_special_not_exception_date);
                        break;
                    case 'acquisition_of_distinction':
                        $value = $this->format_acquisition_of_distinction($item->acquisition_of_distinction);
                        break;
                    case 'overseas_special_exception':
                        $value = $this->format_overseas_special_exception($item->overseas_special_exception);
                        break;
                    case 'welfare_pension':
                        $value = $this->format_welfare_pension($item->welfare_pension);
                        break;
                    case 'stay_date_period':
                        $value = $this->formatDate($item->stay_date_period);
                        break;
                    case 'unauthorized_activities_permission_flg':
                        $value = $item->unauthorized_activities_permission_flg ? '有' : '無';
                        break;
                    case 'country_id':
                        $value = $this->format_country_id($item->country_id);
                        break;
                    case 'residential_status_id':
                        $value = $this->format_residential_status_id($item->residential_status_id);
                        break;
                    case 'dispatch_contract_completion':
                        $value = $this->format_dispatch_contract_completion($item->dispatch_contract_completion);
                        break;
                    case 'actual_working_days':
                    case 'working_days':
                    case 'holidays':
                    case 'absent_days':
                    case 'paid_leave':
                    case 'remaining_paid_leave':
                        $value = is_null($item[$column['value']]) ? '-' : $item[$column['value']] . '日';
                        break;
                    case 'w_total_amount':
                    case 'w_wage_base_amount':
                    case 'w_overtime_label':
                    case 'w_allowance_label':
                    case 'w_amount':
                        $value = is_null($item[$column['value']]) ? '-' : number_format($item[$column['value']]);
                        break;
                    case 'b_total_amount':
                    case 'b_wage_base_amount':
                    case 'b_overtime_label':
                    case 'b_allowance_label':
                    case 'b_amount':
                        $value = is_null($item[$column['value']]) ? '-' : number_format($item[$column['value']]);
                        break;
                    default:
                        $value = $item[$column['value']] ?? '';
                        break;
                }
                $row[] = $value;
            }
            $data[] = $row;
        }

        $this->sheet->fromArray($data, null, 'A1');
    }

    public function export()
    {
        $writer = new XlsxWriter($this->spreadsheet);
        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, '従業員一覧' . now()->format('YmdHis') . '.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }
}
