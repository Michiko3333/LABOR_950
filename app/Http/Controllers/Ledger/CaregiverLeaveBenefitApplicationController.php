<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use App\Http\Requests\CareLeaveBenefitEmploymentInsuranceCareLeaveBenefitApplicationRequest;
use App\Models\Branch;
use App\Models\CurrentUser;
use App\Models\Certificate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CaregiverLeaveBenefitApplicationController extends Controller
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
        $currentEmployee = CurrentUser::info();
        $currentBranch = Branch::where('id', $currentEmployee->branch_id)->first();
        $convertToday = $this->convertWesternCalendarToJapaneseCalendar(Carbon::today());
        $today = [
            'era' => $convertToday['japanese_calendar_era_string'],
            'year' => $convertToday['japanese_calendar_result']->year,
            'month' => $convertToday['japanese_calendar_result']->month,
            'date' => $convertToday['japanese_calendar_result']->day,
        ];

        return view('ledger.caregiver_leave_benefit_application', [
            'company' => $company,
            'current_employee' => $currentEmployee,
            'current_branch' => $currentBranch,
            'today' => $today,
            'certificate' => $certificate
        ]);
    }

    public function post(CareLeaveBenefitEmploymentInsuranceCareLeaveBenefitApplicationRequest $request)
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

        $radio_keys = ["radio_file_nursing_facts", "radio_file_nursing_care_recipient", "radio_file_wage_payment_status", "radio_file_closing_starts", "radio_file_other"];

        foreach ($radio_keys as $key) {
            if (!$request->has($key)) {
                $request->merge([$key => 0]);
            }
        }    
    }
}
