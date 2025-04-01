<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\ChildcareLeaveApplicationOrExtensionEndNoticeRequest;
use Illuminate\Support\Facades\File;
use App\EgovAPI\MixXmlEgovSigner;
use App\Models\CurrentUser;
use App\Models\Branch;
use App\Models\Certificate;
use Carbon\Carbon;
use App\EgovAPI\CsvFormatter;
use App\Permission;
use App\Models\Employee;

class ChildcareLeaveApplicationOrExtensionEndNoticeController extends Controller
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
        $imagePath = public_path('img/4950013521029000.png');
        $imageData = File::get($imagePath);
        $base64Data = base64_encode($imageData);
        $dataUri = 'data:image/png;base64,' . $base64Data;

        if (!$this->isSelectedCompany()) {
            return redirect()->route('home.select');
        }

        $company = CurrentUser::currentCompany();
        $companyId = $company->id;
        $businessOwner = Branch::join('m_employee', 'm_branch.id', '=', 'm_employee.branch_id')
            ->select('m_employee.last_name as last_name', 'm_employee.first_name as first_name')
            ->where('m_employee.employee_type', 1)
            ->where('m_branch.company_id', $companyId)
            ->first();
        $certificate = Certificate::where('company_id', $companyId)
            ->where('delete_flg', 0)
            ->first();
        if ($certificate !== null) {
            $certificate = true;
        } else {
            $certificate = false;
        }

        $current_employee = CurrentUser::info();
        $convertToday = $this->convertWesternCalendarToJapaneseCalendar(Carbon::today());
        $todaySet = [
            'era' => $convertToday['japanese_calendar_era_string'],
            'year' => $convertToday['japanese_calendar_result']->year,
            'month' => $convertToday['japanese_calendar_result']->month,
            'date' => $convertToday['japanese_calendar_result']->day,
        ];
        $egovAcount = $this->egovAcount();
        $procedureName = $this->getProcedureName($request);
        $existPresident = Employee::whereHas('branch', function ($query) use ($companyId) {
            $query->where('company_id', $companyId);
        })
            ->where('employee_type', 1)
            ->where('delete_flg', 0)
            ->exists();

        return view('ledger.childcare_leave_application_or_extension_end_notice', [
                'company' => $company,
                'todaySet' => $todaySet,
                'dataUri' => $dataUri,
                'current_employee' => $current_employee,
                'certificate' => $certificate,
                'procedureName' => $procedureName,
                'egovAcount' => $egovAcount,
                'businessOwner' => $businessOwner,
                'existPresident' => $existPresident,
        ]);
    }

    public function post(ChildcareLeaveApplicationOrExtensionEndNoticeRequest $request)
    {
        $csvFormatter = new CsvFormatter();
        $request = $csvFormatter->csvFomat($request);
        $csvText = $csvFormatter->getCsvText();
        $data = $request->all();

        $attachment = [];

        foreach ($data as $key => $value) {
            if (strpos($key, 'radio_') === 0) {
                $file_key = substr($key, strlen('radio_'));
                $label_key = ($file_key === 'file_other') ? 'input_file_other' : 'label_' . $file_key;

                $attachment_type = ($value === '2') ? '添付' : ($value === '1' ? '別送' : '');

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

        $radio_keys = ["radio_file_wage_ledger", "radio_file_attendance_record", "radio_file_other"];

        foreach ($radio_keys as $key) {
            if (!$request->has($key)) {
                $request->merge([$key => 0]);
            }
        }

        try {
            $XML = new MixXmlEgovSigner($request);
            $response = $XML->run($request, false, $csvText);
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
