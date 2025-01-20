<?php

namespace App\Http\Controllers\Ledger;

use App\Permission;
use App\EgovAPI\MixXmlEgovSigner;
use App\Http\Controllers\Controller;
use App\Http\Requests\NationalPensionCategory3InsuredPersonNoticeRequest;
use App\Models\Certificate;
use App\Models\CurrentUser;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;

class NationalPensionCategory3InsuredPersonNoticeController extends Controller
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

        $procedureName = $this->getProcedureName($request);

        $company = CurrentUser::currentCompany();
        $companyId = $company->id;
        $existPresident = Employee::whereHas('branch', function ($query) use ($companyId) {
            $query->where('company_id', $companyId);
        })
            ->where('employee_type', 1)
            ->where('delete_flg', 0)
            ->exists();

        $certificate = Certificate::where('company_id', $companyId)
            ->where('delete_flg', 0)
            ->first();

        $egovAcount = $this->egovAcount();

        $imagePath1 = public_path('img/4950013521035000_1.png');
        $imageData1 = File::get($imagePath1);
        $base64Data1 = base64_encode($imageData1);
        $dataUri1 = 'data:image/png;base64,' . $base64Data1;

        $imagePath2 = public_path('img/4950013521035000_2.png');
        $imageData2 = File::get($imagePath2);
        $base64Data2 = base64_encode($imageData2);
        $dataUri2 = 'data:image/png;base64,' . $base64Data2;

        $imagePath3 = public_path('img/4950013521035000_3.png');
        $imageData3 = File::get($imagePath3);
        $base64Data3= base64_encode($imageData3);
        $dataUri3 = 'data:image/png;base64,' . $base64Data3;

        $convertToday = $this->convertWesternCalendarToJapaneseCalendar(Carbon::today());
        $todaySet = [
            'era' => $convertToday['japanese_calendar_era_string'],
            'year' => $convertToday['japanese_calendar_result']->year,
            'month' => $convertToday['japanese_calendar_result']->month,
            'day' => $convertToday['japanese_calendar_result']->day,
        ];
        $convertYesterday = $this->convertWesternCalendarToJapaneseCalendar(Carbon::yesterday());
        $yesterdaySet = [
            'era' => $convertYesterday['japanese_calendar_era_string'],
            'year' => $convertYesterday['japanese_calendar_result']->year,
            'month' => $convertYesterday['japanese_calendar_result']->month,
            'day' => $convertYesterday['japanese_calendar_result']->day,
        ];

        $current_employee = CurrentUser::info();
        $company = CurrentUser::currentCompany();

        return view('ledger.national_pension_category_3_insured_person_notice',
            COMPACT(
                'procedureName',
                'existPresident',
                'certificate',
                'egovAcount',
                'dataUri1',
                'dataUri2',
                'dataUri3',
                'todaySet',
                'yesterdaySet',
                'current_employee',
                'company'
            ));
    }

    public function post(NationalPensionCategory3InsuredPersonNoticeRequest $request) {

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

        $radio_keys = ["radio_file_other", "radio_file_basic_pension", "radio_file_livelihood_maintenance", "radio_file_business_owner", "radio_file_medical_insurer"];

        foreach ($radio_keys as $key) {
            if (!$request->has($key)) {
                $request->merge([$key => 0]);
            }
        }

        try {
            $XML = new MixXmlEgovSigner($request);
            $response = $XML->run($request);
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

