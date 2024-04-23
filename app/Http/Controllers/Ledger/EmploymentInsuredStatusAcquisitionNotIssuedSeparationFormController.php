<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmploymentInsuredStatusAcquisitionNotIssuedSeparationFormRequest;
use App\Models\Branch;
use App\Models\CurrentUser;
use App\Models\Prefecture;
use App\Models\Country;
use App\Models\Residential_status;
use App\Models\Values_employee_employment_status;
use App\Models\Certificate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmploymentInsuredStatusAcquisitionNotIssuedSeparationFormController extends Controller
{
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
        if($certificate !== null) {
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
            'date' => $convertToday['japanese_calendar_result']->day,
        ];

        $countries = Country::all();
        $residentials = Residential_status::all();
        $employmentStatuses = Values_employee_employment_status::all();

        return view(
            'ledger.employment_insured_status_acquisition_not_issued_separation_form',
            [
                'company' => $company,
                'current_employee' => $current_employee,
                'current_branch' => $current_branch,
                'today' => $today,
                'countries' => $countries,
                'residentials' => $residentials,
                'employmentStatuses' => $employmentStatuses,
                'certificate' => $certificate
            ]
        );
    }

    public function post(EmploymentInsuredStatusAcquisitionNotIssuedSeparationFormRequest $request)
    {
        $attachment = [];

        $data = $request->all();

        foreach ($data as $key => $value) {
            if (strpos($key, 'radio_') === 0) {
                $file_key = substr($key, strlen('radio_'));
                $label_key = 'label_' . $file_key;

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

        $radio_keys = ["radio_file_disqualification_status", "radio_file_other"];

        foreach ($radio_keys as $key) {
            if (!$request->has($key)) {
                $request->merge([$key => 0]);
            }
        }    

    }
}
