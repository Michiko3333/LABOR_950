<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Models\Company;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Pickup_setting;
use App\Models\Pickup;
use App\Models\Pickup_message;
use App\Models\Calendar_event;
use App\Models\Bonus;
use App\Models\Closure_information;

class PickupBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:pick-up';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'pickup通知の管理';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::beginTransaction();
        try {
            $company_map = [];

            $insertData = [];

            $today = Carbon::today();

            $pickups = Pickup::where('delete_flg', 0)->where('anonymous_flg', 0)->get();
            // 期日が今日のデータを非通知にする
            foreach($pickups as $pickup) {
                if(Carbon::parse($pickup->due_date)->isSameDay($today) ) {
                    $pickup->update(['anonymous_flg' => 1]);
                }
            }

            $calendar_pickups = Pickup::where('delete_flg', 0)
                ->where('pickup_type_id', 16)
                ->get();
            foreach($calendar_pickups as $pickup) {
                $calendar_event = Calendar_event::where('id', $pickup->calendar_event_id)->first();
                $form_date = Carbon::parse($calendar_event->from);
                $to_date = Carbon::parse($calendar_event->to);
                $due_date = Carbon::parse($pickup->due_date);
                $condition = ($calendar_event->delete_flg === 1 || $calendar_event->category_type !== 7
                    || $form_date->isSameDay($due_date) || $to_date->isSameDay($due_date));

                if($condition) {
                    Pickup::where('calendar_event_id', $pickup->calendar_event_id)
                        ->update([
                            'delete_flg' => 1,
                        ]);
                }
            }

            $employees = Employee::join('m_branch as branch', 'm_employee.branch_id', '=', 'branch.id')
                ->join('m_company as company', 'branch.company_id', '=', 'company.id')
                ->select(
                    'company.id as company_id', 
                    'm_employee.id', 
                    'm_employee.last_name', 
                    'm_employee.first_name', 
                    'm_employee.birthday', 
                )
                ->where('m_employee.delete_flg', 0)
                ->get();

            foreach ($employees as $employee) {
                $company_id = $employee->company_id;

                if (!isset($company_map[$company_id])) {
                    $company_map[$company_id] = [];
                }

                $company_map[$company_id][] = [
                    'id' => $employee->id,
                    'last_name' => $employee->last_name,
                    'first_name' => $employee->first_name,
                    'birthday' => $employee->birthday,
                ];
            }

            foreach($company_map as $key => $company) {
                $companyPickupSetting = Pickup_setting::where('company_id', $key)->first();
                if (empty($companyPickupSetting)) {
                    $companyPickupSetting = new Pickup_setting([
                        'company_id' => $key,
                        'nursing_care_insurance_premium_deduction_begins' => 60,
                        'application_for_attainment_wage_certificate' => 30,
                        'end_of_nursing_care_insurance_premium_deduction' => 30,
                        'loss_of_eligibility_for_employees_pension_insurance' => 30,
                        'loss_of_health_insurance_status' => 30,
                        'labor_insurance_annual_renewal_start' => '05-01',
                        'year_end_tax_adjustment_start' => '12-01',
                        'year_end_tax_adjustment_end' => '12-31',
                        'retirement_age' => 65,
                        'retirement' => 365,
                        'officers_ids' => null,
                        'officers_birthday' => 1,
                        'settlement_date' => 30,
                        'start_of_closure' => 30,
                        'end_of_closure' => 30,
                        'change_in_dependent_status' => 5,
                        'subsidies_and_grants' => 30,
                        'report_on_the_status_of_elderly_and_disabled_people' => '06-01',
                        'bonus_payment_notice' => 30,
                        'basis_of_calculation' => '06-15',
                    ]);
                }

                $currentYear = Carbon::now()->year;

                $currentCompany = Company::where('id', $key)->first();
                $employeeSum = $currentCompany->employee_sum;
                $start_month_of_year = $currentCompany->start_month_of_year;
                $start_day_of_month = $currentCompany->start_day_of_month;
                $company_settlement_date = ($start_month_of_year && $start_day_of_month) ? Carbon::create($currentYear, $start_month_of_year, $start_day_of_month) : null;
                if(!empty($company_settlement_date)) {
                    $company_settlement_date->subDay();
                }

                $company_calendar_events = Calendar_event::select('id', 'subsidies_name', 'from', 'to')
                    ->where('delete_flg', 0)
                    ->where('company_id', $key)
                    ->where('category_type', 7)
                    ->whereDate('from', '>=', $today)
                    ->get();

                $branches = Branch::join('m_company', 'm_branch.company_id', '=', 'm_company.id')
                    ->where('m_company.id', $key)
                    ->where('m_branch.delete_flg', 0)
                    ->pluck('m_branch.id');

                $bonus_payment_months = Bonus::join('m_branch', 'm_bonus.branch_id', '=', 'm_branch.id')
                    ->select('m_bonus.bonus_payment_month', 'm_bonus.applied_date')
                    ->whereIn('m_bonus.branch_id', $branches)
                    ->where('m_branch.delete_flg', 0)
                    ->where('m_bonus.delete_flg', 0)
                    ->get();

                $basis_of_calculation_date = $companyPickupSetting->basis_of_calculation;
                if(!empty($basis_of_calculation_date)) {
                    list($month, $day) = explode('-', $basis_of_calculation_date);
                    if($currentYear % 4 !== 0) {
                        if($month . '-' . $day === '02-29') {
                            $day = '28';
                        }
                    }
                    $basis_of_calculation_date_date = Carbon::create($currentYear, $month, $day);
                }

                if(!empty($companyPickupSetting)) {
                    $nursing_care_insurance_premium_deduction_begins = $companyPickupSetting->nursing_care_insurance_premium_deduction_begins ?? '';
                    $application_for_attainment_wage_certificate = $companyPickupSetting->application_for_attainment_wage_certificate ?? '';
                    $end_of_nursing_care_insurance_premium_deduction = $companyPickupSetting->end_of_nursing_care_insurance_premium_deduction ?? '';
                    $loss_of_eligibility_for_employees_pension_insurance = $companyPickupSetting->loss_of_eligibility_for_employees_pension_insurance ?? '';
                    $loss_of_health_insurance_status = $companyPickupSetting->loss_of_health_insurance_status ?? '';

                    $labor_insurance_annual_renewal_start = $companyPickupSetting->labor_insurance_annual_renewal_start ?? '';
                    if(!empty($labor_insurance_annual_renewal_start)) {
                        list($month, $day) = explode('-', $labor_insurance_annual_renewal_start);
                        if($currentYear % 4 !== 0) {
                            if($month . '-' . $day === '02-29') {
                                $day = '28';
                            }
                        }
                        $labor_insurance_annual_renewal_start_date = Carbon::create($currentYear, $month, $day);
                    }
                    $labor_insurance_annual_renewal_end_date = Carbon::create($currentYear, 7, 10);
                    if($labor_insurance_annual_renewal_start_date->gt($labor_insurance_annual_renewal_end_date)) {
                        $labor_insurance_annual_renewal_end_date->addYear();
                    }

                    $year_end_tax_adjustment_start = $companyPickupSetting->year_end_tax_adjustment_start ?? '';
                    if(!empty($year_end_tax_adjustment_start)) {
                        list($month, $day) = explode('-', $year_end_tax_adjustment_start);
                        if($currentYear % 4 !== 0) {
                            if($month . '-' . $day === '02-29') {
                                $day = '28';
                            }
                        }
                        $year_end_tax_adjustment_start_date = Carbon::create($currentYear, $month, $day);
                    }
                    $year_end_tax_adjustment_end = $companyPickupSetting->year_end_tax_adjustment_end ?? '';
                    if(!empty($year_end_tax_adjustment_end)) {
                        list($month, $day) = explode('-', $year_end_tax_adjustment_end);
                        if($currentYear % 4 !== 0) {
                            if($month . '-' . $day === '02-29') {
                                $day = '28';
                            }
                        }
                        $year_end_tax_adjustment_end_date = Carbon::create($currentYear, $month, $day);

                        if($year_end_tax_adjustment_start_date->gt($year_end_tax_adjustment_end_date)) {
                            $year_end_tax_adjustment_end_date->addYear();
                        }
                    }

                    $retirement_age = $companyPickupSetting->retirement_age ?? '';
                    $retirement_age -= 1;
                    $retirement = $companyPickupSetting->retirement ?? '';

                    $officers_ids = $companyPickupSetting->officers_ids ?? '';
                    $officers_ids_array = array_map('intval', explode(',', $officers_ids));
                    $officers_birthday = $companyPickupSetting->officers_birthday ?? '';

                    $settlement_date = $companyPickupSetting->settlement_date ?? '';

                    $start_of_closure = $companyPickupSetting->start_of_closure ?? '';
                    $end_of_closure = $companyPickupSetting->end_of_closure ?? '';

                    $subsidies_and_grants = $companyPickupSetting->subsidies_and_grants ?? '';

                    $report_on_the_status_of_elderly_and_disabled_people = $companyPickupSetting->report_on_the_status_of_elderly_and_disabled_people ?? '';
                    if(!empty($report_on_the_status_of_elderly_and_disabled_people)) {
                        list($month, $day) = explode('-', $report_on_the_status_of_elderly_and_disabled_people);
                        $report_on_the_status_of_elderly_and_disabled_people_date = Carbon::create($currentYear, $month, $day);    
                    }

                    $bonus_payment_notice = $companyPickupSetting->bonus_payment_notice;

                    foreach($company as $employee) {
                        $employeeId = $employee['id'];
                        $employee_name = $employee['last_name'] . ' ' . $employee['first_name'];
                        $birthday = $employee['birthday'] ?? '';

                        if(!empty($birthday)) {
                            $year = substr($birthday, 0, 4);
                            $monthDay = substr($birthday, 5, 5);
                            if($currentYear % 4 !== 0) {
                                if($monthDay === '02-29') {
                                    $birthday = $year . '-02-28';
                                }
                            }
                            $age = Carbon::parse($birthday)->age;
                            $birthday_date = Carbon::parse($birthday)->format('n月j日');
                            $this_year_birthday = Carbon::parse($birthday)->setYear($currentYear);

                            // 40歳 介護保険料の控除開始
                            if(!empty($nursing_care_insurance_premium_deduction_begins)) {
                                if($age === 39) {
                                    $DateOfEstablishment = $this_year_birthday->copy()->subDays($nursing_care_insurance_premium_deduction_begins);

                                    if($today->isSameDay($DateOfEstablishment)) {
                                        $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                                            ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                                            ->where('m_pickup_type.id', 1)
                                            ->first();

                                        $search = ['pickup_type', 'employee', 'birthday', 'year'];
                                        $replace = [
                                            '介護保険',
                                            $employee_name,
                                            $birthday_date,
                                            '40歳',
                                        ];

                                        $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                                        $content = str_replace($search, $replace, $pickupMessage->content);

                                        $pickups = Pickup::where('employee_id', $employeeId)->where('pickup_type_id', 1)->get();
                                        if(!empty($pickups)) {
                                            foreach($pickups as $pickup) {
                                                $pickup->update([
                                                    'pickup_situation_id' => 4,
                                                    'anonymous_flg' => 1,
                                                ]);   
                                            }
                                        }

                                        $insertData[] = [
                                            'company_id' => $key,
                                            'pickup_type_id' => 1,
                                            'employee_id' => $employeeId,
                                            'closure_information_id' => null,
                                            'year' => null,
                                            'month' => null,
                                            'due_date' => $this_year_birthday,
                                            'calendar_event_id' => null,
                                            'business_name' => $business_name,
                                            'content' => $content,
                                            'created_at' => now(),
                                        ];
                                    }
                                }
                            }

                            // 60歳 到達時賃金証明書の申請
                            if(!empty($application_for_attainment_wage_certificate)) {
                                if($age === 59) {
                                    $DateOfEstablishment = $this_year_birthday->copy()->subDays($application_for_attainment_wage_certificate);

                                    if($today->isSameDay($DateOfEstablishment)) {
                                        $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                                            ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                                            ->where('m_pickup_type.id', 2)
                                            ->first();

                                        $search = ['pickup_type', 'employee', 'birthday', 'year'];
                                        $replace = [
                                            '社会保険',
                                            $employee_name,
                                            $birthday_date,
                                            '60歳',
                                        ];

                                        $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                                        $content = str_replace($search, $replace, $pickupMessage->content);

                                        $pickups = Pickup::where('employee_id', $employeeId)->where('pickup_type_id', 2)->get();
                                        if(!empty($pickups)) {
                                            foreach($pickups as $pickup) {
                                                $pickup->update([
                                                    'pickup_situation_id' => 4,
                                                    'anonymous_flg' => 1,
                                                ]); 
                                            }
                                        }

                                        $insertData[] = [
                                            'company_id' => $key,
                                            'pickup_type_id' => 2,
                                            'employee_id' => $employeeId,
                                            'closure_information_id' => null,
                                            'year' => null,
                                            'month' => null,
                                            'due_date' => $this_year_birthday,
                                            'calendar_event_id' => null,
                                            'business_name' => $business_name,
                                            'content' => $content,
                                            'created_at' => now(),
                                        ];
                                    }
                                }
                            }

                            // 65歳 介護保険料の控除終了
                            if(!empty($end_of_nursing_care_insurance_premium_deduction)) {
                                if($age === 64) {
                                    $DateOfEstablishment = $this_year_birthday->copy()->subDays($end_of_nursing_care_insurance_premium_deduction);

                                    if($today->isSameDay($DateOfEstablishment)) {
                                        $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                                            ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                                            ->where('m_pickup_type.id', 3)
                                            ->first();

                                        $search = ['pickup_type', 'employee', 'birthday', 'year'];
                                        $replace = [
                                            '介護保険',
                                            $employee_name,
                                            $birthday_date,
                                            '65歳',
                                        ];

                                        $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                                        $content = str_replace($search, $replace, $pickupMessage->content);

                                        $pickups = Pickup::where('employee_id', $employeeId)->where('pickup_type_id', 3)->get();
                                        if(!empty($pickups)) {
                                            foreach($pickups as $pickup) {
                                                $pickup->update([
                                                    'pickup_situation_id' => 4,
                                                    'anonymous_flg' => 1,
                                                ]); 
                                            }
                                        }

                                        $insertData[] = [
                                            'company_id' => $key,
                                            'pickup_type_id' => 3,
                                            'employee_id' => $employeeId,
                                            'closure_information_id' => null,
                                            'year' => null,
                                            'month' => null,
                                            'due_date' => $this_year_birthday,
                                            'calendar_event_id' => null,
                                            'business_name' => $business_name,
                                            'content' => $content,
                                            'created_at' => now(),
                                        ];
                                    }
                                }
                            }

                            // 70歳 厚生年金保険被保険者の資格喪失
                            if(!empty($loss_of_eligibility_for_employees_pension_insurance)) {
                                if($age === 69) {
                                    $DateOfEstablishment = $this_year_birthday->copy()->subDays($loss_of_eligibility_for_employees_pension_insurance);

                                    if($today->isSameDay($DateOfEstablishment)) {
                                        $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                                            ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                                            ->where('m_pickup_type.id', 4)
                                            ->first();

                                        $search = ['pickup_type', 'employee', 'birthday', 'year'];
                                        $replace = [
                                            '厚生年金',
                                            $employee_name,
                                            $birthday_date,
                                            '70歳',
                                        ];

                                        $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                                        $content = str_replace($search, $replace, $pickupMessage->content);

                                        $pickups = Pickup::where('employee_id', $employeeId)->where('pickup_type_id', 4)->get();
                                        if(!empty($pickups)) {
                                            foreach($pickups as $pickup) {
                                                $pickup->update([
                                                    'pickup_situation_id' => 4,
                                                    'anonymous_flg' => 1,
                                                ]); 
                                            }
                                        }

                                        $insertData[] = [
                                            'company_id' => $key,
                                            'pickup_type_id' => 4,
                                            'employee_id' => $employeeId,
                                            'closure_information_id' => null,
                                            'year' => null,
                                            'month' => null,
                                            'due_date' => $this_year_birthday,
                                            'calendar_event_id' => null,
                                            'business_name' => $business_name,
                                            'content' => $content,
                                            'created_at' => now(),
                                        ];
                                    }
                                }
                            }

                            // 75歳 健康保険被保険者の資格喪失
                            if(!empty($loss_of_health_insurance_status)) {
                                if($age === 74) {
                                    $DateOfEstablishment = $this_year_birthday->copy()->subDays($loss_of_health_insurance_status);

                                    if($today->isSameDay($DateOfEstablishment)) {
                                        $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                                            ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                                            ->where('m_pickup_type.id', 5)
                                            ->first();

                                        $search = ['pickup_type', 'employee', 'birthday', 'year'];
                                        $replace = [
                                            '厚生年金',
                                            $employee_name,
                                            $birthday_date,
                                            '75歳',
                                        ];

                                        $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                                        $content = str_replace($search, $replace, $pickupMessage->content);

                                        $pickups = Pickup::where('employee_id', $employeeId)->where('pickup_type_id', 5)->get();
                                        if(!empty($pickups)) {
                                            foreach($pickups as $pickup) {
                                                $pickup->update([
                                                    'pickup_situation_id' => 4,
                                                    'anonymous_flg' => 1,
                                                ]); 
                                            }
                                        }

                                        $insertData[] = [
                                            'company_id' => $key,
                                            'pickup_type_id' => 5,
                                            'employee_id' => $employeeId,
                                            'closure_information_id' => null,
                                            'year' => null,
                                            'month' => null,
                                            'due_date' => $this_year_birthday,
                                            'calendar_event_id' => null,
                                            'business_name' => $business_name,
                                            'content' => $content,
                                            'created_at' => now(),
                                        ];
                                    }
                                }
                            }

                            // 定年退職
                            if(!empty($retirement_age) && !empty($retirement)) {
                                if($age === $retirement_age) {
                                    $DateOfEstablishment = $this_year_birthday->copy()->subDays($retirement);

                                    if($today->isSameDay($DateOfEstablishment)) {
                                        $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                                            ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                                            ->where('m_pickup_type.id', 8)
                                            ->first();

                                        $search = ['pickup_type', 'employee', 'birthday', 'year'];
                                        $replace = [
                                            '定年退職',
                                            $employee_name,
                                            $birthday_date,
                                            $retirement_age + 1 . '歳',
                                        ];

                                        $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                                        $content = str_replace($search, $replace, $pickupMessage->content);

                                        $pickups = Pickup::where('employee_id', $employeeId)->where('pickup_type_id', 8)->get();
                                        if(!empty($pickups)) {
                                            foreach($pickups as $pickup) {
                                                $pickup->update([
                                                    'pickup_situation_id' => 4,
                                                    'anonymous_flg' => 1,
                                                ]); 
                                            }
                                        }

                                        $insertData[] = [
                                            'company_id' => $key,
                                            'pickup_type_id' => 8,
                                            'employee_id' => $employeeId,
                                            'closure_information_id' => null,
                                            'year' => null,
                                            'month' => null,
                                            'due_date' => $this_year_birthday,
                                            'calendar_event_id' => null,
                                            'business_name' => $business_name,
                                            'content' => $content,
                                            'created_at' => now(),
                                        ];
                                    }
                                }
                            }

                            // 役員の誕生日
                            if (in_array($employeeId, $officers_ids_array) && $officers_birthday) {
                                $DateOfEstablishment = $this_year_birthday->copy()->subDays($officers_birthday);

                                if($today->isSameDay($DateOfEstablishment)) {
                                    $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                                        ->select('m_pickup_message.business_name')
                                        ->where('m_pickup_type.id', 9)
                                        ->first();

                                    $search = ['employee', 'date'];
                                    $replace = [
                                        $employee_name,
                                        $officers_birthday . '日',
                                    ];

                                    $business_name = str_replace($search, $replace, $pickupMessage->business_name);

                                    $pickups = Pickup::where('employee_id', $employeeId)->where('pickup_type_id', 9)->where('year', $currentYear)->get();
                                    if(!empty($pickups)) {
                                        foreach($pickups as $pickup) {
                                            $pickup->update([
                                                'delete_flg' => 1,
                                            ]); 
                                        }
                                    }

                                    $insertData[] = [
                                        'company_id' => $key,
                                        'pickup_type_id' => 9,
                                        'employee_id' => $employeeId,
                                        'closure_information_id' => null,
                                        'year' => $currentYear,
                                        'month' => null,
                                        'due_date' => $this_year_birthday,
                                        'calendar_event_id' => null,
                                        'business_name' => $business_name,
                                        'content' => null,
                                        'created_at' => now(),
                                    ];
                                }
                            }

                            // 休業
                            $closure_informations = Closure_information::select(
                                    'id',
                                    'closure_type',
                                    'start_date_of_closed', 'end_date_of_losed',
                                    'planned_end_date_of_closure',
                                    'date_of_start_of_foster_care',
                                    'planned_end_date_of_child_support',
                                    'end_date_of_foster_care'
                                )
                                ->where('employee_id', $employeeId)
                                ->where('delete_flg', 0)
                                ->get();
                            if($closure_informations->isNotEmpty()) {
                                // 休業開始
                                if(!empty($start_of_closure)) {
                                    foreach($closure_informations as $closure_information) {
                                        if($closure_information->closure_type === 5) {
                                            if(empty($closure_information->date_of_start_of_foster_care))  {
                                                continue;
                                            }
                                            $due_date = Carbon::parse($closure_information->date_of_start_of_foster_care);
                                            $start_date_of_closed = $due_date->copy()->subDays($start_of_closure);
                                        } else {
                                            $due_date = Carbon::parse($closure_information->start_date_of_closed);
                                            $start_date_of_closed = $due_date->copy()->subDays($start_of_closure);
                                        }
                                        if($today->isSameDay($start_date_of_closed)) {
                                            $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                                                ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                                                ->where('m_pickup_type.id', 13)
                                                ->first();

                                            $search = ['pickup_type', 'employee', 'due_date'];
                                            $replace = [
                                                '休業開始',
                                                $employee_name,
                                                $due_date->format('Y年m月d日'),
                                            ];

                                            $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                                            $content = str_replace($search, $replace, $pickupMessage->content);

                                            $pickups = Pickup::where('employee_id', $employeeId)->where('closure_information_id', $closure_information->id)->where('pickup_type_id', 13)->get();
                                            if(!empty($pickups)) {
                                                foreach($pickups as $pickup) {
                                                    $pickup->update([
                                                        'pickup_situation_id' => 4,
                                                        'anonymous_flg' => 1,
                                                    ]); 
                                                }
                                            }

                                            $insertData[] = [
                                                'company_id' => $key,
                                                'pickup_type_id' => 13,
                                                'employee_id' => $employeeId,
                                                'closure_information_id' => $closure_information->id,
                                                'year' => null,
                                                'month' => null,
                                                'due_date' => $due_date,
                                                'calendar_event_id' => null,
                                                'business_name' => $business_name,
                                                'content' => $content,
                                                'created_at' => now(),
                                            ];
                                        }
                                    }
                                }
                                // 休業終了
                                if(!empty($end_of_closure) && (!empty($closure_information->end_date_of_foster_care) || !empty($closure_information->planned_end_date_of_child_support) || !empty($closure_information->end_date_of_losed))) {
                                    foreach($closure_informations as $closure_information) {
                                        if($closure_information->closure_type === 5) {
                                            $due_date = $closure_information->end_date_of_foster_care ? Carbon::parse($closure_information->end_date_of_foster_care) : Carbon::parse($closure_information->planned_end_date_of_child_support);
                                            $end_date_of_closed = $due_date->copy()->subDays($end_of_closure);
                                        } else {
                                            $due_date = Carbon::parse($closure_information->end_date_of_losed);
                                            $end_date_of_closed = $due_date->copy()->subDays($end_of_closure);
                                        }
                                        if($today->isSameDay($end_date_of_closed)) {
                                            $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                                                ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                                                ->where('m_pickup_type.id', 14)
                                                ->first();

                                            $search = ['pickup_type', 'employee', 'due_date'];
                                            $replace = [
                                                '休業終了',
                                                $employee_name,
                                                $due_date->format('Y年m月d日'),
                                            ];

                                            $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                                            $content = str_replace($search, $replace, $pickupMessage->content);

                                            $pickups = Pickup::where('employee_id', $employeeId)->where('closure_information_id', $closure_information->id)->where('pickup_type_id', 14)->get();
                                            if(!empty($pickups)) {
                                                foreach($pickups as $pickup) {
                                                    $pickup->update([
                                                        'pickup_situation_id' => 4,
                                                        'anonymous_flg' => 1,
                                                    ]); 
                                                }
                                            }

                                            $insertData[] = [
                                                'company_id' => $key,
                                                'pickup_type_id' => 14,
                                                'employee_id' => $employeeId,
                                                'closure_information_id' => $closure_information->id,
                                                'year' => null,
                                                'month' => null,
                                                'due_date' => $due_date,
                                                'calendar_event_id' => null,
                                                'business_name' => $business_name,
                                                'content' => $content,
                                                'created_at' => now(),
                                            ];
                                        }
                                    }
                                }
                            }
                        }
                    }

                    // 労働保険年度更新
                    if(!empty($labor_insurance_annual_renewal_start_date) && !empty($labor_insurance_annual_renewal_end_date)) {
                        if($labor_insurance_annual_renewal_start_date->isSameDay($today)) {
                            $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                                ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                                ->where('m_pickup_type.id', 6)
                                ->first();

                            $search = ['pickup_type', 'due_date'];
                            $replace = [
                                '労働保険',
                                $labor_insurance_annual_renewal_end_date->copy()->format('Y年n月j日'),
                            ];

                            $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                            $content = str_replace($search, $replace, $pickupMessage->content);

                            $pickups = Pickup::where('company_id', $key)->where('pickup_type_id', 6)->where('year', $currentYear)->get();
                            if(!empty($pickups)) {
                                foreach($pickups as $pickup) {
                                    $pickup->update([
                                        'pickup_situation_id' => 4,
                                        'anonymous_flg' => 1,
                                    ]); 
                                }
                            }

                            $insertData[] = [
                                'company_id' => $key,
                                'pickup_type_id' => 6,
                                'employee_id' => null,
                                'closure_information_id' => null,
                                'year' => $currentYear,
                                'month' => null,
                                'due_date' => $labor_insurance_annual_renewal_end_date,
                                'calendar_event_id' => null,
                                'business_name' => $business_name,
                                'content' => $content,
                                'created_at' => now(),
                            ];
                        }
                    }

                    // 年末調整
                    if(!empty($year_end_tax_adjustment_start_date) && !empty($year_end_tax_adjustment_end_date)) {
                        if($year_end_tax_adjustment_start_date->isSameDay($today)) {
                            $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                                ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                                ->where('m_pickup_type.id', 7)
                                ->first();

                            $pickups = Pickup::where('company_id', $key)->where('pickup_type_id', 7)->where('year', $currentYear)->get();
                            if(!empty($pickups)) {
                                foreach($pickups as $pickup) {
                                    $pickup->update([
                                        'pickup_situation_id' => 4,
                                        'anonymous_flg' => 1,
                                    ]); 
                                }
                            }

                            $insertData[] = [
                                'company_id' => $key,
                                'pickup_type_id' => 7,
                                'employee_id' => null,
                                'closure_information_id' => null,
                                'year' => $currentYear,
                                'month' => null,
                                'due_date' => $year_end_tax_adjustment_end_date,
                                'calendar_event_id' => null,
                                'business_name' => $pickupMessage->business_name,
                                'content' => $pickupMessage->content,
                                'created_at' => now(),
                            ];
                        }
                    }

                    // 決算日
                    if(!empty($company_settlement_date) && !empty($settlement_date)) {
                        $DateOfEstablishment = $company_settlement_date->copy()->subDays($settlement_date);
                        $format_company_settlement_date = $company_settlement_date->copy()->format('Y年n月j日');
                        $establishment_date = Carbon::parse($currentCompany->establishment_date);
                        $term = $today->diffInYears($establishment_date) + 1;

                        if($today->isSameDay($DateOfEstablishment)) {
                            $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                                ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                                ->where('m_pickup_type.id', 10)
                                ->first();

                            $search = ['due_date', 'established'];
                            $replace = [
                                $format_company_settlement_date,
                                $term,
                            ];

                            $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                            $content = str_replace($search, $replace, $pickupMessage->content);

                            $pickups = Pickup::where('company_id', $key)->where('pickup_type_id', 10)->where('year', $currentYear)->get();
                            if(!empty($pickups)) {
                                foreach($pickups as $pickup) {
                                    $pickup->update([
                                        'pickup_situation_id' => 4,
                                        'anonymous_flg' => 1,
                                    ]); 
                                }
                            }

                            $insertData[] = [
                                'company_id' => $key,
                                'pickup_type_id' => 10,
                                'employee_id' => null,
                                'closure_information_id' => null,
                                'year' => $currentYear,
                                'month' => null,
                                'due_date' => $company_settlement_date,
                                'calendar_event_id' => null,
                                'business_name' => $business_name,
                                'content' => $content,
                                'created_at' => now(),
                            ];
                        }
                    }

                    // 助成金・補助金
                    if(!empty($subsidies_and_grants) && !empty($company_calendar_events)) {
                        foreach($company_calendar_events as $event) {
                            $date = $event->to ? Carbon::parse($event->to)->subDays($subsidies_and_grants) 
                                : Carbon::parse($event->from)->subDays($subsidies_and_grants);
                            $due_date = $event->to ? $event->to : $event->from;
                            if($date->isSameDay($today)) {
                                $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                                    ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                                    ->where('m_pickup_type.id', 16)
                                    ->first();

                                $search = ['pickup_type', 'subsidies_name', 'date'];
                                $replace = [
                                    '助成金・補助金',
                                    $event->subsidies_name,
                                    $subsidies_and_grants . '日',
                                ];

                                $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                                $content = str_replace($search, $replace, $pickupMessage->content);

                                $pickup = Pickup::where('calendar_event_id', $event->id)->where('pickup_type_id', 16)->first();
                                if(!empty($pickup)) {
                                    $pickup->update([
                                        'company_id' => $key,
                                        'pickup_type_id' => 16,
                                        'employee_id' => null,
                                        'closure_information_id' => null,
                                        'year' => null,
                                        'month' => null,
                                        'due_date' => $due_date,
                                        'business_name' => $business_name,
                                        'content' => $content,
                                        'anonymous_flg' => 0,
                                        'delete_flg' => 0,
                                    ]);
                                } else {
                                    $insertData[] = [
                                        'company_id' => $key,
                                        'pickup_type_id' => 16,
                                        'employee_id' => null,
                                        'closure_information_id' => null,
                                        'year' => null,
                                        'month' => null,
                                        'due_date' => $due_date,
                                        'calendar_event_id' => $event->id,
                                        'business_name' => $business_name,
                                        'content' => $content,
                                        'created_at' => now(),
                                    ];
                                }
                            }
                        }
                    }

                    // 高齢者雇用状況報告書
                    if(!empty($report_on_the_status_of_elderly_and_disabled_people_date) && !empty($employeeSum)) {
                        if($employeeSum >= 31 && $report_on_the_status_of_elderly_and_disabled_people_date->isSameDay($today)) {
                            $due_date = Carbon::create($currentYear, 7, 15);
                            $format_due_date = $due_date->copy()->format('Y年n月j日');
                            $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                                ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                                ->where('m_pickup_type.id', 17)
                                ->first();

                            $search = ['pickup_type', 'due_date'];
                            $replace = [
                                '高齢報告書',
                                $format_due_date,
                            ];

                            $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                            $content = str_replace($search, $replace, $pickupMessage->content);

                            $pickups = Pickup::where('company_id', $key)->where('pickup_type_id', 17)->where('year', $currentYear)->get();
                            if(!empty($pickups)) {
                                foreach($pickups as $pickup) {
                                    $pickup->update([
                                        'pickup_situation_id' => 4,
                                        'anonymous_flg' => 1,
                                    ]); 
                                }
                            }

                            $insertData[] = [
                                'company_id' => $key,
                                'pickup_type_id' => 17,
                                'employee_id' => null,
                                'closure_information_id' => null,
                                'year' => $currentYear,
                                'month' => null,
                                'due_date' => $due_date,
                                'calendar_event_id' => null,
                                'business_name' => $business_name,
                                'content' => $content,
                                'created_at' => now(),
                            ];
                        }
                    }
                    // 障碍者状況等報告書
                    if(!empty($report_on_the_status_of_elderly_and_disabled_people_date) && !empty($employeeSum)) {
                        if($employeeSum >= 43.5 && $report_on_the_status_of_elderly_and_disabled_people_date->isSameDay($today)) {
                            $due_date = Carbon::create($currentYear, 7, 15);
                            $format_due_date = $due_date->copy()->format('Y年n月j日');
                            $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                                ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                                ->where('m_pickup_type.id', 18)
                                ->first();

                            $search = ['pickup_type', 'due_date'];
                            $replace = [
                                '障碍者報告書',
                                $format_due_date,
                            ];

                            $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                            $content = str_replace($search, $replace, $pickupMessage->content);

                            $pickups = Pickup::where('company_id', $key)->where('pickup_type_id', 18)->where('year', $currentYear)->get();
                            if(!empty($pickups)) {
                                foreach($pickups as $pickup) {
                                    $pickup->update([
                                        'pickup_situation_id' => 4,
                                        'anonymous_flg' => 1,
                                    ]); 
                                }
                            }

                            $insertData[] = [
                                'company_id' => $key,
                                'pickup_type_id' => 18,
                                'employee_id' => null,
                                'closure_information_id' => null,
                                'year' => $currentYear,
                                'month' => null,
                                'due_date' => $due_date,
                                'calendar_event_id' => null,
                                'business_name' => $business_name,
                                'content' => $content,
                                'created_at' => now(),
                            ];
                        }
                    }

                    // 健康保険・厚生年金保険被保険者賞与支払届
                    if(!empty($bonus_payment_months) && $bonus_payment_notice) {
                        foreach($bonus_payment_months as $bonus_payment_month) {
                            $bonus_payment_month_month = $bonus_payment_month->bonus_payment_month;
                            $applied_date = $bonus_payment_month->applied_date;

                            if (preg_match('/\d+/', $bonus_payment_month_month, $matches)) {
                                $bonus_payment_month_month = (int)$matches[0];
                                $bonus_payment_month_date = Carbon::create($currentYear, $bonus_payment_month_month, 1);
                                $bonus_payment_month_reference_date = $bonus_payment_month_date->copy()->subDays($bonus_payment_notice);

                                if($bonus_payment_month_date->gte($applied_date)) {
                                    if($today->isSameDay($bonus_payment_month_reference_date)) {
                                        $due_date = Carbon::create($currentYear, $bonus_payment_month_month, 5);
                                        $format_due_date = $due_date->copy()->format('Y年n月j日');
                                        $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                                            ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                                            ->where('m_pickup_type.id', 20)
                                            ->first();

                                        $search = ['pickup_type', 'month'];
                                        $replace = [
                                            '健康保険・厚生年金保険被保険者賞与支払届',
                                            $bonus_payment_month_month . '月',
                                        ];

                                        $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                                        $content = str_replace($search, $replace, $pickupMessage->content);

                                        $pickups = Pickup::where('company_id', $key)->where('pickup_type_id', 20)->where('year', $currentYear)->where('month', $bonus_payment_month_month)->get();
                                        if(!empty($pickups)) {
                                            foreach($pickups as $pickup) {
                                                $pickup->update([
                                                    'pickup_situation_id' => 4,
                                                    'anonymous_flg' => 1,
                                                ]); 
                                            }
                                        }

                                        $insertData[] = [
                                            'company_id' => $key,
                                            'pickup_type_id' => 20,
                                            'employee_id' => null,
                                            'closure_information_id' => null,
                                            'year' => $currentYear,
                                            'month' => $bonus_payment_month_month,
                                            'due_date' => $due_date,
                                            'calendar_event_id' => null,
                                            'business_name' => $business_name,
                                            'content' => $content,
                                            'created_at' => now(),
                                        ];
                                    }
                                }
                            }
                        }
                    }

                    // 算定基礎届
                    if($today->isSameDay($basis_of_calculation_date_date)) {
                        $due_date = Carbon::create($currentYear, 7, 10);
                        $format_due_date = $due_date->copy()->format('Y年n月j日');
                        $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                            ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                            ->where('m_pickup_type_id.id', 23)
                            ->first();

                        $search = ['pickup_type', 'due_date'];
                        $replace = [
                            '算定基礎届',
                            $format_due_date,
                        ];

                        $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                        $content = str_replace($search, $replace, $pickupMessage->content);

                        $pickups = Pickup::where('company_id', $key)->where('pickup_type_id', 23)->where('year', $currentYear)->get();
                        if(!empty($pickups)) {
                            foreach($pickups as $pickup) {
                                $pickup->update([
                                    'pickup_situation_id' => 4,
                                    'anonymous_flg' => 1,
                                ]); 
                            }
                        }

                        $insertData[] = [
                            'company_id' => $key,
                            'pickup_type_id' => 23,
                            'employee_id' => null,
                            'closure_information_id' => null,
                            'year' => $currentYear,
                            'month' => null,
                            'due_date' => $due_date,
                            'calendar_event_id' => null,
                            'business_name' => $business_name,
                            'content' => $content,
                            'created_at' => now(),
                        ];
                    }
                }
            }

            Pickup::insert($insertData);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);
        }
    }
}
