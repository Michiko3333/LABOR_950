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
        // TODO:
    }
}
