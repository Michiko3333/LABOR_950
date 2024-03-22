<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmploymentInsuredStatusAcquisitionNotIssuedSeparationFormRequest;
use App\Models\Branch;
use App\Models\CurrentUser;
use App\Models\Prefecture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmploymentInsuredStatusAcquisitionNotIssuedSeparationFormController extends Controller
{
    public function index(Request $request)
    {
        // 操作する会社が設定されているか
        if (!$this->isSelectedCompany()) {
            return redirect()->route('home.select');
        }

        $company = CurrentUser::currentCompany();
        $current_employee = CurrentUser::info();

        $current_branch = Branch::where('id', $current_employee->branch_id)->first();

        $today = Carbon::today();
        $converted_today = $this->convertWesternCalendarToJapaneseCalendar($today)['japanese_calendar_result']->toArray();

        return view('ledger.employment_insured_status_acquisition_not_issued_separation_form',
        [
            'company' => $company,
            'current_employee' => $current_employee,
            'current_branch' => $current_branch,
            'today' => $converted_today
        ]);
    }

    public function post(EmploymentInsuredStatusAcquisitionNotIssuedSeparationFormRequest $request)
    {
        // TODO:
    }
}
