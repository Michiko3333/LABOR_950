<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use App\Http\Requests\CareLeaveBenefitEmploymentInsuranceCareLeaveBenefitApplicationRequest;
use App\Models\Branch;
use App\Models\CurrentUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CaregiverLeaveBenefitApplicationController extends Controller
{
    public function index(Request $request)
    {
        // 操作する会社が設定されているか
        if (!$this->isSelectedCompany()) {
            return redirect()->route('home.select');
        }

        $company = CurrentUser::currentCompany();
        $currentEmployee = CurrentUser::info();
        $currentBranch = Branch::where('id', $currentEmployee->branch_id)->first();

        $today = Carbon::today();
        $convertedToday = $this->convertWesternCalendarToJapaneseCalendar($today)['japanese_calendar_result']->toArray();

        return view('ledger.caregiver_leave_benefit_application', [
            'company' => $company,
            'current_employee' => $currentEmployee,
            'current_branch' => $currentBranch,
            'today' => $convertedToday
        ]);
    }

    public function post(CareLeaveBenefitEmploymentInsuranceCareLeaveBenefitApplicationRequest $request)
    {
        // TODO:
    }
}
