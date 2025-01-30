<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use App\Http\Requests\StandardMonthlyRemunerationDuringChildcarePeriodInEmployeesPensionInsuranceRequest;
use App\Models\Values_employee_employment_status;
use App\Models\Branch;
use App\Models\CurrentUser;
use App\Models\Certificate;
use App\EgovAPI\MixXmlEgovSigner;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class StandardMonthlyRemunerationDuringChildcarePeriodInEmployeesPensionInsuranceController extends Controller
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
        $current_branch = Branch::where('id', $current_employee->branch_id)->first();
        $convertToday = $this->convertWesternCalendarToJapaneseCalendar(Carbon::today());
        $today = [
            'year' => $convertToday['japanese_calendar_result']->year,
            'month' => $convertToday['japanese_calendar_result']->month,
            'day' => $convertToday['japanese_calendar_result']->day,
        ];

        $employmentStatuses = Values_employee_employment_status::all();
        $egovAcount = $this->egovAcount();
        $procedureName = $this->getProcedureName($request);
        $imagePath = public_path('img/4950013521033000.png');
        $imageData = File::get($imagePath);
        $base64Data = base64_encode($imageData);
        $dataUri = 'data:image/png;base64,' . $base64Data;

        return view(
            'ledger.standard_monthly_remuneration_during_childcare_period_in_employees_pension_insurance',
            [
                'company' => $company,
                'current_employee' => $current_employee,
                'current_branch' => $current_branch,
                'today' => $today,
                'employmentStatuses' => $employmentStatuses,
                'certificate' => $certificate,
                'egovAcount' => $egovAcount,
                'procedureName' => $procedureName,
                'dataUri' => $dataUri
            ]
        );
    }

    public function post(StandardMonthlyRemunerationDuringChildcarePeriodInEmployeesPensionInsuranceRequest $request)
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
        $targetFiles = [
            'certificate_of_family_register',
            'certificate_of_residence',
            'other'
        ];
        foreach ($targetFiles as $targetFile) {
            if (!array_key_exists('checked_' . $targetFile, $data)) {
                $request['radio_file_' . $targetFile] = '0';
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
        }

        try {
            $XML = new MixXmlEgovSigner($request);
            $response = $response = $XML->run($request);
            if ($response[0] == false) {
                $errorMessage = $response[1];
                \Log::error(print_r($response, true));
                return redirect()->back()->withErrors($errorMessage)->withInput();
            }
            $this->putSuccess("送信に成功しました");
            if ($request->input('query_parameter')) {
                return redirect()->to($request->input('query_parameter'));
            } else {
                return redirect()->route('ledger.index');
            }
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
