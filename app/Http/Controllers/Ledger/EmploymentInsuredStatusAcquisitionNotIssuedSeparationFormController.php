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
        // TODO:
    }
}
