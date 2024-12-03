<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BranchRequest;
use App\Models\Bonus;
use App\Models\Bonus_history;
use App\Models\Bounty;
use App\Models\Bounty_history;
use App\Models\CurrentUser;
use App\Models\Prefecture;
use App\Models\Values_branch_labor_insurance_payment_method;
use App\Models\Values_branch_place_type;
use App\Models\Values_branch_start_days_of_week;
use App\Models\Values_branch_work_style_type;
use App\Models\Branch;
use App\Models\Salary;
use App\Models\Salary_history;
use Carbon\Carbon;
use App\Permission;

class BranchController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission();
            if (!$userPermission->isSelectedCompany() || $userPermission->getEmployeeStatus() == 1) {
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function branch(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(2)) {
            return redirect()->route('home.index');
        }
        $current_company = CurrentUser::currentCompany();
        $branch = $current_company->branch()->where('delete_flg', 0)->get();
        $headquarters = $branch->where('branch_type', 1)->first();
        $company_id = $headquarters->company_id;
        $prefectures = Prefecture::pluck('name', 'id');
        $labor_insurance_payment_method = Values_branch_labor_insurance_payment_method::pluck('name', 'id');
        $place_type = Values_branch_place_type::pluck('name', 'id');
        $start_days_of_week = Values_branch_start_days_of_week::pluck('name', 'id');
        $work_style_type = Values_branch_work_style_type::pluck('name', 'id');
        $departments = $current_company->departments()->where('delete_flg', 0)->get();
        return view('branch', [
            'branch' => $branch,
            'company_id' => $company_id,
            'prefectures' => $prefectures,
            'labor_insurance_payment_method' => $labor_insurance_payment_method,
            'place_type' => $place_type,
            'start_days_of_week' => $start_days_of_week,
            'work_style_type' => $work_style_type,
            'departments' => $departments,
        ]);
    }

    public function branch_post(BranchRequest $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(2) || !$userPermission->isWritableFor(2)) {
            return redirect()->route('home.index');
        }

        DB::beginTransaction();
        try {
            $request->request->remove('_token');
            $data = $request->validationData($request);
            $address_city = $data['br-address_city'];
            $address_ward = $data['br-address_ward'];
            $address_apartment = $data['br-address_apartment'];
            $address_city_kana = $data['br-address_city_kana'];
            $address_ward_kana = $data['br-address_ward_kana'];
            $address_apartment_kana = $data['br-address_apartment_kana'];
            $current_company = CurrentUser::currentCompany();
            $id = $current_company->id;
            $brids = $request->input('br-id');
            $saids = $request->input('sa-id');
            $boids = $request->input('bo-id');
            $bouids = $request->input('bou-id');
            $excepts = [];
            foreach ($brids as $index => $brid) {
                $brdata = $this->data_branch($data, $index);
                $currentSaids = $saids[$index] ?? [];
                $currentboids = $boids[$index] ?? [];
                $currentbouids = $bouids[$index] ?? [];
                if ($brid > 0) {
                    Branch::where('id', $brid)->update($brdata);
                    $excepts[] = $brid;
                    $maxSalaryId = Salary::where('branch_id', $brid)->max('salary_id');
                    $newSalaryId = is_null($maxSalaryId) ? "1" : $maxSalaryId + 1;
                    $maxBonusId = Bonus::where('branch_id', $brid)->max('bonus_id');
                    $newBonusId = is_null($maxBonusId) ? "1" : $maxBonusId + 1;
                    $maxBountyId = Bounty::where('branch_id', $brid)->max('bounty_id');
                    $newBountyId = is_null($maxBountyId) ? "1" : $maxBountyId + 1;
                    foreach ($currentSaids as $saIndex => $said) {
                        $applied_date = $data['sa-applied_date'][$index][$saIndex];
                        if (!is_null($applied_date) && strtotime($applied_date) === false) {
                            $formatted_applied_date = Carbon::createFromFormat('Y年 m月', $applied_date)->format('Y-m-01');
                        } else {
                            $formatted_applied_date = $applied_date;
                        }
                        if ($said > 0) {
                            $departments = $data['sa-departments'][$index][$saIndex] ?? null;
                            if (!is_null($departments)) {
                                foreach ($departments as $department_processed) {
                                    Salary::updateOrCreate(
                                        [
                                            'salary_id' => $said,
                                            'department_id' => $department_processed,
                                            'branch_id' => $brid,
                                        ],
                                        [
                                            'payroll_deadline' => $data['sa-payroll_deadline'][$index][$saIndex],
                                            'payroll_month' => $data['sa-payroll_month'][$index][$saIndex],
                                            'payroll_day' => $data['sa-payroll_day'][$index][$saIndex],
                                            'applied_date' => $formatted_applied_date,
                                        ],
                                    );
                                }
                                Salary::where('salary_id', $said)
                                    ->where('branch_id', $brid)
                                    ->whereNotIn('department_id', $departments)
                                    ->update(['delete_flg' => 1]);
                                $departmentsAll = implode(',', $departments);
                                $salaryHistoryData = [
                                    'salary_id' => $newSalaryId,
                                    'department_id' => $departmentsAll,
                                    'branch_id' => $brid,
                                    'payroll_deadline' => $data['sa-payroll_deadline'][$index][$saIndex],
                                    'payroll_month' => $data['sa-payroll_month'][$index][$saIndex],
                                    'payroll_day' => $data['sa-payroll_day'][$index][$saIndex],
                                    'applied_date' => $formatted_applied_date,
                                ];
                                \Log::info(print_r($salaryHistoryData, true));
                                Salary_history::create($salaryHistoryData);
                            };
                        } else {
                            $departments = $data['sa-departments'][$index][$saIndex] ?? null;
                            if (!is_null($departments)) {
                                foreach ($departments as $department_processed) {
                                    $salaryData = [
                                        'salary_id' => $newSalaryId,
                                        'department_id' => $department_processed,
                                        'branch_id' => $brid,
                                        'payroll_deadline' => $data['sa-payroll_deadline'][$index][$saIndex],
                                        'payroll_month' => $data['sa-payroll_month'][$index][$saIndex],
                                        'payroll_day' => $data['sa-payroll_day'][$index][$saIndex],
                                        'applied_date' => $formatted_applied_date,
                                    ];
                                    Salary::create($salaryData);
                                }
                                $departmentsAll = implode(',', $departments);
                                $salaryHistoryData = [
                                    'salary_id' => $newSalaryId,
                                    'department_id' => $departmentsAll,
                                    'branch_id' => $brid,
                                    'payroll_deadline' => $data['sa-payroll_deadline'][$index][$saIndex],
                                    'payroll_month' => $data['sa-payroll_month'][$index][$saIndex],
                                    'payroll_day' => $data['sa-payroll_day'][$index][$saIndex],
                                    'applied_date' => $formatted_applied_date,
                                ];
                                \Log::info(print_r($salaryHistoryData, true));
                                Salary_history::create($salaryHistoryData);
                            };
                        }
                        $newSalaryId++;
                    }
                    foreach ($currentboids as $boIndex => $boid) {
                        $applied_date = $data['bo-applied_date'][$index][$boIndex];
                        if (!is_null($applied_date) && strtotime($applied_date) === false) {
                            $formatted_applied_date = Carbon::createFromFormat('Y年 m月', $applied_date)->format('Y-m-01');
                        } else {
                            $formatted_applied_date = $applied_date;
                        }
                        $departments = $data['bo-departments'][$index][$boIndex] ?? null;
                        $bonus_payment_month = $data['bo-bonus_payment_month'][$index][$boIndex] ?? null;
                        if (!is_null($bonus_payment_month)) {
                            $bonus_payment_month_processed = implode('，', $bonus_payment_month);
                        } else {
                            $bonus_payment_month_processed = null;
                        }
                        if ($boid > 0) {
                            if (!is_null($departments)) {
                                foreach ($departments as $department_processed) {
                                    Bonus::updateOrCreate(
                                        [
                                            'bonus_id' => $boid,
                                            'department_id' => $department_processed,
                                            'branch_id' => $brid,
                                        ],
                                        [
                                            'bonus_payment_month' => $bonus_payment_month_processed,
                                            'applied_date' => $formatted_applied_date,
                                        ],
                                    );
                                }
                                Bonus::where('bonus_id', $boid)
                                    ->where('branch_id', $brid)
                                    ->whereNotIn('department_id', $departments)
                                    ->update(['delete_flg' => 1]);
                                $departmentsAll = implode(',', $departments);
                                $bonusHistoryData = [
                                    'bonus_id' => $newBonusId,
                                    'department_id' => $departmentsAll,
                                    'branch_id' => $brid,
                                    'bonus_payment_month' => $bonus_payment_month_processed,
                                    'applied_date' => $formatted_applied_date,
                                ];
                                Bonus_history::create($bonusHistoryData);
                            };
                        } else {
                            if (!is_null($departments)) {
                                foreach ($departments as $department_processed) {
                                    $bonusData = [
                                        'bonus_id' => $newBonusId,
                                        'department_id' => $department_processed,
                                        'branch_id' => $brid,
                                        'bonus_payment_month' => $bonus_payment_month_processed,
                                        'applied_date' => $formatted_applied_date,
                                    ];
                                    Bonus::create($bonusData);
                                }
                                $departmentsAll = implode(',', $departments);
                                $bonusHistoryData = [
                                    'bonus_id' => $newBonusId,
                                    'department_id' => $departmentsAll,
                                    'branch_id' => $brid,
                                    'bonus_payment_month' => $bonus_payment_month_processed,
                                    'applied_date' => $formatted_applied_date,
                                ];
                                Bonus_history::create($bonusHistoryData);
                            };
                        }
                        $newBonusId++;
                    }
                    foreach ($currentbouids as $bouIndex => $bouid) {
                        $applied_date = $data['bou-applied_date'][$index][$bouIndex];
                        if (!is_null($applied_date) && strtotime($applied_date) === false) {
                            $formatted_applied_date = Carbon::createFromFormat('Y年 m月', $applied_date)->format('Y-m-01');
                        } else {
                            $formatted_applied_date = $applied_date;
                        }
                        $departments = $data['bou-departments'][$index][$bouIndex] ?? null;
                        $bonus_payment_month = $data['bou-bonus_payment_month'][$index][$bouIndex] ?? null;
                        if (!is_null($bonus_payment_month)) {
                            $bonus_payment_month_processed = implode('，', $bonus_payment_month);
                        } else {
                            $bonus_payment_month_processed = null;
                        }
                        if ($bouid > 0) {
                            if (!is_null($departments)) {
                                foreach ($departments as $department_processed) {
                                    Bounty::updateOrCreate(
                                        [
                                            'bounty_id' => $bouid,
                                            'department_id' => $department_processed,
                                            'branch_id' => $brid,
                                        ],
                                        [
                                            'bonus_payment_month' => $bonus_payment_month_processed,
                                            'applied_date' => $formatted_applied_date,
                                        ],
                                    );
                                }
                                Bounty::where('bounty_id', $bouid)
                                    ->where('branch_id', $brid)
                                    ->whereNotIn('department_id', $departments)
                                    ->update(['delete_flg' => 1]);
                                $departmentsAll = implode(',', $departments);
                                $bountyHistoryData = [
                                    'bounty_id' => $newBountyId,
                                    'department_id' => $departmentsAll,
                                    'branch_id' => $brid,
                                    'bonus_payment_month' => $bonus_payment_month_processed,
                                    'applied_date' => $formatted_applied_date,
                                ];
                                Bounty_history::create($bountyHistoryData);
                            };
                        } else {
                            if (!is_null($departments)) {
                                foreach ($departments as $department_processed) {
                                    $bountyData = [
                                        'bounty_id' => $newBountyId,
                                        'department_id' => $department_processed,
                                        'branch_id' => $brid,
                                        'bonus_payment_month' => $bonus_payment_month_processed,
                                        'applied_date' => $formatted_applied_date,
                                    ];
                                    Bounty::create($bountyData);
                                }
                                $departmentsAll = implode(',', $departments);
                                $bountyHistoryData = [
                                    'bounty_id' => $newBountyId,
                                    'department_id' => $departmentsAll,
                                    'branch_id' => $brid,
                                    'bonus_payment_month' => $bonus_payment_month_processed,
                                    'applied_date' => $formatted_applied_date,
                                ];
                                Bounty_history::create($bountyHistoryData);
                            };
                        }
                        $newBountyId++;
                    }
                } else {
                    $created_id = Branch::create($brdata)->id;
                    $excepts[] = $created_id;
                    $SalaryId = "1";
                    $BonusId = "1";
                    $BountyId = "1";
                    foreach ($currentbouids as $bouIndex => $bouid) {
                        $applied_date = $data['bou-applied_date'][$index][$bouIndex];
                        if (!is_null($applied_date) && strtotime($applied_date) === false) {
                            $formatted_applied_date = Carbon::createFromFormat('Y年 m月', $applied_date)->format('Y-m-01');
                        } else {
                            $formatted_applied_date = $applied_date;
                        }
                        $departments = $data['bou-departments'][$index][$bouIndex] ?? null;
                        if (!is_null($departments)) {
                            $bonus_payment_month = $data['bou-bonus_payment_month'][$index][$bouIndex] ?? null;
                            if (!is_null($bonus_payment_month)) {
                                $bonus_payment_month_processed = implode('，', $bonus_payment_month);
                            } else {
                                $bonus_payment_month_processed = null;
                            }
                            foreach ($departments as $department_processed) {
                                $bountyData = [
                                    'bounty_id' => $BountyId,
                                    'department_id' => $department_processed,
                                    'branch_id' => $created_id,
                                    'bonus_payment_month' => $bonus_payment_month_processed,
                                    'applied_date' => $formatted_applied_date,
                                ];
                                Bounty::create($bountyData);
                            }
                            $departmentsAll = implode(',', $departments);
                            $bountyHistoryData = [
                                'bounty_id' => $BountyId,
                                'department_id' => $departmentsAll,
                                'branch_id' => $created_id,
                                'bonus_payment_month' => $bonus_payment_month_processed,
                                'applied_date' => $formatted_applied_date,
                            ];
                            Bounty_history::create($bountyHistoryData);
                        };
                        $BountyId++;
                    }
                    foreach ($currentboids as $boIndex => $boid) {
                        $applied_date = $data['bo-applied_date'][$index][$boIndex];
                        if (!is_null($applied_date) && strtotime($applied_date) === false) {
                            $formatted_applied_date = Carbon::createFromFormat('Y年 m月', $applied_date)->format('Y-m-01');
                        } else {
                            $formatted_applied_date = $applied_date;
                        }
                        $departments = $data['bo-departments'][$index][$boIndex] ?? null;
                        if (!is_null($departments)) {
                            $bonus_payment_month = $data['bo-bonus_payment_month'][$index][$boIndex] ?? null;
                            if (!is_null($bonus_payment_month)) {
                                $bonus_payment_month_processed = implode('，', $bonus_payment_month);
                            } else {
                                $bonus_payment_month_processed = null;
                            }
                            foreach ($departments as $department_processed) {
                                $bonusData = [
                                    'bonus_id' => $BonusId,
                                    'department_id' => $department_processed,
                                    'branch_id' => $created_id,
                                    'bonus_payment_month' => $bonus_payment_month_processed,
                                    'applied_date' => $formatted_applied_date,
                                ];
                                Bonus::create($bonusData);
                            }
                            $departmentsAll = implode(',', $departments);
                            $bonusHistoryData = [
                                'bonus_id' => $BonusId,
                                'department_id' => $departmentsAll,
                                'branch_id' => $created_id,
                                'bonus_payment_month' => $bonus_payment_month_processed,
                                'applied_date' => $formatted_applied_date,
                            ];
                            Bonus_history::create($bonusHistoryData);
                        };
                        $BonusId++;
                    }
                    foreach ($currentSaids as $saIndex => $said) {
                        $applied_date = $data['sa-applied_date'][$index][$saIndex];
                        if (!is_null($applied_date) && strtotime($applied_date) === false) {
                            $formatted_applied_date = Carbon::createFromFormat('Y年 m月', $applied_date)->format('Y-m-01');
                        } else {
                            $formatted_applied_date = $applied_date;
                        }
                        $departments = $data['sa-departments'][$index][$saIndex] ?? null;
                        if (!is_null($departments)) {
                            foreach ($departments as $department_processed) {
                                $salaryData = [
                                    'salary_id' => $SalaryId,
                                    'department_id' => $department_processed,
                                    'branch_id' => $created_id,
                                    'payroll_deadline' => $data['sa-payroll_deadline'][$index][$saIndex],
                                    'payroll_month' => $data['sa-payroll_month'][$index][$saIndex],
                                    'payroll_day' => $data['sa-payroll_day'][$index][$saIndex],
                                    'applied_date' => $formatted_applied_date,
                                ];
                                Salary::create($salaryData);
                            }
                            $departmentsAll = implode(',', $departments);
                            $salaryHistoryData = [
                                'salary_id' => $SalaryId,
                                'department_id' => $departmentsAll,
                                'branch_id' => $brid,
                                'payroll_deadline' => $data['sa-payroll_deadline'][$index][$saIndex],
                                'payroll_month' => $data['sa-payroll_month'][$index][$saIndex],
                                'payroll_day' => $data['sa-payroll_day'][$index][$saIndex],
                                'applied_date' => $formatted_applied_date,
                            ];
                            Salary_history::create($salaryHistoryData);
                        };
                        $SalaryId++;
                    }
                }
            }
            Branch::where('company_id', $id)->whereNotIn('id', $excepts)->update(['delete_flg' => 1]);
            DB::commit();
            $this->putSuccess();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
        return redirect()->route('branch');
    }

    private function data_branch(array $requestData, $index)
    {
        $input_date1 = $requestData['br-labor_insurance_establishment_date'][$index];
        if (!is_null($input_date1) && strtotime($input_date1) === false) {
            $formatted_br_labor_insurance_establishment_date = Carbon::createFromFormat('Y年n月j日', $input_date1)->format('Y-m-d');
        } else {
            $formatted_br_labor_insurance_establishment_date = $input_date1;
        }
        $input_date2 = $requestData['br-employment_insurance_establishment_date'][$index];
        if (!is_null($input_date2) && strtotime($input_date2) === false) {
            $formatted_br_employment_insurance_establishment_date = Carbon::createFromFormat('Y年n月j日', $input_date2)->format('Y-m-d');
        } else {
            $formatted_br_employment_insurance_establishment_date = $input_date2;
        }

        $fax = [];
        $fax1 = $requestData['br-fax1'] ?? null;
        $fax2 = $requestData['br-fax2'] ?? null;
        $fax3 = $requestData['br-fax3'] ?? null;
        $fax1Index = count($requestData['br-fax1']) ?? null;
        $fax2Index = count($requestData['br-fax2']) ?? null;
        $fax3Index = count($requestData['br-fax3']) ?? null;

        if ($fax1 !== null || $fax2 !== null || $fax3 !== null) {
            $count = '';
            if ($fax1Index >= $fax2Index && $fax1Index >= $fax3Index) {
                $count = $fax1Index;
            } elseif ($fax2Index >= $fax1Index && $fax2Index >= $fax3Index) {
                $count = $fax2Index;
            } else {
                $count = $fax3Index;
            }

            for ($i = 0; $i < $count; $i++) {
                $part1 = isset($fax1[$i]) ? $fax1[$i] : '';
                $part2 = isset($fax2[$i]) ? $fax2[$i] : '';
                $part3 = isset($fax3[$i]) ? $fax3[$i] : '';
                if ($part1 === null && $part2 === null && $part3 === null) {
                    continue;
                }
                $fax[] = ($part1 !== '' ? $part1 . '-' : '') . ($part2 !== '' ? $part2 . '-' : '') . ($part3 !== '' ? $part3 : '');
            }
        }
        $current_company = CurrentUser::currentCompany();
        $company_id = $current_company->id;

        return [
            'name' => $requestData['br-name'][$index],
            'company_id' => $company_id,
            'post_code' => $requestData['br-post_code'][$index],
            'address_prefecture' => $requestData['br-address_prefecture'][$index],
            'address_city' => $requestData['br-address_city'][$index],
            'address_ward' => $requestData['br-address_ward'][$index],
            'address_apartment' => $requestData['br-address_apartment'][$index],
            'address_city_kana' => $requestData['br-address_city_kana'][$index],
            'address_ward_kana' => $requestData['br-address_ward_kana'][$index],
            'address_apartment_kana' => $requestData['br-address_apartment_kana'][$index],
            'tel_area_code' => $requestData['br-tel_area_code'][$index],
            'tel_city_code' => $requestData['br-tel_city_code'][$index],
            'tel_subscriber_code' => $requestData['br-tel_subscriber_code'][$index],
            'tel_overseas' => $requestData['br-tel_overseas'][$index],
            'fax' => $fax[$index],
            'mail_address' => $requestData['br-mail_address'][$index],
            'place_type' => $requestData['br-place_type'][$index],
            'branch_type' => $requestData['br-branch_type'][$index],
            'labor_insurance_no' => $requestData['br-labor_insurance_no'][$index],
            'labor_insurance_payment_method' => $requestData['br-labor_insurance_payment_method'][$index],
            'labor_insurance_establishment_date' => $formatted_br_labor_insurance_establishment_date,
            'insurance_office_no' => $requestData['br-insurance_office_no'][$index],
            'insurance_office_reference_no' => $requestData['br-insurance_office_reference_no'][$index],
            'pension_office_no' => $requestData['br-pension_office_no'][$index],
            'pension_office_id' => $requestData['br-pension_office_id'][$index],
            'pension_office_reference_prefecture' => $requestData['br-pension_office_reference_prefecture'][$index],
            'pension_office_reference_no_cities' => $requestData['br-pension_office_reference_no_cities'][$index],
            'pension_office_reference_no_office' => $requestData['br-pension_office_reference_no_office'][$index],
            'employment_insurance_office_no' => $requestData['br-employment_insurance_office_no'][$index],
            'employment_insurance_establishment_date' => $formatted_br_employment_insurance_establishment_date,
            'hello_work_id' => $requestData['br-hello_work_id'][$index],
            'labor_bureau_name' => $requestData['br-labor_bureau_name'][$index],
            'labor_supervision_name' => $requestData['br-labor_supervision_name'][$index],
            'start_date_of_month' => $requestData['br-start_date_of_month'][$index],
            'start_days_of_week' => $requestData['br-start_days_of_week'][$index],
            'start_time_of_day' => $requestData['br-start_time_of_day'][$index],
            'work_time_start' => $requestData['br-work_time_start'][$index],
            'work_time_end' => $requestData['br-work_time_end'][$index],
            'agreed_hours_year_h' => $requestData['br-agreed_hours_year_h'][$index],
            'agreed_hours_year_m' => $requestData['br-agreed_hours_year_m'][$index],
            'agreed_hours_month_h' => $requestData['br-agreed_hours_month_h'][$index],
            'agreed_hours_month_m' => $requestData['br-agreed_hours_month_m'][$index],
            'agreed_hours_week_h' => $requestData['br-agreed_hours_week_h'][$index],
            'agreed_hours_week_m' => $requestData['br-agreed_hours_week_m'][$index],
            'agreed_hours_day_h' => $requestData['br-agreed_hours_day_h'][$index],
            'agreed_hours_day_m' => $requestData['br-agreed_hours_day_m'][$index],
            'working_days_yearly' => $requestData['br-working_days_yearly'][$index],
            'working_days_monthly' => $requestData['br-working_days_monthly'][$index],
            'holiday_yearly' => $requestData['br-holiday_yearly'][$index],
            'holiday_monthly' => $requestData['br-holiday_monthly'][$index],
            'holiday_legal' => $requestData['br-holiday_legal'][$index],
            'holiday_not_logal' => $requestData['br-holiday_not_logal'][$index],
            'work_style_type' => $requestData['br-work_style_type'][$index],
            'labor_insurance_category' => $requestData['br-labor_insurance_category'][$index],
            'kenpo_no' => $requestData['br-kenpo_no'][$index],
            'insurance_office_name' => $requestData['br-insurance_office_name'][$index],
            'insurance_applicable_date' => $requestData['br-insurance_applicable_date'][$index],
            'pension_office_name' => $requestData['br-pension_office_name'][$index],
            'employment_insurance_rate' => $requestData['br-employment_insurance_rate'][$index],
            'rate_pattern_id' => $requestData['br-rate_pattern_id'][$index],
            'fractional_adjustment_pattern_id' => $requestData['br-fractional_adjustment_pattern_id'][$index],
        ];
    }
}
