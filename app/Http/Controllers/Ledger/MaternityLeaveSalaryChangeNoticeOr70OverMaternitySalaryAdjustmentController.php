<?php

namespace App\Http\Controllers\Ledger;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MaternityLeaveSalaryChangeNoticeOr70OverMaternitySalaryAdjustmentRequest;
use App\Models\Branch;
use App\Models\CurrentUser;
use App\Models\Country;
use App\Models\Residential_status;
use App\Models\Certificate;
use Carbon\Carbon;
use App\Permission;
use App\Models\Employee;
use App\EgovAPI\MixXmlEgovSigner;
use Illuminate\Validation\ValidationException;

class MaternityLeaveSalaryChangeNoticeOr70OverMaternitySalaryAdjustmentController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission;
            if (!$userPermission->isSelectedCompany() || $userPermission->denyProcedure() || !$userPermission->isReadableFor(8) || !$userPermission->isWritableFor(8) || !$userPermission->isBasicDepartment()) {

                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }
    public function index(Request $request)
    {
        if (!$this->isSelectedCompany()) {
            return redirect()->route('home.select');
        }

        $company = CurrentUser::currentCompany();
        $companyId = $company->id;
        $certificate = Certificate::where('company_id', $companyId)
        ->where('delete_flg', 0)
        ->first();

        if ($certificate !== null) {
            $certificate = true;
        } else {
            $certificate = false;
        }

        $current_employee = CurrentUser::info();
        $current_branch_id = $current_employee->branch_id;
        $current_branch = Branch::where('id', $current_branch_id)->first();
        $convertToday = $this->convertWesternCalendarToJapaneseCalendar(Carbon::today());
        $today = [
            'era' => $convertToday['japanese_calendar_era_string'],
            'year' => $convertToday['japanese_calendar_result']->year,
            'month' => $convertToday['japanese_calendar_result']->month,
            'date' => $convertToday['japanese_calendar_result']->day
        ];

        $countries = Country::all();
        $residentials = Residential_status::all();
        $egovAcount = $this->egovAcount();
        $procedureName = $this->getProcedureName($request);

        $existPresident = Employee::whereHas('branch', function ($query) use ($companyId) {
            $query->where('company_id', $companyId);
        })
        ->where('employee_type', 1)
        ->where('delete_flg', 0)
        ->exists();
        return view('ledger.maternity_leave_salary_change_notice_or70_over_maternity_salary_adjustment',[
        'company' => $company,
        'countries' => $countries,
        'residentials' => $residentials,
        'certificate' => $certificate,
        'egovAcount' => $egovAcount,
        'procedureName' => $procedureName,
        'existPresident' => $existPresident,
        'current_branch' => $current_branch,
        'today' => $today,
        'current_employee'=>$current_employee
        ]);
    }
    public function post(MaternityLeaveSalaryChangeNoticeOr70OverMaternitySalaryAdjustmentRequest $request)
    {
        $attachment = [];
        $data = $request->all();
        foreach ($data as $key => $value) {
            if (strpos($key, 'radio_') === 0) {
                $file_key = substr($key, strlen('radio_'));
                $label_key = ($file_key === 'file_other') ? 'input_file_other' : 'label_' . $file_key;
                $attachment_type = ($value === '2') ? '添付' : '別送';
                $attached_document_name = $request->input($label_key);
                $attachment_file_name = '';
                if ($value === '2' && $request->hasFile($file_key)) {
                    $file = $request->file($file_key);
                    $attachment_file_name = $file->getClientOriginalName();
                }
                $attachment[] = [
                    'attachment_type' => $attachment_type,
                    'attached_document_name' => $attached_document_name,
                    'attachment_file_name' => $attachment_file_name,
                    'submission_info' => '1'
                ];
            }
        }

        if (!empty($attachment)) {
            $request->merge(['attachment' => $attachment]);
        }
        $radio_keys = ["radio_file_other"];
        foreach ($radio_keys as $key) {
            if (!$request->has($key)) {
                $request->merge([$key => 0]);
            }
        }try {
            $XML = new MixXmlEgovSigner($request);
            $response = $XML->run($request,$separater = True);
            if ($response[0] == false) {
                $errorMessage = $response[1];
                \Log::error(print_r($response, true));
                return redirect()->back()->withErrors($errorMessage)->withInput();
            }
            $this->putSuccess("送信に成功しました");
            if($request->input('query_parameter')) {
                return redirect()->to($request->input('query_parameter'));
            } else {
                return redirect()->route('ledger.index');
            }
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
