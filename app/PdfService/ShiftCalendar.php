<?php

namespace App\PdfService;

use App\Models\CurrentUser;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Carbon\Carbon;

class ShiftCalendar
{
    private $temp;
    private $tempPdf;
    private $message;
    private $unique;
    private $template;
    private $spreadsheet = null;
    private $columnsCalendar = ['A', 'X', 'AU'];
    private $rowsCalendar = ['4', '13', '22', '31'];
    private $columnRangeCalendar = [
        'A' => ['A', 'C', 'E', 'G', 'I', 'K', 'M'],
        'X' => ['X', 'Z', 'AB', 'AD', 'AF', 'AH', 'AJ'],
        'AU' => ['AU', 'AW', 'AY', 'BA', 'BC', 'BE', 'BG'],
    ];
    private $columnTable = ['M', 'Q', 'U', 'Y', 'AC', 'AG', 'AK', 'AO', 'AS', 'AW', 'BA', 'BE'];
    private $rowTable = 41;

    public function __construct($message)
    {
        $this->message = $message;
        $this->template = Storage::path('shift-template/shift-format.xlsx');
    }

    public function run()
    {
        $reader = new XlsxReader();
        $this->spreadsheet = $reader->load($this->template);
        $sheet = $this->spreadsheet->getSheetByName('Sheet1');

        $current_company = CurrentUser::currentCompany();

        $origin = $this->message['origin'];
        $render_month = $this->message['render_months'];
        $values = $this->message['values'];

        $company_name = $this->message['company_name'];
        $agreed_hours_day_h = $this->message['agreed_hours_day_h'];
        $agreed_hours_day_m = $this->message['agreed_hours_day_m'];
        $work_time = $this->message['work_time'];

        $year = (int) $origin['year'];
        $date = (int) $origin['day'];
        $week = (int) $origin['week'];
        $day_base = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        $days_ja = [
            'Sun' => '日',
            'Mon' => '月',
            'Tue' => '火',
            'Wed' => '水',
            'Thu' => '木',
            'Fri' => '金',
            'Sat' => '土',
        ];

        $origin_date = $year . '年' . $origin['month'] . '月' . $date . '日';

        $sheet->setCellValue('A1', $current_company->name . ' ' . $origin['title']);
        $sheet->setCellValue('A2', '起算日: ' . $origin_date);

        // カレンダー部分生成
        $cc = 0;
        $rr = 0;
        foreach ($render_month as $idx => $month) {
            $filtered_month = array_filter($values, function ($item) use ($month, $year) {
                return $item['month'] == $month && $item['year'] == $year;
            });

            $start_day = $week < 0 || $week > 6 ? 0 : $week;
            $before_start_day = array_slice($day_base, 0, $start_day);
            $after_start_day = array_slice($day_base, $start_day);
            $days = array_merge($after_start_day, $before_start_day);

            $target_base_column = $this->columnsCalendar[$cc];
            $target_base_row = $this->rowsCalendar[$rr];

            $textYearMonth = $year . '年' . $month . '月';

            $sheet->setCellValue($target_base_column . $target_base_row, $textYearMonth);

            $current_row = $target_base_row + 1;
            foreach ($days as $i => $day) {
                $cell = $this->getCalendarCol($target_base_column, $i) . $current_row;
                $sheet->setCellValue($cell, $days_ja[$day]);
            }

            $num_days = date('t', strtotime('01-' . $month . '-' . $year));
            $num_days_last_month = date(
                'j',
                strtotime('last day of previous month', strtotime('01-' . $month . '-' . $year)),
            );
            $num_days_next_month = date(
                'j',
                strtotime('last day of next month', strtotime('01-' . $month . '-' . $year)),
            );
            $first_day_of_week = array_search(date('D', strtotime($year . '-' . $month . '-1')), $days);
            $row_count = floor(($first_day_of_week + $date - 1) / 7);
            $day_count = 0;

            $current_row++;
            $num = 0;
            for ($i = $first_day_of_week; $i > 0; $i--) {
                $cell = $this->getCalendarCol($target_base_column, ($day_count - floor($day_count / 7) * 7)) . $current_row;
                $day_count++;
                $num = $num_days_last_month + $date - $i + 1;
                if ($day_count <= $row_count * 7) continue;
                $sheet->setCellValue($cell, $num_days_last_month - $i + 1);
                $sheet->getStyle($cell)->getFont()->getColor()->setRGB('ced2d4');
            }

            for ($i = 1; $i < $date; $i++) {
                $cell = $this->getCalendarCol($target_base_column, ($day_count - floor($day_count / 7) * 7)) . $current_row;
                $day_count++;
                if ($day_count <= $row_count * 7) continue;
                $sheet->setCellValue($cell, $i);
                $sheet->getStyle($cell)->getFont()->getColor()->setRGB('ced2d4');
            }

            $day_pos = ($day_count - floor($day_count / 7) * 7);
            $last_num = 0;
            for ($i = $date; $i <= $num_days + $date - 1; $i++) {
                $cell = $this->getCalendarCol($target_base_column, $day_pos) . $current_row;
                $day_count++;
                $day_pos++;
                if ($day_pos > 6) {
                    $day_pos = 0;
                    $current_row++;
                }

                $num = $i > $num_days ? $i - $num_days : $i;
                $last_num = $num;


                $filtered_values = array_filter($filtered_month, function ($item) use ($num) {
                    return $item['date'] == $num;
                });

                $day_values = array_values($filtered_values);
                $isHoliday = count($day_values) > 0;
                $sheet->setCellValue($cell, $num);
                if ($isHoliday) {
                    $sheet->getStyle($cell)->getFont()->getColor()->setRGB('B61721');
                }
            }

            $c = $day_count - $row_count * 7;

            for ($i = $c; $i < 42; $i++) {
                $cell = $this->getCalendarCol($target_base_column, $day_pos) . $current_row;
                $day_count++;
                $day_pos++;
                if ($day_pos > 6) {
                    $day_pos = 0;
                    $current_row++;
                }
                $num = $last_num + 1 + $i - $c;
                $num = $num > $num_days_next_month ? $num - $num_days_next_month : $num;

                if ($i - $c >= 42 - $c - 7) continue;

                $sheet->setCellValue($cell, $num);
                $sheet->getStyle($cell)->getFont()->getColor()->setRGB('ced2d4');
            }

            // カレンダー配置計算
            $cc++;
            if ($cc > 2) {
                $cc = 0;
                $rr++;
            }
            if ($month == 12) {
                $year++;
            }
        }

        // 表生成
        foreach ($render_month as $i => $month) {
            $cell = $this->columnTable[$i] . $this->rowTable;
            $sheet->setCellValue($cell, $month . '月');
        }
        $current_row = $this->rowTable + 1;

        // 歴日数
        $year = (int) $origin['year'];
        $num_date = [];
        foreach ($render_month as $i => $month) {
            $cell = $this->columnTable[$i] . $current_row;
            $val = date('j', strtotime('last day of', strtotime('01-' . $month . '-' . $year)));
            $sheet->setCellValue($cell, $val);

            $num_date[$month] = date('j', strtotime('last day of', strtotime('01-' . $month . '-' . $year)));
            if ($month == 12) {
                $year++;
            }
        }
        $current_row++;

        // 休日日数
        $year = (int) $origin['year'];
        $num_holiday = [];
        foreach ($render_month as $i => $month) {
            $cell = $this->columnTable[$i] . $current_row;

            $filtered_holidays = array_filter($values, function ($item) use ($month, $year) {
                return $item['month'] == $month && $item['year'] == $year;
            });
            $holidays = array_values($filtered_holidays);
            $num_holiday[$month] = count($holidays);

            $val = count($holidays);
            $sheet->setCellValue($cell, $val);

            if ($month == 12) {
                $year++;
            }
        }
        $current_row++;

        // 月間所定労働日数
        $num_work = [];
        foreach ($render_month as $i => $month) {
            $cell = $this->columnTable[$i] . $current_row;
            $num_work[$month] = $num_date[$month] - $num_holiday[$month];
            $val =  $num_date[$month] - $num_holiday[$month];
            $sheet->setCellValue($cell, $val);
        }
        $current_row++;

        // 月間所定労働時間
        foreach ($render_month as $i => $month) {
            $cell = $this->columnTable[$i] . $current_row;
            $val = fmod($num_work[$month] * $work_time, 1) == 0 ? $num_work[$month] * $work_time : number_format($num_work[$month] * $work_time, 1);
            $sheet->setCellValue($cell, $val);
        }

        $current_row = 48;

        $holiday_num = count($values);
        $agreed_hours = $agreed_hours_day_h + $agreed_hours_day_m / 60;
        $yearly_work_days = 365 - $holiday_num;
        $yearly_work_times = $yearly_work_days * $agreed_hours;

        // 年間所定労働日数
        $cell = $this->columnTable[0] . $current_row;
        $sheet->setCellValue($cell, $yearly_work_days);
        $current_row++;

        // 年間所定労働時間
        $cell = $this->columnTable[0] . $current_row;
        $sheet->setCellValue($cell, $yearly_work_times);
        $current_row++;

        // 1日所定実働時間
        $cell = $this->columnTable[0] . $current_row;
        $sheet->setCellValue($cell, $agreed_hours);
        $current_row++;

        // 年間休日日数
        $cell = $this->columnTable[0] . $current_row;
        $sheet->setCellValue($cell, $holiday_num);
        $current_row++;

        // 週平均所定労働日数
        $cell = $this->columnTable[0] . $current_row;
        $sheet->setCellValue($cell, number_format($yearly_work_days / 52, 1));
        $current_row++;

        // 週平均所定労働時間
        $cell = $this->columnTable[0] . $current_row;
        $sheet->setCellValue($cell, number_format($yearly_work_days / 52 * $agreed_hours, 1));
        $current_row++;
    }

    public function deleteTemp()
    {
        if (file_exists($this->temp)) {
            unlink($this->temp);
        }
    }

    public function outputToFile($xlsx)
    {
        $writer = new XlsxWriter($this->spreadsheet);
        $writer->save($xlsx);
        \Log::info("Spreadsheet saved to: {$xlsx}");
    }

    public function export($export_excel_path, $export_pdf_path)
    {
        if (file_exists($export_excel_path)) {
            $path = app_path() . '/PdfService';
            $cmd = 'export HOME=/tmp; export LANG=ja_JP.UTF-8; export LC_ALL=ja_JP.UTF-; libreoffice --headless -env:UserInstallation=file://' . $path . ' --convert-to pdf --outdir ' . $export_pdf_path . ' ' . $export_excel_path;
            return exec($cmd);
        }
    }

    public function getTempPdf()
    {
        return Storage::path('shift-template/' . $this->tempPdf);
    }


    private function getCalendarCol($originCol, $i)
    {

        return $this->columnRangeCalendar[$originCol][$i];
    }
}
