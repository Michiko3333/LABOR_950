<?php

namespace App\Http\Controllers\Contract;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeContractRequest;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\CurrentUser;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use Carbon\Carbon;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;

class EmployeeContractController extends Controller
{
    public function index(Request $request)
    {
        // 操作する会社が設定されているか
        if (!$this->isSelectedCompany()) {
            return redirect()->route('home.select');
        }

        $employee_id = $request->input('employee_id');

        $company = CurrentUser::currentCompany();
        $capital = Branch::select('m_branch.id', DB::raw("CONCAT(pref.name,address_city,address_ward,'  ',address_apartment) as address"))
            ->leftJoin('m_prefecture as pref', 'pref.id', '=', 'm_branch.address_prefecture')
            ->where('m_branch.company_id', $company->id)
            ->where('m_branch.branch_type', 1)
            ->first();
        $representative = Employee::select(DB::raw("CONCAT(last_name,' ',first_name) as test"))->where('branch_id', $capital->id)->where('employee_type', 1)->first();

        $json_permanent = __DIR__ . '/default_permanent.json';
        $json_permanent_content = File::get($json_permanent);
        $default_permanent = json_decode($json_permanent_content, true);

        $json_flexterm = __DIR__ . '/default_flexterm.json';
        $json_flexterm_content = File::get($json_flexterm);
        $default_flexterm = json_decode($json_flexterm_content, true);

        $currentDateTime = Carbon::now();
        $year = $currentDateTime->year - 2018;
        $month = $currentDateTime->month;
        $day = $currentDateTime->day;
        $str = $this->convertWesternCalendarToJapaneseCalendar($currentDateTime);

        return view('employee.contract', [
            'company' => $company,
            'default_permanent' => $default_permanent,
            'default_flexterm' => $default_flexterm,
            'info' => [
                'era' => $year,
                'month' => $month,
                'day' => $day,
                'address' => $capital->address ?? '',
                'company_name' => $company->name ?? '',
                'company_representative' => $representative->test ?? ''
            ],
        ]);
    }

    public function check(EmployeeContractRequest $request)
    {
        return true;
    }

    public function downlaod(EmployeeContractRequest $request)
    {
        $template_permanent = __DIR__ . '/template_permanent.docx';
        $template_flexterm = __DIR__ . '/template_flexterm.docx';
        if ($request->input('contract_type') == 1) {
            $templateFile = $template_permanent;
        } else {
            $templateFile = $template_flexterm;
        }

        $data = [
            'era' => $request->input('era', ''),
            'month' => $request->input('month', ''),
            'day' => $request->input('day', ''),
            'full_name' => $request->input('full_name', ''),
            'title' => $request->input('title', ''),
            'company_address' => $request->input('company_address', ''),
            'company_name' => $request->input('company_name', ''),
            'company_representative' => $request->input('company_representative', ''),
            'employment_period' => $request->input('employment_period', ''),
            'work_place' => $request->input('work_place', ''),
            'employer_type' => $request->input('employer_type', ''),
            'probation_period' => $request->input('probation_period', ''),
            'probation_period_detail' => $this->convertLine($request->input('probation_period_detail', '')),
            'duties' => $request->input('duties', ''),
            'duties_detail' => $this->convertLine($request->input('duties_detail', '')),
            'start_end_and_break_time' => $this->convertLine($request->input('start_end_and_break_time', '')),
            'holiday' => $this->convertLine($request->input('holiday', '')),
            'overtime_work' => $this->convertLine($request->input('overtime_work', '')),
            'vacation' => $this->convertLine($request->input('vacation', '')),
            'wages' => $this->convertLine($request->input('wages', '')),
            'renewal' => $this->convertLine($request->input('renewal', '')),
            'matters_of_retirement' => $this->convertLine($request->input('matters_of_retirement', '')),
            'matters_of_retirement_and_premature_termination' => $this->convertLine($request->input('matters_of_retirement_and_premature_termination', '')),
            'other_contract_matters' => $this->convertLine($request->input('other_contract_matters', '')),
            'other_contract_matters_and_convenant' => $this->convertLine($request->input('other_contract_matters_and_convenant', ''))
        ];

        $templateProcessor = new TemplateProcessor($templateFile);
        foreach ($data as $key => $value) {
            $templateProcessor->setValue($key, $value);
        }

        $fileName = '労働通知契約書_' . $request->input('full_name', '') . '.docx';

        return Response::stream(function () use ($templateProcessor) {
            // テンプレートを出力
            $templateProcessor->saveAs('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }

    private function convertLine(string $str)
    {
        $str = str_replace("\r\n", '</w:t><w:br/><w:t>', $str);
        return str_replace("\n", '</w:t><w:br/><w:t>', $str);
    }
}
