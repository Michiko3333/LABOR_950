<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CurrentUser;
use App\Models\Certificate;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\HealthInsurancePensionInsuredQualificationRequest;
use App\EgovAPI\MixXmlEgovSigner;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class HealthInsurancePensionInsuredQualificationLossController extends Controller
{
    public function index(Request $request)
    {
        $imagePath = public_path('img/ledger.png');

        $imageData = File::get($imagePath);

        $base64Data = base64_encode($imageData);
                
        $dataUri = 'data:image/png;base64,' . $base64Data;     

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
        $todaySet = [
            'era' => $convertToday['japanese_calendar_era_string'],
            'year' => $convertToday['japanese_calendar_result']->year,
            'month' => $convertToday['japanese_calendar_result']->month,
            'day' => $convertToday['japanese_calendar_result']->day,
        ];
        
        return view('ledger.health_insurance_pension_insured_qualification_loss', ['company' => $company, 'todaySet' => $todaySet, 'dataUri' => $dataUri, 'certificate' => $certificate]);
    }

    public function post(HealthInsurancePensionInsuredQualificationRequest $request)
    {
        try {
            

            $data = [
                'submission_year' => $request->input('submission_year'),
                'submission_month' => $request->input('submission_month'),
                'submission_day' => $request->input('submission_day'),
                'pension_office_reference_prefecture' => $request->input('pension_office_reference_prefecture'),
                'pension_office_reference_no_cities' => $request->input('pension_office_reference_no_cities'),
                'pension_office_reference_no_office' => $request->input('pension_office_reference_no_office'),
                'insurance_office_no' => $request->input('insurance_office_no'),
                'post_code_former' => $request->input('post_code_former'),
                'post_code_latter' => $request->input('post_code_latter'),
                'branch_address' => $request->input('branch_address'),
                'branch_name' => $request->input('branch_name'),
                'entrepreneur_name' => $request->input('entrepreneur_name'),
                'branch_tel_area_code' => $request->input('branch_tel_area_code'),
                'branch_tel_city_code' => $request->input('branch_tel_city_code'),
                'branch_tel_subscriber_code' => $request->input('branch_tel_subscriber_code'),
                'labor_consultant_name' => $request->input('labor_consultant_name'),
                'insured_reference_number' => $request->input('insured_reference_number'),
                'name_kana' =>  $request->input('name_kana'),
                'name' => $request->input('name'),
                'birthday_year' => $request->input('birthday_year'),
                'birthday_month' => $request->input('birthday_month'),
                'birthday_day' => $request->input('birthday_day'),
                'mynumber_card_no' =>  $request->input('mynumber_card_no'),
                'loss_year' => $request->input('loss_year'),
                'loss_month' => $request->input('loss_month'),
                'loss_day' => $request->input('loss_day'),
                'retirement_date_year' => $request->input('retirement_date_year'),
                'retirement_date_month' => $request->input('retirement_date_month'),
                'retirement_date_day' => $request->input('retirement_date_day'),
                'passed_away_date_year' => $request->input('passed_away_date_year'),
                'passed_away_date_month' => $request->input('passed_away_date_month'),
                'passed_away_date_day' => $request->input('passed_away_date_day'),
                'remarks_other_details' => $request->input('remarks_other_details'),
                'insurance_card_attached' => $request->input('insurance_card_attached'),
                'insurance_card_irrepayable' => $request->input('insurance_card_irrepayable'),
                'over_70_non_applicable_date_year' => $request->input('over_70_non_applicable_date_year'),
                'over_70_non_applicable_date_month' => $request->input('over_70_non_applicable_date_month'),
                'over_70_non_applicable_date_day' => $request->input('over_70_non_applicable_date_day'),
            ];
            $XML = new MixXmlEgovSigner($request);
            $response = $XML->run($request);            
            if ( $response[0] == false ){
                $errorMessage = $response[1];
                return redirect()->back()->withErrors($errorMessage)->withInput();
            }
            return view('admin.companies', ['send_data' => $data]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
