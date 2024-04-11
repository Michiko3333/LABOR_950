<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmploymentInsuredTransferNotificationRequest;
use App\Models\CurrentUser;
use App\Models\Certificate;
use Carbon\Carbon;


class EmploymentInsuredTransferNotificationController extends Controller
{
    public function index(Request $request)
    {
        // 操作する会社が設定されているか
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

        $convertToday = $this->convertWesternCalendarToJapaneseCalendar(Carbon::today());
        $today = [
            'era' => $convertToday['japanese_calendar_era_string'],
            'year' => $convertToday['japanese_calendar_result']->year,
            'month' => $convertToday['japanese_calendar_result']->month,
            'date' => $convertToday['japanese_calendar_result']->day,
        ];

        return view('ledger.employment_insured_transfer_notification', ['company' => $company, 'today' => $today, 'certificate' => $certificate]);
    }

    public function post(EmploymentInsuredTransferNotificationRequest $request)
    {
        // TODO: 方針決まり次第加筆
        // var_dump($request->input());
        // return back()->withErrors("");
    }
}
