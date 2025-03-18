<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCompanyCreateRequest;
use App\Http\Requests\AdminCompanyUpdateRequest;
use App\Http\Requests\AdminEmployeeCreateRequest;
use App\Http\Requests\AdminEmployeeUpdateRequest;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Http\Requests\AdminLaborCreateRequest;
use App\Http\Requests\AdminLaborUpdateRequest;
use App\Models\Bonus;
use App\Models\Bonus_history;
use App\Models\Bounty;
use App\Models\Bounty_history;
use App\Models\CurrentUser;
use App\Models\Company;
use App\Models\User;
use App\Models\Branch;
use App\Models\Branch_allowance;
use App\Models\Branch_allowance_history;
use App\Models\Values_company_listed_type;
use App\Models\Values_company_business_type;
use App\Models\Company_type;
use App\Models\Prefecture;
use App\Models\Values_employee_labor_insurance_type;
use App\Models\Managerial_position;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Employee;
use App\Models\Values_employee_employee_status;
use App\Models\Values_employee_employee_type;
use App\Models\Values_employee_employment_insurance_type;
use App\Models\Values_employee_insurance_loss_reason;
use App\Models\Values_employee_insured_type;
use App\Models\Values_employee_occupation_type;
use App\Models\Values_employee_over_retired_insurance_loss_reason;
use App\Models\Values_sex;
use App\Models\Department;
use App\Models\Dependent;
use App\Models\Employee_department;
use App\Models\Values_branch_labor_insurance_payment_method;
use App\Models\Values_branch_place_type;
use App\Models\Values_branch_start_days_of_week;
use App\Models\Values_branch_work_style_type;
use App\Models\Receptionist;
use App\Models\Residential_status;
use App\Models\Values_employee_insured_age_type;
use App\Models\Industry_type;
use App\Models\Company_industry_type;
use App\Models\Company_files;
use App\Models\Pickup_setting;
use App\Models\Pickup;
use App\Models\Pickup_message;
use App\Models\Salary;
use App\Models\Salary_history;
use App\Models\Qualifications;
use App\Models\Employee_qualifications;
use App\Models\Values_employee_work_category;
use App\Models\Values_employee_enrollment_category;
use App\Models\Values_employee_employment_route;
use App\Models\Values_employee_recruitment_category_detail;
use App\Models\Values_employee_employment_status;
use App\Models\Values_employee_pay_type;

use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{
    public function __construct(Request $request)
    {
        // Admin権限以外のコントローラー使用を拒否する
        $this->middleware(function ($request, $next) {
            $role_id = CurrentUser::info()->role_id;
            if ($role_id !== 999)
                return redirect()->route('auth.logout');
            return $next($request);
        });
    }
    public function index(Request $request)
    {
        return view('admin.index');
    }

    /** 会社管理 */

    public function company_list(Request $request)
    {
        $paginate = [
            'page' => $request->input('page', 1),
            'limit' => 20,
            'search' => $request->input('search'),
        ];
        return view('admin.companies', compact('paginate'));
    }

    public function company_list_api(Request $request)
    {
        try {
            $data = Company::select('id', 'name', 'company_no', 'company_type_id', 'business_type', 'company_division')->where('delete_flg', 0)->get();
        } catch (\Exception $e) {
            return response()->json([], 400);
        }
        return response()->json($data, 200);
    }

    public function company_create(Request $request)
    {
        $company_listed_type = Values_company_listed_type::pluck('name', 'id');
        $businessTypes = Values_company_business_type::pluck('name', 'id');
        $company_type = Company_type::where('delete_flg', 0)->get();
        $prefectures = Prefecture::pluck('name', 'id');
        $labor_insurance_payment_method = Values_branch_labor_insurance_payment_method::pluck('name', 'id');
        $place_type = Values_branch_place_type::pluck('name', 'id');
        $start_days_of_week = Values_branch_start_days_of_week::pluck('name', 'id');
        $work_style_type = Values_branch_work_style_type::pluck('name', 'id');

        return view('admin.company_create', [
            'company_listed_type' => $company_listed_type,
            'businessTypes' => $businessTypes,
            'branch' => [],
            'company_type' => $company_type,
            'prefectures' => $prefectures,
            'labor_insurance_payment_method' => $labor_insurance_payment_method,
            'place_type' => $place_type,
            'start_days_of_week' => $start_days_of_week,
            'work_style_type' => $work_style_type
        ]);
    }

    public function company_create_post(AdminCompanyCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->remove('_token');
            $data = $request->validationData($request);
            $companyData = $this->data_company($data);
            $company_id = Company::create($companyData)->id;
            $brname = $request->input('br-name');
            foreach ($brname as $index => $name) {
                $brdata = $this->data_branch($data, $index, $company_id);
                Branch::create($brdata);
            }
            $industryTypes = $request->input('industry_type', []);
            foreach ($industryTypes as $industryTypeId) {
                Company_industry_type::create([
                    'company_id' => $company_id,
                    'industry_type_id' => $industryTypeId,
                    'delete_flg' => 0,
                ]);
            }
            if ($request->file('financial_statement')) {
                $financial_statement_name = $request->file('financial_statement')->getClientOriginalName();
                $financial_statement = $request->file('financial_statement')->get();
                Company_files::create([
                    'company_id' => $company_id,
                    'document_type' => 1,
                    'file_name' => $financial_statement_name,
                    'data' => $financial_statement,
                    'delete_flg' => 0,
                ]);
            }
            if ($request->file('articles_of_incorporation')) {
                $articles_of_incorporation_name = $request->file('articles_of_incorporation')->getClientOriginalName();
                $articles_of_incorporation = $request->file('articles_of_incorporation')->get();
                Company_files::create([
                    'company_id' => $company_id,
                    'document_type' => 2,
                    'file_name' => $articles_of_incorporation_name,
                    'data' => $articles_of_incorporation,
                    'delete_flg' => 0,
                ]);
            }
            if ($request->file('stock_information')) {
                $stock_information_name = $request->file('stock_information')->getClientOriginalName();
                $stock_information = $request->file('stock_information')->get();
                Company_files::create([
                    'company_id' => $company_id,
                    'document_type' => 3,
                    'file_name' => $stock_information_name,
                    'data' => $stock_information,
                    'delete_flg' => 0,
                ]);
            }
            DB::commit();
            $this->putSuccess();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput($data->all());
        } catch (UniqueConstraintViolationException $e) {
            $errorString = $e->getMessage();
            DB::rollback();
            if (strpos($errorString, 'stock_code_unique') !== false) {
                $errorMessage = '{"stock_code_unique":["入力された証券コードは既に登録されています."]}';
                return redirect()->back()->withErrors(json_decode($errorMessage, true))->withInput();
            } else {
                return redirect()->back()->withErrors("")->withInput($data->all());
            }
        }
        return redirect()->route('admin.company');
    }

    public function company_update(Request $request, $id)
    {
        $company = Company::find($id);
        $company_listed_type = Values_company_listed_type::pluck('name', 'id');
        $businessTypes = Values_company_business_type::pluck('name', 'id');
        $branch = $company->branch()->where('delete_flg', 0)->get();
        $company_type = Company_type::where('delete_flg', 0)->get();
        $prefectures = Prefecture::pluck('name', 'id');
        $labor_insurance_payment_method = Values_branch_labor_insurance_payment_method::pluck('name', 'id');
        $place_type = Values_branch_place_type::pluck('name', 'id');
        $start_days_of_week = Values_branch_start_days_of_week::pluck('name', 'id');
        $work_style_type = Values_branch_work_style_type::pluck('name', 'id');
        $industry_type = Company_industry_type::where('company_id', $company->id)->where('delete_flg', 0)->pluck('industry_type_id');
        $financial_statement = Company_files::select('file_name')->where('company_id', $company->id)->where('document_type', 1)->where('delete_flg', 0)->first();
        $articles_of_incorporation = Company_files::select('file_name')->where('company_id', $company->id)->where('document_type', 2)->where('delete_flg', 0)->first();
        $stock_information = Company_files::select('file_name')->where('company_id', $company->id)->where('document_type', 3)->where('delete_flg', 0)->first();
        $departments = $company->departments()->where('delete_flg', 0)->get();

        return view('admin.company_create', [
            'company_id' => $company->id,
            'company' => $company,
            'company_listed_type' => $company_listed_type,
            'businessTypes' => $businessTypes,
            'branch' => $branch,
            'departments' => $departments,
            'company_type' => $company_type,
            'prefectures' => $prefectures,
            'labor_insurance_payment_method' => $labor_insurance_payment_method,
            'place_type' => $place_type,
            'start_days_of_week' => $start_days_of_week,
            'work_style_type' => $work_style_type,
            'industry_type' => $industry_type,
            'financial_statement' => $financial_statement->file_name ?? '',
            'articles_of_incorporation' => $articles_of_incorporation->file_name ?? '',
            'stock_information' => $stock_information->file_name ?? '',
        ]);
    }

    public function company_update_post(AdminCompanyUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $request->request->remove('_token');
            $data = $request->validationData($request);
            $companyData = $this->data_company($data);
            Company::where('id', $id)->update($companyData);
            $brids = $request->input('br-id');
            $saids = $request->input('sa-id');
            $boids = $request->input('bo-id');
            $bouids = $request->input('bou-id');
            $alids = $request->input('al-id');
            $exceptBranches = [];
            foreach ($brids as $branchIndex => $brid) {
                $brdata = $this->data_branch($data, $branchIndex, $id);
                $currentSaids = $saids[$branchIndex] ?? [];
                $currentboids = $boids[$branchIndex] ?? [];
                $currentbouids = $bouids[$branchIndex] ?? [];
                $currentalids = $alids[$branchIndex] ?? [];
                $exceptSalary = [];
                $exceptBonus = [];
                $exceptBounty = [];
                $exceptAllowance = [];
                if ($brid > 0) {
                    Branch::where('id', $brid)->update($brdata);
                    $exceptBranches[] = $brid;
                    $maxSalaryId = Salary::where('branch_id', $brid)->max('salary_id');
                    $newSalaryId = is_null($maxSalaryId) ? "1" : $maxSalaryId + 1;
                    $maxBonusId = Bonus::where('branch_id', $brid)->max('bonus_id');
                    $newBonusId = is_null($maxBonusId) ? "1" : $maxBonusId + 1;
                    $maxBountyId = Bounty::where('branch_id', $brid)->max('bounty_id');
                    $newBountyId = is_null($maxBountyId) ? "1" : $maxBountyId + 1;
                    foreach ($currentSaids as $saIndex => $said) {
                        $applied_date = $data['sa-applied_date'][$branchIndex][$saIndex];
                        if (!is_null($applied_date) && strtotime($applied_date) === false) {
                            $formatted_applied_date = Carbon::createFromFormat('Y年 m月', $applied_date)->format('Y-m-01');
                        } else {
                            $formatted_applied_date = $applied_date;
                        }
                        $departments = $data['sa-departments'][$branchIndex][$saIndex] ?? null;
                        if ($said > 0) {
                            if (!is_null($departments)) {
                                foreach ($departments as $department_processed) {
                                    Salary::updateOrCreate(
                                        [
                                            'salary_id' => $said,
                                            'department_id' => $department_processed,
                                            'branch_id' => $brid,
                                        ],
                                        [
                                            'payroll_deadline' => $data['sa-payroll_deadline'][$branchIndex][$saIndex],
                                            'payroll_month' => $data['sa-payroll_month'][$branchIndex][$saIndex],
                                            'payroll_day' => $data['sa-payroll_day'][$branchIndex][$saIndex],
                                            'applied_date' => $formatted_applied_date,
                                        ],
                                    );
                                }
                                $exceptSalary[] = $said;
                                Salary::where('salary_id', $said)
                                    ->where('branch_id', $brid)
                                    ->whereNotIn('department_id', $departments)
                                    ->update(['delete_flg' => 1]);
                                $departmentsAll = implode(',', $departments);
                                $existingSalaryHistory = Salary_history::where('branch_id', $brid)->where('salary_id', $said)->orderBy('created_at', 'desc')->first();
                                $salaryHistoryData = [
                                    'salary_id' => $said,
                                    'department_id' => $departmentsAll,
                                    'branch_id' => $brid,
                                    'payroll_deadline' => $data['sa-payroll_deadline'][$branchIndex][$saIndex],
                                    'payroll_month' => $data['sa-payroll_month'][$branchIndex][$saIndex],
                                    'payroll_day' => $data['sa-payroll_day'][$branchIndex][$saIndex],
                                    'applied_date' => $formatted_applied_date,
                                ];
                                $existingData = array_map('strval', $existingSalaryHistory->only(array_keys($salaryHistoryData)));
                                $newData = array_map('strval', $salaryHistoryData);
                                if ($existingData != $newData){
                                    Salary_history::create($salaryHistoryData);
                                }
                            };
                        } else {
                            if (!is_null($departments)) {
                                foreach ($departments as $department_processed) {
                                    $salaryData = [
                                        'salary_id' => $newSalaryId,
                                        'department_id' => $department_processed,
                                        'branch_id' => $brid,
                                        'payroll_deadline' => $data['sa-payroll_deadline'][$branchIndex][$saIndex],
                                        'payroll_month' => $data['sa-payroll_month'][$branchIndex][$saIndex],
                                        'payroll_day' => $data['sa-payroll_day'][$branchIndex][$saIndex],
                                        'applied_date' => $formatted_applied_date,
                                    ];
                                    Salary::create($salaryData);
                                }
                                $exceptSalary[] = $newSalaryId;
                                $departmentsAll = implode(',', $departments);
                                $salaryHistoryData = [
                                    'salary_id' => $newSalaryId,
                                    'department_id' => $departmentsAll,
                                    'branch_id' => $brid,
                                    'payroll_deadline' => $data['sa-payroll_deadline'][$branchIndex][$saIndex],
                                    'payroll_month' => $data['sa-payroll_month'][$branchIndex][$saIndex],
                                    'payroll_day' => $data['sa-payroll_day'][$branchIndex][$saIndex],
                                    'applied_date' => $formatted_applied_date,
                                ];
                                Salary_history::create($salaryHistoryData);
                            };
                        }
                        $newSalaryId++;
                    }
                    Salary::where('branch_id', $brid)->whereNotIn('salary_id', $exceptSalary)->update(['delete_flg' => 1]);
                    Salary_history::where('branch_id', $brid)->whereNotIn('salary_id', $exceptSalary)->update(['delete_flg' => 1]);
                    foreach ($currentboids as $boIndex => $boid) {
                        $applied_date = $data['bo-applied_date'][$branchIndex][$boIndex];
                        if (!is_null($applied_date) && strtotime($applied_date) === false) {
                            $formatted_applied_date = Carbon::createFromFormat('Y年 m月', $applied_date)->format('Y-m-01');
                        } else {
                            $formatted_applied_date = $applied_date;
                        }
                        $departments = $data['bo-departments'][$branchIndex][$boIndex] ?? null;
                        $bonus_payment_month = $data['bo-bonus_payment_month'][$branchIndex][$boIndex] ?? null;
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
                                $exceptBonus[] = $boid;
                                Bonus::where('bonus_id', $boid)
                                    ->where('branch_id', $brid)
                                    ->whereNotIn('department_id', $departments)
                                    ->update(['delete_flg' => 1]);
                                $departmentsAll = implode(',', $departments);
                                $existingBonusHistory = Bonus_history::where('branch_id', $brid)->where('bonus_id', $boid)->orderBy('created_at', 'desc')->first();
                                $bonusHistoryData = [
                                    'bonus_id' => $boid,
                                    'department_id' => $departmentsAll,
                                    'branch_id' => $brid,
                                    'bonus_payment_month' => $bonus_payment_month_processed,
                                    'applied_date' => $formatted_applied_date,
                                ];
                                $existingData = array_map('strval', $existingBonusHistory->only(array_keys($bonusHistoryData)));
                                $newData = array_map('strval', $bonusHistoryData);
                                if ($existingData != $newData){
                                    Bonus_history::create($bonusHistoryData);
                                }
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
                                $exceptBonus[] = $newBonusId;
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
                    Bonus::where('branch_id', $brid)->whereNotIn('bonus_id', $exceptBonus)->update(['delete_flg' => 1]);
                    Bonus_history::where('branch_id', $brid)->whereNotIn('bonus_id', $exceptBonus)->update(['delete_flg' => 1]);
                    foreach ($currentbouids as $bouIndex => $bouid) {
                        $applied_date = $data['bou-applied_date'][$branchIndex][$bouIndex];
                        if (!is_null($applied_date) && strtotime($applied_date) === false) {
                            $formatted_applied_date = Carbon::createFromFormat('Y年 m月', $applied_date)->format('Y-m-01');
                        } else {
                            $formatted_applied_date = $applied_date;
                        }
                        $departments = $data['bou-departments'][$branchIndex][$bouIndex] ?? null;
                        $bonus_payment_month = $data['bou-bonus_payment_month'][$branchIndex][$bouIndex] ?? null;
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
                                $exceptBounty[] = $bouid;
                                Bounty::where('bounty_id', $bouid)
                                    ->where('branch_id', $brid)
                                    ->whereNotIn('department_id', $departments)
                                    ->update(['delete_flg' => 1]);
                                $departmentsAll = implode(',', $departments);
                                $existingBountyHistory = Bounty_history::where('branch_id', $brid)->where('bounty_id', $bouid)->orderBy('created_at', 'desc')->first();
                                $bountyHistoryData = [
                                    'bounty_id' => $bouid,
                                    'department_id' => $departmentsAll,
                                    'branch_id' => $brid,
                                    'bonus_payment_month' => $bonus_payment_month_processed,
                                    'applied_date' => $formatted_applied_date,
                                ];
                                $existingData = array_map('strval', $existingBountyHistory->only(array_keys($bountyHistoryData)));
                                $newData = array_map('strval', $bountyHistoryData);
                                if ($existingData != $newData){
                                    Bounty_history::create($bountyHistoryData);
                                }
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
                                $exceptBounty[] = $newBountyId;
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
                    Bounty::where('branch_id', $brid)->whereNotIn('bounty_id', $exceptBounty)->update(['delete_flg' => 1]);
                    Bounty_history::where('branch_id', $brid)->whereNotIn('bounty_id', $exceptBounty)->update(['delete_flg' => 1]);
                    foreach ($currentalids as $alIndex => $alid) {
                        $applied_date = $data['al-applied_date'][$branchIndex][$alIndex];
                        if (!is_null($applied_date) && strtotime($applied_date) === false) {
                            $formatted_applied_date = Carbon::createFromFormat('Y年 m月', $applied_date)->format('Y-m-01');
                        } else {
                            $formatted_applied_date = $applied_date;
                        }
                        $allowanceHistoryData = [
                            'branch_id' => $brid,
                            'allowance' => $data['al-allowance'][$branchIndex][$alIndex],
                            'amount' => $data['al-amount'][$branchIndex][$alIndex],
                            'pay_month' => $data['al-pay_month'][$branchIndex][$alIndex],
                            'target' => $data['al-target'][$branchIndex][$alIndex],
                            'applied_date' => $formatted_applied_date,
                        ];
                        if ($alid > 0) {
                            $exceptAllowance[] = $alid;
                            Branch_allowance::where('id', $alid)->update([
                                'allowance' => $data['al-allowance'][$branchIndex][$alIndex],
                                'amount' => $data['al-amount'][$branchIndex][$alIndex],
                                'pay_month' => $data['al-pay_month'][$branchIndex][$alIndex],
                                'target' => $data['al-target'][$branchIndex][$alIndex],
                                'applied_date' => $formatted_applied_date,
                            ]);
                            $existingAllowanceHistory = Branch_allowance_history::where('allowance_id', $alid)->orderBy('created_at', 'desc')->first();
                            $existingData = array_map('strval', $existingAllowanceHistory->only(array_keys($allowanceHistoryData)));
                            $newData = array_map('strval', $allowanceHistoryData);
                            if ($existingData != $newData){
                                $allowanceHistoryData['allowance_id'] = $alid;
                                Branch_allowance_history::create($allowanceHistoryData);
                            }
                        }else{
                            $created_id = Branch_allowance::create([
                                'allowance' => $data['al-allowance'][$branchIndex][$alIndex],
                                'amount' => $data['al-amount'][$branchIndex][$alIndex],
                                'pay_month' => $data['al-pay_month'][$branchIndex][$alIndex],
                                'target' => $data['al-target'][$branchIndex][$alIndex],
                                'applied_date' => $formatted_applied_date,
                                'branch_id' => $brid,
                            ])->id;
                            $exceptAllowance[] = $created_id;
                            $allowanceHistoryData['allowance_id'] = $created_id;
                            Branch_allowance_history::create($allowanceHistoryData);
                        }
                    }
                    Branch_allowance::where('branch_id', $brid)->whereNotIn('id', $exceptAllowance)->update(['delete_flg' => 1]);
                    Branch_allowance_history::where('branch_id', $brid)->whereNotIn('allowance_id', $exceptAllowance)->update(['delete_flg' => 1]);
                } else {
                    $created_id = Branch::create($brdata)->id;
                    $exceptBranches[] = $created_id;
                    $SalaryId = "1";
                    $BonusId = "1";
                    $BountyId = "1";
                    foreach ($currentbouids as $bouIndex => $bouid) {
                        $applied_date = $data['bou-applied_date'][$branchIndex][$bouIndex];
                        if (!is_null($applied_date) && strtotime($applied_date) === false) {
                            $formatted_applied_date = Carbon::createFromFormat('Y年 m月', $applied_date)->format('Y-m-01');
                        } else {
                            $formatted_applied_date = $applied_date;
                        }
                        $departments = $data['bou-departments'][$branchIndex][$bouIndex] ?? null;
                        if (!is_null($departments)) {
                            $bonus_payment_month = $data['bou-bonus_payment_month'][$branchIndex][$bouIndex] ?? null;
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
                        $applied_date = $data['bo-applied_date'][$branchIndex][$boIndex];
                        if (!is_null($applied_date) && strtotime($applied_date) === false) {
                            $formatted_applied_date = Carbon::createFromFormat('Y年 m月', $applied_date)->format('Y-m-01');
                        } else {
                            $formatted_applied_date = $applied_date;
                        }
                        $departments = $data['bo-departments'][$branchIndex][$boIndex] ?? null;
                        if (!is_null($departments)) {
                            $bonus_payment_month = $data['bo-bonus_payment_month'][$branchIndex][$boIndex] ?? null;
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
                        $applied_date = $data['sa-applied_date'][$branchIndex][$saIndex];
                        if (!is_null($applied_date) && strtotime($applied_date) === false) {
                            $formatted_applied_date = Carbon::createFromFormat('Y年 m月', $applied_date)->format('Y-m-01');
                        } else {
                            $formatted_applied_date = $applied_date;
                        }
                        $departments = $data['sa-departments'][$branchIndex][$saIndex] ?? null;
                        if (!is_null($departments)) {
                            foreach ($departments as $department_processed) {
                                $salaryData = [
                                    'salary_id' => $SalaryId,
                                    'department_id' => $department_processed,
                                    'branch_id' => $created_id,
                                    'payroll_deadline' => $data['sa-payroll_deadline'][$branchIndex][$saIndex],
                                    'payroll_month' => $data['sa-payroll_month'][$branchIndex][$saIndex],
                                    'payroll_day' => $data['sa-payroll_day'][$branchIndex][$saIndex],
                                    'applied_date' => $formatted_applied_date,
                                ];
                                Salary::create($salaryData);
                            }
                            $departmentsAll = implode(',', $departments);
                            $salaryHistoryData = [
                                'salary_id' => $SalaryId,
                                'department_id' => $departmentsAll,
                                'branch_id' => $created_id,
                                'payroll_deadline' => $data['sa-payroll_deadline'][$branchIndex][$saIndex],
                                'payroll_month' => $data['sa-payroll_month'][$branchIndex][$saIndex],
                                'payroll_day' => $data['sa-payroll_day'][$branchIndex][$saIndex],
                                'applied_date' => $formatted_applied_date,
                            ];
                            Salary_history::create($salaryHistoryData);
                        };
                        $SalaryId++;
                    }
                    foreach ($currentalids as $alIndex => $alid) {
                        $applied_date = $data['al-applied_date'][$branchIndex][$alIndex];
                        if (!is_null($applied_date) && strtotime($applied_date) === false) {
                            $formatted_applied_date = Carbon::createFromFormat('Y年 m月', $applied_date)->format('Y-m-01');
                        } else {
                            $formatted_applied_date = $applied_date;
                        }
                        $created_id = Branch_allowance::create([
                            'allowance' => $data['al-allowance'][$branchIndex][$alIndex],
                            'amount' => $data['al-amount'][$branchIndex][$alIndex],
                            'pay_month' => $data['al-pay_month'][$branchIndex][$alIndex],
                            'target' => $data['al-target'][$branchIndex][$alIndex],
                            'applied_date' => $formatted_applied_date,
                            'branch_id' => $brid,
                        ])->id;
                        $allowanceHistoryData = [
                            'allowance_id' => $created_id,
                            'branch_id' => $brid,
                            'allowance' => $data['al-allowance'][$branchIndex][$alIndex],
                            'amount' => $data['al-amount'][$branchIndex][$alIndex],
                            'pay_month' => $data['al-pay_month'][$branchIndex][$alIndex],
                            'target' => $data['al-target'][$branchIndex][$alIndex],
                            'applied_date' => $formatted_applied_date,
                        ];
                        Branch_allowance_history::create($allowanceHistoryData);
                    }
                }
            }
            Branch::where('company_id', $id)->whereNotIn('id', $exceptBranches)->update(['delete_flg' => 1]);
            $industryTypes = $request->input('industry_type', []);
            Company_industry_type::where('company_id', $id)
                ->where('delete_flg', 1)
                ->whereIn('industry_type_id', $industryTypes)
                ->update(['delete_flg' => 0]);
            Company_industry_type::where('company_id', $id)
                ->whereNotIn('industry_type_id', $industryTypes)
                ->update(['delete_flg' => 1]);
            foreach ($industryTypes as $industryTypeId) {
                Company_industry_type::updateOrCreate(
                    [
                        'company_id' => $id,
                        'industry_type_id' => $industryTypeId,
                    ],
                    [
                        'company_id' => $id,
                        'industry_type_id' => $industryTypeId,
                        'delete_flg' => 0
                    ]
                );
            }

            if ($request->input('financial_statement_delete') == 1) {
                Company_files::where('company_id', $id)
                    ->where('document_type', 1)
                    ->update(['delete_flg' => 1]);
            }
            if ($request->input('articles_of_incorporation_delete') == 1) {
                Company_files::where('company_id', $id)
                    ->where('document_type', 2)
                    ->update(['delete_flg' => 1]);
            }
            if ($request->input('stock_information_delete') == 1) {
                Company_files::where('company_id', $id)
                    ->where('document_type', 3)
                    ->update(['delete_flg' => 1]);
            }

            if ($request->file('financial_statement')) {
                $financial_statement_name = $request->file('financial_statement')->getClientOriginalName();
                $financial_statement = $request->file('financial_statement')->get();
                Company_files::where('company_id', $id)
                    ->where('document_type', 1)
                    ->update(['delete_flg' => 1]);
                Company_files::create([
                    'company_id' => $id,
                    'document_type' => 1,
                    'file_name' => $financial_statement_name,
                    'data' => $financial_statement,
                    'delete_flg' => 0,
                ]);
            }
            if ($request->file('articles_of_incorporation')) {
                $articles_of_incorporation_name = $request->file('articles_of_incorporation')->getClientOriginalName();
                $articles_of_incorporation = $request->file('articles_of_incorporation')->get();
                Company_files::where('company_id', $id)
                    ->where('document_type', 2)
                    ->update(['delete_flg' => 1]);
                Company_files::create([
                    'company_id' => $id,
                    'document_type' => 2,
                    'file_name' => $articles_of_incorporation_name,
                    'data' => $articles_of_incorporation,
                    'delete_flg' => 0,
                ]);
            }
            if ($request->file('stock_information')) {
                $stock_information_name = $request->file('stock_information')->getClientOriginalName();
                $stock_information = $request->file('stock_information')->get();
                Company_files::where('company_id', $id)
                    ->where('document_type', 3)
                    ->update(['delete_flg' => 1]);
                Company_files::create([
                    'company_id' => $id,
                    'document_type' => 3,
                    'file_name' => $stock_information_name,
                    'data' => $stock_information,
                    'delete_flg' => 0,
                ]);
            }
            DB::commit();
            $this->putSuccess();
        } catch (ValidationException $e) {
            DB::rollback();
            Log::error('Validation error: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (UniqueConstraintViolationException $e) {
            DB::rollback();
            Log::error('Validation error: ' . $e->getMessage());
            $errorString = $e->getMessage();
            if (strpos($errorString, 'stock_code_unique') !== false) {
                $errorMessage = '{"stock_code_unique":["入力された証券コードは既に登録されています."]}';
                return redirect()->back()->withErrors(json_decode($errorMessage, true))->withInput();
            } else {
                return redirect()->back()->withErrors("")->withInput();
            }
        }
        return redirect()->route('admin.company');
    }
    private function validateAndFormatDate($inputDate)
    {
        if ($inputDate) {
            $formattedDate = \DateTime::createFromFormat('Y年n月j日', $inputDate);
            $formattedDate = $formattedDate->format('Y-m-d');
            $validator = Validator::make(['formatted_date' => $formattedDate], [
                'formatted_date' => 'date_format:Y-m-d',
            ]);
            if (!$validator->passes()) {
                throw new ValidationException($validator);
            }
            return $formattedDate;
        }
        return null;
    }

    private function formatDate($input)
    {
        return $input ? Carbon::createFromFormat('Y年n月j日', $input)->format('Y-m-d') : null;
    }

    private function data_company(array $requestData)
    {
        $formatted_founding_date = $requestData['founding_date'] ? Carbon::createFromFormat('Y年n月j日', $requestData['founding_date'])->format('Y-m-d') : null;
        $formatted_establishment_date = $requestData['establishment_date'] ? Carbon::createFromFormat('Y年n月j日', $requestData['establishment_date'])->format('Y-m-d') : null;
        return [
            'company_division' => $requestData['company_division'],
            'name' => $requestData['name'],
            'name_kana' => $requestData['name_kana'],
            'name_en' => $requestData['name_en'],
            'name_abbreviation' => $requestData['name_abbreviation'],
            'company_no' => $requestData['company_no'],
            'company_type_id' => $requestData['company_type_id'],
            'license_no' => $requestData['license_no'],
            'business_type' => $requestData['business_type'],
            'listed_type' => $requestData['listed_type'],
            'stock_code' => $requestData['stock_code'],
            'founding_date' => $formatted_founding_date,
            'establishment_date' => $formatted_establishment_date,
            'capital' => $requestData['capital'],
            'annual_sales' => $requestData['annual_sales'],
            'employee_sum' => $requestData['employee_sum'],
            'qualification' => $requestData['qualification'],
            'authorized_shares' => $requestData['authorized_shares'],
            'issued_shares' => $requestData['issued_shares'],
            'supplier_company' => $requestData['supplier_company'],
            'outsourcing_company' => $requestData['outsourcing_company'],
            'sales_company' => $requestData['sales_company'],
            'representative' => $requestData['representative'],
            'bank_name' => $requestData['bank_name'],
            'url' => $requestData['url'],
            'purpose' => $requestData['purpose'],
            'procedure_hidden_flg' => $requestData['procedure_hidden_flg'],
            'start_month_of_year' => $requestData['start_month_of_year'],
            'start_day_of_month' => $requestData['start_day_of_month'],
            'start_day_of_week' => $requestData['start_day_of_week'],
        ];
    }

    private function data_branch(array $requestData, $index, $company_id)
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

    public function company_department_update(Request $request, $id)
    {
        $company = Company::find($id);
        $company_name = $company->name;
        return view('admin.department', ['company_id' => $id, 'company_name' => $company_name]);
    }

    public function downloadFile($company_id, $document_type)
    {
        $file = Company_files::select('file_name', 'data')->where('company_id', $company_id)->where('delete_flg', 0)->where('document_type', $document_type)->first();
        $headers = [
            'Content-Type' => 'application/octet-stream',
        ];

        return response()->stream(function () use ($file) {
            echo $file->data;
        }, 200, [
            'Content-Type' => $headers['Content-Type'],
            'Content-Disposition' => 'attachment; filename="' . $file->file_name . '"',
        ]);
    }

    // ---------------------------------------------------------------------------------------
    // 従業員一覧
    // ---------------------------------------------------------------------------------------

    public function labor_list(Request $request)
    {
        $paginate = [
            'page' => $request->input('page', 1),
            'limit' => 20,
            'search' => $request->input('search'),
        ];
        return view('admin.labors', ['paginate' => $paginate]);
    }

    // ---------------------------------------------------------------------------------------
    // 社労士登録編集
    // ---------------------------------------------------------------------------------------

    public function labor_create(Request $request)
    {
        $employee_type = Values_employee_employee_type::pluck('name', 'id');
        $filePath = '/img/image.png';

        return view('admin.labor-create', [
            'filePath' => $filePath,
            'departments' => [],
            'employee_type' => $employee_type
        ]);
    }

    public function labor_create_post(AdminLaborCreateRequest $request)
    {
        $currentUser = CurrentUser::info();
        $sinner = User::where('employee_id', $currentUser->id)->first();
        $existsCompany = Company::find($request->input('company_id'));
        if (empty($existsCompany)) {
            \Log::error('不正利用者：' . $sinner->email);
            return abort(404);
        }
        $existsBranch = Branch::where('id', $request->input('branch_id'))->where('company_id', $existsCompany->id)->first();
        if (empty($existsBranch)) {
            \Log::error('不正利用者：' . $sinner->email);
            return abort(404);
        }

        DB::beginTransaction();

        try {
            $employee_id = Employee::create([
                'last_name' => $request->input('last_name'),
                'last_name_kana' => $request->input('last_name_kana'),
                'last_name_alphabet' => $request->input('last_name_alphabet'),
                'first_name' => $request->input('first_name'),
                'first_name_kana' => $request->input('first_name_kana'),
                'first_name_alphabet' => $request->input('first_name_alphabet'),
                'employee_no' => $request->input('employee_no'),
                'employee_type' => $request->input('employee_type'),
                'branch_id' => $request->input('branch_id'),
                'tel_area_code' => $request->input('tel_area_code'),
                'tel_city_code' => $request->input('tel_city_code'),
                'tel_subscriber_code' => $request->input('tel_subscriber_code'),
                'mail_address2' => $request->input('mail_address2'),
                'labor_and_social_security_attorney_registration_no' => $request->input('labor_and_social_security_attorney_registration_no'),
            ])->id;

            Employee::where('id', $employee_id)->update(['role_id' => 500]);

            $departments = $request->input('departments', []);
            foreach ($departments as $dep) {
                Employee_department::insert([
                    'department_id' => $dep,
                    'employee_id' => $employee_id
                ]);
            }

            $data = [
                'name' => $request->input('last_name') . ' ' . $request->input('first_name'),
                'email' => $request->input('user_email'),
                'password' => Hash::make($request->input('user_pass')),
                'employee_id' => $employee_id
            ];

            if (User::where('email', $request->input('user_email'))->exists()) {
                return back()->withErrors('このメールアドレスは既に使用されています。')->withInput();
            }

            User::create($data);

            $employee = Employee::where('id', $employee_id)->where('delete_flg', 0)->first();
            $branch = $employee->branch()->first();
            $company = $branch->company()->first();
            $company_id = $company->id;
            $icon_file = $request->file('icon_file');
            if ($icon_file && $company_id && $employee_id) {
                $extension = $icon_file->getClientOriginalExtension();
                $directory = 'photo/' . $company_id;
                $filePath = $directory . '/' . $employee_id . '.' . $extension;
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }

                $icon_file->storeAs($filePath);
            }

            DB::commit();
            $this->putSuccess();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);
            return back()->withErrors('エラー')->withInput();
        }
        return redirect()->route('admin.labor');
    }

    public function labor_update(Request $request, $id)
    {
        $employee_type = Values_employee_employee_type::pluck('name', 'id');
        $employee = Employee::where('delete_flg', 0)->where('id', $id)->first();
        $branch = Branch::where('id', $employee->branch_id)->with('company')->first();
        $user = User::where('employee_id', $employee->id)->first();
        $departments = Employee_department::where('employee_id', $id)->where('delete_flg', 0)->pluck('department_id');

        $employee->company_name = $branch->company->name;
        $employee->company_id = $branch->company->id;
        $employee->branch_name = $branch->name;
        $employee->branch_id = $branch->id;

        if (!empty($employee->company_id)) {
            $directory = 'photo/' . $employee->company_id;
            $files = Storage::files($directory);
            foreach ($files as $file) {
                $fileName = pathinfo($file, PATHINFO_FILENAME);
                if ((int)$fileName === $employee->id) {
                    $filePath = '/' . $file . '?v=' . time();
                }
            }
            if (!isset($filePath)) {
                $filePath = '/img/image.png';
            }
        }

        return view('admin.labor-create', [
            'filePath' => $filePath,
            'departments' => $departments,
            'employee_id' => $id,
            'employee' => $employee,
            'employee_type' => $employee_type
        ]);
    }

    public function labor_update_post(AdminLaborUpdateRequest $request, $id)
    {
        $currentUser = CurrentUser::info();
        $sinner = User::where('employee_id', $currentUser->id)->first();
        $existsCompany = Company::find($request->input('company_id'));
        if (empty($existsCompany)) {
            \Log::error('不正利用者：' . $sinner->email);
            return abort(404);
        }
        $existsBranch = Branch::where('id', $request->input('branch_id'))->where('company_id', $existsCompany->id)->first();
        if (empty($existsBranch)) {
            \Log::error('不正利用者：' . $sinner->email);
            return abort(404);
        }

        DB::beginTransaction();

        try {
            Employee::where('id', $id)->update([
                'last_name' => $request->input('last_name'),
                'last_name_kana' => $request->input('last_name_kana'),
                'last_name_alphabet' => $request->input('last_name_alphabet'),
                'first_name' => $request->input('first_name'),
                'first_name_kana' => $request->input('first_name_kana'),
                'first_name_alphabet' => $request->input('first_name_alphabet'),
                'employee_no' => $request->input('employee_no'),
                'employee_type' => $request->input('employee_type'),
                'branch_id' => $request->input('branch_id'),
                'tel_area_code' => $request->input('tel_area_code'),
                'tel_city_code' => $request->input('tel_city_code'),
                'tel_subscriber_code' => $request->input('tel_subscriber_code'),
                'mail_address2' => $request->input('mail_address2'),
                'labor_and_social_security_attorney_registration_no' => $request->input('labor_and_social_security_attorney_registration_no'),
            ]);

            $departments = $request->input('departments', []);
            Employee_department::whereNotIn('department_id', $departments)
                ->where('employee_id', $request->input('employee_id'))
                ->where('delete_flg', 0)
                ->update(['delete_flg' => 1]);

            $existingRecords = Employee_department::whereIn('department_id', $departments)->where('employee_id', $request->input('employee_id'))->where('delete_flg', 0)->get();

            $existingDepartmentIds = $existingRecords->pluck('department_id')->toArray();
            $newDepartmentIds = array_diff($departments, $existingDepartmentIds);
            if (!empty($newDepartmentIds)) {
                foreach ($newDepartmentIds as $departmentId) {
                    Employee_department::insert([
                        'department_id' => $departmentId,
                        'employee_id' => $request->input('employee_id')
                    ]);
                }
            }

            $employee = Employee::where('id', $id)->where('delete_flg', 0)->first();
            $branch = $employee->branch()->first();
            $company = $branch->company()->first();
            $company_id = $company->id;
            $icon_file = $request->file('icon_file');
            $icon_delete_flg = $request->input('icon_delete_flg');
            if ($company_id && $id) {
                if ($icon_delete_flg === "1") {
                    $directory = 'photo/' . $company_id;

                    foreach (Storage::files($directory) as $file) {
                        $fileName = pathinfo($file, PATHINFO_FILENAME);
                        if ($fileName === $id) {
                            Storage::delete($file);
                        }
                    }
                } elseif ($icon_file) {
                    $extension = $icon_file->getClientOriginalExtension();
                    $directory = 'photo/' . $company_id;
                    $filePath = $directory . '/' . $id . '.' . $extension;

                    if (!Storage::exists($directory)) {
                        Storage::makeDirectory($directory);
                    }

                    foreach (Storage::files($directory) as $file) {
                        $fileName = pathinfo($file, PATHINFO_FILENAME);
                        if ($fileName === $id) {
                            Storage::delete($file);
                        }
                    }

                    $icon_file->storeAs($filePath);
                }
            }

            DB::commit();
            $this->putSuccess();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);
            return back()->withErrors('エラー');
        }
        return redirect()->route('admin.labor');
    }

    // ---------------------------------------------------------------------------------------
    // 一般従業員登録・編集
    // ---------------------------------------------------------------------------------------

    public function employee_create(Request $request)
    {
        $employee_type = Values_employee_employee_type::pluck('name', 'id');
        $sex_type = Values_sex::pluck('name', 'id');
        $prefectures = Prefecture::pluck('name', 'id');
        $country_type = Country::pluck('country_name', 'id');
        $employee_status_type = Values_employee_employee_status::pluck('name', 'id');
        $labor_insurance_type = Values_employee_labor_insurance_type::pluck('name', 'id');
        $employment_insurance_type = Values_employee_employment_insurance_type::pluck('name', 'id');
        $insurance_loss_reason = Values_employee_insurance_loss_reason::pluck('name', 'id');
        $over_retired_insurance_loss_reason = Values_employee_over_retired_insurance_loss_reason::pluck('name', 'id');
        $occupation_type = Values_employee_occupation_type::pluck('name', 'option_no');
        $residential_status = Residential_status::pluck('content', 'id');
        $employee_insured_age_type = Values_employee_insured_age_type::pluck('name', 'id');

        $work_category = Values_employee_work_category::pluck('name', 'id');
        $enrollment_category = Values_employee_enrollment_category::pluck('name', 'id');
        $employment_route = Values_employee_employment_route::pluck('name', 'id');
        $recruitment_category_detail = Values_employee_recruitment_category_detail::pluck('name', 'id');
        $employment_status = Values_employee_employment_status::pluck('name', 'id');
        $pay_type = Values_employee_pay_type::pluck('name', 'id');

        $faxParts = ['', '', ''];
        $filePath = '/img/image.png';

        return view('admin.employee_create', [
            'filePath' => $filePath,
            'departments' => [],
            'departments_list' => [],
            'managerial_position_list' => [],
            'dependent' => [],
            'employee_type' => $employee_type,
            'sex_type' => $sex_type,
            'prefectures' => $prefectures,
            'country_type' => $country_type,
            'employee_status_type' => $employee_status_type,
            'labor_insurance_type' => $labor_insurance_type,
            'employment_insurance_type' => $employment_insurance_type,
            'insurance_loss_reason' => $insurance_loss_reason,
            'over_retired_insurance_loss_reason' => $over_retired_insurance_loss_reason,
            'occupation_type' => $occupation_type,
            'faxParts' => $faxParts,
            'residential_status' => $residential_status,
            'employee_insured_age_type' => $employee_insured_age_type,
            'qualifications' => [],
            'employee_qualifications' => [],
            'work_category' => $work_category,
            'enrollment_category' => $enrollment_category,
            'employment_route' => $employment_route,
            'recruitment_category_detail' => $recruitment_category_detail,
            'employment_status' => $employment_status,
            'pay_type' => $pay_type,
        ]);
    }

    public function employee_create_post(AdminEmployeeCreateRequest $request)
    {
        $currentUser = CurrentUser::info();
        $sinner = User::where('employee_id', $currentUser->id)->first();
        $existsCompany = Company::find($request->input('company_id'));
        if (empty($existsCompany)) {
            \Log::error('不正利用者：' . $sinner->email);
            return abort(404);
        }
        $existsBranch = Branch::where('id', $request->input('branch_id'))->where('company_id', $existsCompany->id)->first();
        if (empty($existsBranch)) {
            \Log::error('不正利用者：' . $sinner->email);
            return abort(404);
        }
        if ($request->input('departments')) {
            foreach ($request->input('departments') as $department) {
                $existsDepartment = Department::where('id', $department)->where('company_id', $existsCompany->id)->first();
                if (empty($existsDepartment)) {
                    \Log::error('不正利用者：' . $sinner->email);
                    return abort(404);
                }
            }
        }
        if ($request->input('managerial_position_id')) {
            $existsManagerialPosition = Managerial_position::where('id', $request->input('managerial_position_id'))->where('company_id', $existsCompany->id)->first();
            if (empty($existsManagerialPosition)) {
                \Log::error('不正利用者：' . $sinner->email);
                return abort(404);
            }
        }
        if ($request->input('qualifications')) {
            foreach ($request->input('qualifications') as $qualification) {
                $existsQualification = Qualifications::where('id', $qualification)->where('company_id', $existsCompany->id)->first();
                if (empty($existsQualification)) {
                    \Log::error('不正利用者：' . $sinner->email);
                    return abort(404);
                }
            }
        }

        if (!empty($request->input('fax1')) && !empty($request->input('fax2')) && !empty($request->input('fax3'))) {
            $fax = implode('-', [
                $request->input('fax1'),
                $request->input('fax2'),
                $request->input('fax3')
            ]);
        } else {
            $fax = null;
        };
        DB::beginTransaction();

        try {
            $validationData = $request->validationData($request);
            $address_ward = $validationData['address_ward'];
            $address_apartment = $validationData['address_apartment'];
            $emergency_address_ward1 = $validationData['emergency_address_ward1'];
            $emergency_address_apartment1 = $validationData['emergency_address_apartment1'];
            $emergency_address_ward2 = $validationData['emergency_address_ward2'];
            $emergency_address_apartment2 = $validationData['emergency_address_apartment2'];
            $employee_id = Employee::create([
                'employee_no' => $request->input('employee_no'),
                'branch_id' => $request->input('branch_id'),
                'managerial_position_id' => $request->input('managerial_position_id'),
                'grade' => $request->input('grade'),
                'work_category' => $request->input('work_category'),
                'enrollment_category' => $request->input('enrollment_category'),
                'transfer_date' => $this->formatDate($request->input('transfer_date')),
                'division_name' => $request->input('division_name'),
                'division_name_kana' => $request->input('division_name_kana'),
                'last_name' => $request->input('last_name'),
                'last_name_kana' => $request->input('last_name_kana'),
                'last_name_alphabet' => $request->input('last_name_alphabet'),
                'first_name' => $request->input('first_name'),
                'first_name_kana' => $request->input('first_name_kana'),
                'first_name_alphabet' => $request->input('first_name_alphabet'),
                'old_last_name' => $request->input('old_last_name'),
                'old_last_name_kana' => $request->input('old_last_name_kana'),
                'old_last_name_alphabet' => $request->input('old_last_name_alphabet'),
                'old_first_name' => $request->input('old_first_name'),
                'old_first_name_kana' => $request->input('old_first_name_kana'),
                'old_first_name_alphabet' => $request->input('old_first_name_alphabet'),
                'name_common' => $request->input('name_common'),
                'name_common_kana' => $request->input('name_common_kana'),
                'sex' => $request->input('sex'),
                'birthday' => $this->formatDate($request->input('birthday_date')),
                'post_code' => $request->input('post_code'),
                'address_prefecture' => $request->input('address_prefecture'),
                'address_city' => $request->input('address_city'),
                'address_ward' => $address_ward,
                'address_apartment' => $address_apartment,
                'address_city_kana' => $request->input('address_city_kana'),
                'address_ward_kana' => $request->input('address_ward_kana'),
                'address_apartment_kana' => $request->input('address_apartment_kana'),
                'tel_area_code' => $request->input('tel_area_code'),
                'tel_city_code' => $request->input('tel_city_code'),
                'tel_subscriber_code' => $request->input('tel_subscriber_code'),
                'fax' => $fax,
                'mail_address1' => $request->input('mail_address1'),
                'mail_address2' => $request->input('mail_address2'),
                'emergency_post_code1' => $request->input('emergency_post_code1'),
                'emergency_contact1' => $request->input('emergency_contact1'),
                'emergency_relationship1' => $request->input('emergency_relationship1'),
                'emergency_tel1' => $request->input('emergency_tel1'),
                'emergency_address_prefecture1' => $request->input('emergency_address_prefecture1'),
                'emergency_address_city1' => $request->input('emergency_address_city1'),
                'emergency_address_ward1' => $emergency_address_ward1,
                'emergency_address_apartment1' => $emergency_address_apartment1,
                'emergency_post_code2' => $request->input('emergency_post_code2'),
                'emergency_contact2' => $request->input('emergency_contact2'),
                'emergency_relationship2' => $request->input('emergency_relationship2'),
                'emergency_tel2' => $request->input('emergency_tel2'),
                'emergency_address_prefecture2' => $request->input('emergency_address_prefecture2'),
                'emergency_address_city2' => $request->input('emergency_address_city2'),
                'emergency_address_ward2' => $emergency_address_ward2,
                'emergency_address_apartment2' => $emergency_address_apartment2,
                'spouse_flg' => $request->input('spouse_flg'),
                'dependent_flg' => $request->input('dependent_flg'),
                'dependent_family_number' => $request->input('dependent_family_number'),
                'country_id' => $request->input('country_id'),
                'salary_notices' => $request->input('salary_notices'),
                'insured_age_type' => $request->input('insured_age_type'),
                'insurer_reference_no' => $request->input('insurer_reference_no'),
                'employment_insured_no' => $request->input('employment_insured_no'),
                'residence_card_no' => $request->input('residence_card_no'),
                'stay_date_period' => $this->formatDate($request->input('stay_date_period')),
                'residential_status_id' => $request->input('residential_status_id'),
                'residential_status_unknown_reason' => $request->input('residential_status_unknown_reason'),
                'unauthorized_activities_permission_flg' => $request->input('unauthorized_activities_permission_flg'),
                'mynumber_card_no' => $request->input('mynumber_card_no'),
                'social_insurance_no' => $request->input('social_insurance_no'),
                'pension_no' => $request->input('pension_no'),
                'labor_insurance_type' => $request->input('labor_insurance_type'),
                'employment_insurance_type' => $request->input('employment_insurance_type'),
                'insurance_office_no' => $request->input('insurance_office_no'),
                'insurer_no' => $request->input('insurer_no'),
                'employment_insurance_applied_date' => $this->formatDate($request->input('employment_insurance_applied_date')),
                'employment_insured_date' => $this->formatDate($request->input('employment_insured_date')),
                'employee_type' => $request->input('employee_type'),
                'employee_status' => $request->input('employee_status'),
                'contract_period_flg' => $request->input('contract_period_flg'),
                'contract_start_date' => $this->formatDate($request->input('contract_start_date')),
                'contract_end_date' => $this->formatDate($request->input('contract_end_date')),
                'contract_renewal_flg' => $request->input('contract_renewal_flg'),
                'hired_date' => $this->formatDate($request->input('hired_date')),
                'retirement_date' => $this->formatDate($request->input('retirement_date')),
                'intended_retirement_date' => $this->formatDate($request->input('intended_retirement_date')),
                'resignation_letter_request_flg' => $request->input('resignation_letter_request_flg'),
                'private_introduction' => $request->input('private_introduction'),
                'recruitment_category' => $request->input('recruitment_category'),
                'recruitment_category_detail' => $request->input('recruitment_category_detail'),
                'employment_status' => $request->input('employment_status'),
                'pay_type' => $request->input('pay_type'),
                'insurance_loss_reason' => $request->input('insurance_loss_reason'),
                'over_retired_insurance_loss_reason' => $request->input('over_retired_insurance_loss_reason'), // developにない
                // 'over_70_non_applicable_flg' => $request->input('over_70_non_applicable_flg'), // developにない
                'passed_away_date' => $this->formatDate($request->input('passed_away_date')),
                //'personal_information_access_flg' => $request->input('personal_information_access_flg'),
                //'personal_information_access_flg_tmsp' => $request->input('personal_information_access_flg_tmsp'),
                'external_advisor_flg' => $request->input('external_advisor_flg'),
                'occupation_type' => $request->input('occupation_type'),
                'employment_route' => $request->input('employment_route'),
                //'insured_reason' => $request->input('insured_reason'),
                //'insured_reason_details' => $request->input('insured_reason_details'),
                //'currency_id' => $request->input('currency_id'),
                //'salary_payment_system' => $request->input('salary_payment_system'),
                // 'caregiver_leave_benefit_receive_bank_id' => $request->input('caregiver_leave_benefit_receive_bank_id'),// developにない
                'japan_post_bank_code_no' => $request->input('japan_post_bank_code_no'),
                // 'japan_post_bank_account_no' => $request->input('japan_post_bank_account_no'),// developにない
                // 'bank_account_no' => $request->input('bank_account_no'),// developにない
                'employment_type' => $request->input('employment_type'),
                'employer_type' => $request->input('employer_type'),
                'employment_start_date' => $this->formatDate($request->input('employment_start_date')),
                'employment_end_date' => $this->formatDate($request->input('employment_end_date')),
                'blood_type' => $request->input('blood_type'),
                'qualifications' => $request->input('qualifications'),
                'insured_status' => $request->input('insured_status'),
                'health_insurance_association_number' => $request->input('health_insurance_association_number'),
                'acquisition_of_distinction' => $request->input('acquisition_of_distinction'),
                'health_insurance_acquisition_date' => $this->formatDate($request->input('health_insurance_acquisition_date')),
                'health_insurance_loss_date' => $this->formatDate($request->input('health_insurance_loss_date')),
                'welfare_pension' => $request->input('welfare_pension'),
                'overseas_special_exception' => $request->input('overseas_special_exception'),
                'overseas_special_exception_date' => $this->formatDate($request->input('overseas_special_exception_date')),
                'overseas_special_not_exception_date' => $this->formatDate($request->input('overseas_special_not_exception_date')),
                'dispatch_contract_completion' => $request->input('dispatch_contract_completion'),
                'employment_not_insured_date' => $this->formatDate($request->input('employment_not_insured_date')),
                'bank_name' => $request->input('bank_name'),
                'bank_name_kana' => $request->input('bank_name_kana'),
                'head_office_or_branch_office' => $request->input('head_office_or_branch_office'),
                'financial_institution_code' => $request->input('financial_institution_code'),
                'store_code' => $request->input('store_code'),
                'japan_bank_flg' => $request->input('japan_bank_flg'),
                'bank_account_no' => $request->input('bank_account_no'),
                'japan_post_bank_code_no' => $request->input('japan_post_bank_code_no'),
            ])->id;

            $company_id = Branch::join('m_company as company', 'm_branch.company_id', '=', 'company.id')
                ->where('m_branch.id', $request->input('branch_id'))
                ->select('company.id')
                ->first();

            $pickup_setting = Pickup_setting::where('company_id', $company_id->id)
                ->select('change_in_dependent_status')
                ->first();
            if (empty($companyPickupSetting)) {
                $companyPickupSetting = new Pickup_setting([
                    'company_id' => $company_id->id,
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

            $insertData = [];

            $hired_date = $this->formatDate($request->input('hired_date'));
            if($hired_date) {
                $hired_date = Carbon::parse($hired_date);
                $due_date = $hired_date->copy()->addMonth()->day(10);

                $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                    ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                    ->where('m_pickup_type.id', 21)
                    ->first();

                $search = ['pickup_type', 'employee', 'starting_date', 'due_date'];
                $replace = [
                    '資格取得届',
                    $request->input('last_name') . ' ' . $request->input('first_name'),
                    $hired_date->copy()->format('Y年n月j日'),
                    $due_date->copy()->format('Y年n月j日'),
                ];

                $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                $content = str_replace($search, $replace, $pickupMessage->content);

                if($due_date->gte(Carbon::today())) {
                    $insertData[] = [
                        'company_id' => $company_id->id,
                        'pickup_type_id' => 21,
                        'employee_id' => $employee_id,
                        'dependent_id' => null,
                        'starting_date' => $hired_date,
                        'due_date' => $due_date,
                        'business_name' => $business_name,
                        'content' => $content,
                        'created_at' => now(),
                    ];
                }
            }

            $retirement_date = $this->formatDate($request->input('retirement_date')) ? $this->formatDate($request->input('retirement_date'))
                : ($this->formatDate($request->input('intended_retirement_date')) ? $this->formatDate($request->input('intended_retirement_date'))
                : null);
            if($retirement_date) {
                $retirement_date = Carbon::parse($retirement_date);

                $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                    ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                    ->where('m_pickup_type.id', 24)
                    ->first();

                $search = ['pickup_type', 'employee', 'due_date'];
                $replace = [
                    '資格喪失届',
                    $request->input('last_name') . ' ' . $request->input('first_name'),
                    $retirement_date->copy()->format('Y年n月j日'),
                ];

                $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                $content = str_replace($search, $replace, $pickupMessage->content);

                if(!empty($retirement_date) && $retirement_date->gte(Carbon::today())) {
                    $insertData[] = [
                        'company_id' => $company_id->id,
                        'pickup_type_id' => 24,
                        'employee_id' => $employee_id,
                        'dependent_id' => null,
                        'starting_date' => null,
                        'due_date' => $retirement_date,
                        'business_name' => $business_name,
                        'content' => $content,
                        'created_at' => now(),
                    ];
                }
            }

            $dename = $request->input('de-last_name');
            if (!is_null($dename)) {
                foreach ($dename as $index => $name) {
                    $dedata = $this->data_dependent($validationData, $index, $employee_id);
                    $dependent_id = Dependent::create($dedata)->id;

                    if(!empty($pickup_setting)) {
                        $relationship_spouses = [
                            '未選択',
                            '夫',
                            '妻',
                            '夫(未届)',
                            '妻(未届)',
                        ];
                        $relationship_dependents = [
                            '未選択',
                            '配偶者',
                            '子供',
                            '養子',
                            '孫',
                            '兄弟姉妹',
                            '父母',
                            '祖父母',
                            '義父母',
                            '義兄弟姉妹',
                            '従兄弟姉妹',
                            '甥・姪',
                            'おじ・おば',
                            '継父母',
                            '継子',
                            'その他の親族',
                        ];
                        $relationship_spouse = $dedata['relationship_spouse'] ?? null;
                        $relationship_dependent = $dedata['relationship_dependent'] ?? null;
                        $relation = '';
                        if(!empty($relationship_spouse)) {
                            $relation = $relationship_spouses[$relationship_spouse];
                        } elseif(!empty($relationship_dependent)) {
                            $relation = $relationship_dependents[$relationship_dependent];
                        }

                        $dependent_name = $dedata['last_name'] . ' ' . $dedata['first_name'];

                        $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                            ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                            ->where('m_pickup_type.id', 15)
                            ->first();

                        $search = ['pickup_type', 'employee', 'relation', 'dependent'];
                        $replace = [
                            '扶養変更',
                            $request->input('last_name') . ' ' . $request->input('first_name'),
                            $relation,
                            $dependent_name,
                        ];

                        $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                        $content = str_replace($search, $replace, $pickupMessage->content);

                        if(!empty($dedata['date_of_expiry'])) {
                            $due_date = Carbon::parse($dedata['date_of_expiry'])->addDays($pickup_setting->change_in_dependent_status);

                            if($due_date->gte(Carbon::today())) {
                                $insertData[] = [
                                    'company_id' => $company_id->id,
                                    'pickup_type_id' => 15,
                                    'employee_id' => $employee_id,
                                    'dependent_id' => $dependent_id,
                                    'starting_date' => null,
                                    'due_date' => $due_date,
                                    'business_name' => $business_name,
                                    'content' => $content,
                                    'created_at' => now(),
                                ];
                            }
                        } elseif(!empty($dedata['date_of_authorisation'])) {
                            $due_date = Carbon::parse($dedata['date_of_authorisation'])->addDays($pickup_setting->change_in_dependent_status);

                            if($due_date->gte(Carbon::today())) {
                                $insertData[] = [
                                    'company_id' => $company_id->id,
                                    'pickup_type_id' => 15,
                                    'employee_id' => $employee_id,
                                    'dependent_id' => $dependent_id,
                                    'starting_date' => null,
                                    'due_date' => $due_date,
                                    'business_name' => $business_name,
                                    'content' => $content,
                                    'created_at' => now(),
                                ];
                            }
                        } elseif(!empty($dedata['dependent_type'])) {
                            $due_date = Carbon::now()->addDays($pickup_setting->change_in_dependent_status);

                            $insertData[] = [
                                'company_id' => $company_id->id,
                                'pickup_type_id' => 15,
                                'employee_id' => $employee_id,
                                'dependent_id' => $dependent_id,
                                'starting_date' => null,
                                'due_date' => $due_date,
                                'business_name' => $business_name,
                                'content' => $content,
                                'created_at' => now(),
                            ];
                        }
                    }
                }
            }

            Pickup::insert($insertData);

            $departments = $request->input('departments', []);
            foreach ($departments as $dep) {
                Employee_department::insert([
                    'department_id' => $dep,
                    'employee_id' => $employee_id
                ]);
            }

            Employee::where('id', $employee_id)->update(['role_id' => 100]);

            $data = [
                'name' => $request->input('last_name') . ' ' . $request->input('first_name'),
                'email' => $request->input('user_email'),
                'password' => Hash::make($request->input('user_pass')),
                'employee_id' => $employee_id
            ];

            if (User::where('email', $request->input('user_email'))->exists()) {
                return back()->withErrors('このメールアドレスは既に使用されています。')->withInput();
            }

            User::create($data);

            $company_id = $request->input('company_id');
            $icon_file = $request->file('icon_file');
            if ($icon_file && $company_id && $employee_id) {
                $extension = $icon_file->getClientOriginalExtension();
                $directory = 'photo/' . $company_id;
                $filePath = $directory . '/' . $employee_id . '.' . $extension;
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }

                $icon_file->storeAs($filePath);
            }

            DB::commit();
            $this->putSuccess();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);
            return back()->withErrors('エラー')->withInput();
        }
        return redirect()->route('admin.labor');
    }

    public function employee_update(Request $request, $id)
    {
        $employee = Employee::where('id', $id)->where('delete_flg', 0)->first();
        $branch = $employee->branch()->first();
        $company = $branch->company()->first();

        $employee->company_name = $company->name;
        $employee->company_id = $company->id;
        $employee->branch_name = $branch->name;

        if (!empty($employee->company_id)) {
            $directory = 'photo/' . $employee->company_id;
            $files = Storage::files($directory);
            foreach ($files as $file) {
                $fileName = pathinfo($file, PATHINFO_FILENAME);
                if ((int)$fileName === $employee->id) {
                    $filePath = '/' . $file . '?v=' . time();
                }
            }
            if (!isset($filePath)) {
                $filePath = '/img/image.png';
            }
        }

        if ($employee && !empty($employee->fax)) {
            $faxParts = explode('-', $employee->fax);
        } else {
            $faxParts = ['', '', ''];
        }

        $employee_type = Values_employee_employee_type::pluck('name', 'id');
        $sex_type = Values_sex::pluck('name', 'id');
        $prefectures = Prefecture::pluck('name', 'id');
        $country_type = Country::pluck('country_name', 'id');
        $employee_status_type = Values_employee_employee_status::pluck('name', 'id');
        $labor_insurance_type = Values_employee_labor_insurance_type::pluck('name', 'id');
        $employment_insurance_type = Values_employee_employment_insurance_type::pluck('name', 'id');
        $insurance_loss_reason = Values_employee_insurance_loss_reason::pluck('name', 'id');
        $over_retired_insurance_loss_reason = Values_employee_over_retired_insurance_loss_reason::pluck('name', 'id');
        $occupation_type = Values_employee_occupation_type::pluck('name', 'option_no');
        $departments = Employee_department::where('employee_id', $id)->where('delete_flg', 0)->pluck('department_id');
        $departments_list = Department::select('id', 'name')->where('company_id', $employee->company_id)->where('delete_flg', 0)->get();
        $managerial_position_list = Managerial_position::where('company_id', $employee->company_id)->where('delete_flg', 0)->pluck('name', 'id');
        $residential_status = Residential_status::pluck('content', 'id');
        $employee_insured_age_type = Values_employee_insured_age_type::pluck('name', 'id');
        $dependent = $employee->dependent()->where('delete_flg', 0)->orderByRaw('spouse_flag DESC')->orderBy('history_flg', 'desc')->get();
        $qualifications = Qualifications::select('id', 'qualification_name')->where('company_id', $company->id)->where('delete_flg', 0)->get();
        $employee_qualifications = Employee_qualifications::join('m_qualifications', 'm_employee_qualifications.qualifications_id', '=', 'm_qualifications.id')
            ->where('m_employee_qualifications.employee_id', $employee->id)
            ->where('m_qualifications.delete_flg', 0)
            ->where('m_employee_qualifications.delete_flg', 0)
            ->pluck('m_qualifications.id');

        $work_category = Values_employee_work_category::pluck('name', 'id');
        $enrollment_category = Values_employee_enrollment_category::pluck('name', 'id');
        $employment_route = Values_employee_employment_route::pluck('name', 'id');
        $recruitment_category_detail = Values_employee_recruitment_category_detail::pluck('name', 'id');
        $employment_status = Values_employee_employment_status::pluck('name', 'id');
        $pay_type = Values_employee_pay_type::pluck('name', 'id');

        return view('admin.employee_create', [
            'employee' => $employee,
            'filePath' => $filePath,
            'departments' => $departments,
            'departments_list' => $departments_list,
            'managerial_position_list' => $managerial_position_list,
            'employee_id' => $id,
            'employee_type' => $employee_type,
            'sex_type' => $sex_type,
            'prefectures' => $prefectures,
            'country_type' => $country_type,
            'employee_status_type' => $employee_status_type,
            'labor_insurance_type' => $labor_insurance_type,
            'employment_insurance_type' => $employment_insurance_type,
            'insurance_loss_reason' => $insurance_loss_reason,
            'over_retired_insurance_loss_reason' => $over_retired_insurance_loss_reason,
            'occupation_type' => $occupation_type,
            'faxParts' => $faxParts,
            'residential_status' => $residential_status,
            'employee_insured_age_type' => $employee_insured_age_type,
            'dependent' => $dependent,
            'qualifications' => $qualifications,
            'employee_qualifications' => $employee_qualifications,
            'work_category' => $work_category,
            'enrollment_category' => $enrollment_category,
            'employment_route' => $employment_route,
            'recruitment_category_detail' => $recruitment_category_detail,
            'employment_status' => $employment_status,
            'pay_type' => $pay_type,
        ]);
    }

    public function employee_update_post(AdminEmployeeUpdateRequest $request)
    {
        $currentUser = CurrentUser::info();
        $sinner = User::where('employee_id', $currentUser->id)->first();
        $existsCompany = Company::find($request->input('company_id'));
        if (empty($existsCompany)) {
            \Log::error('不正利用者：' . $sinner->email);
            return abort(404);
        }
        $existsBranch = Branch::where('id', $request->input('branch_id'))->where('company_id', $existsCompany->id)->first();
        if (empty($existsBranch)) {
            \Log::error('不正利用者：' . $sinner->email);
            return abort(404);
        }
        if ($request->input('departments')) {
            foreach ($request->input('departments') as $department) {
                $existsDepartment = Department::where('id', $department)->where('company_id', $existsCompany->id)->first();
                if (empty($existsDepartment)) {
                    \Log::error('不正利用者：' . $sinner->email);
                    return abort(404);
                }
            }
        }
        if ($request->input('managerial_position_id')) {
            $existsManagerialPosition = Managerial_position::where('id', $request->input('managerial_position_id'))->where('company_id', $existsCompany->id)->first();
            if (empty($existsManagerialPosition)) {
                \Log::error('不正利用者：' . $sinner->email);
                return abort(404);
            }
        }
        if ($request->input('qualifications')) {
            foreach ($request->input('qualifications') as $qualification) {
                $existsQualification = Qualifications::where('id', $qualification)->where('company_id', $existsCompany->id)->first();
                if (empty($existsQualification)) {
                    \Log::error('不正利用者：' . $sinner->email);
                    return abort(404);
                }
            }
        }

        if (!empty($request->input('fax1')) && !empty($request->input('fax2')) && !empty($request->input('fax3'))) {
            $fax = implode('-', [
                $request->input('fax1'),
                $request->input('fax2'),
                $request->input('fax3')
            ]);
        } else {
            $fax = null;
        };
        DB::beginTransaction();
        try {
            $old_employee_data = Employee::where('id', $request->input('employee_id'))
                ->select('hired_date', 'retirement_date', 'intended_retirement_date')
                ->first();
            $old_hired_date = $old_employee_data->hired_date;
            $old_hired_date = $old_hired_date ? Carbon::parse($old_hired_date)->startOfDay() : null;
            $old_retirement_date = $old_employee_data->retirement_date;
            $old_retirement_date = $old_retirement_date ? Carbon::parse($old_retirement_date)->startOfDay() : null;
            $old_intended_retirement_date = $old_employee_data->intended_retirement_date;
            $old_intended_retirement_date = $old_intended_retirement_date ? Carbon::parse($old_intended_retirement_date)->startOfDay() : null;

            $data = $request->validationData($request);
            $address_city = $data['address_city'];
            $address_ward = $data['address_ward'];
            $address_apartment = $data['address_apartment'];
            $emergency_address_ward1 = $data['emergency_address_ward1'];
            $emergency_address_apartment1 = $data['emergency_address_apartment1'];
            $emergency_address_ward2 = $data['emergency_address_ward2'];
            $emergency_address_apartment2 = $data['emergency_address_apartment2'];
            Employee::where('id', $request->input('employee_id'))
                ->update([
                    'employee_no' => $request->input('employee_no'),
                    'branch_id' => $request->input('branch_id'),
                    'managerial_position_id' => $request->input('managerial_position_id'),
                    'grade' => $request->input('grade'),
                    'work_category' => $request->input('work_category'),
                    'enrollment_category' => $request->input('enrollment_category'),
                    'transfer_date' => $this->formatDate($request->input('transfer_date')),
                    'division_name' => $request->input('division_name'),
                    'division_name_kana' => $request->input('division_name_kana'),
                    'last_name' => $request->input('last_name'),
                    'last_name_kana' => $request->input('last_name_kana'),
                    'last_name_alphabet' => $request->input('last_name_alphabet'),
                    'first_name' => $request->input('first_name'),
                    'first_name_kana' => $request->input('first_name_kana'),
                    'first_name_alphabet' => $request->input('first_name_alphabet'),
                    'old_last_name' => $request->input('old_last_name'),
                    'old_last_name_kana' => $request->input('old_last_name_kana'),
                    'old_last_name_alphabet' => $request->input('old_last_name_alphabet'),
                    'old_first_name' => $request->input('old_first_name'),
                    'old_first_name_kana' => $request->input('old_first_name_kana'),
                    'old_first_name_alphabet' => $request->input('old_first_name_alphabet'),
                    'name_common' => $request->input('name_common'),
                    'name_common_kana' => $request->input('name_common_kana'),
                    'sex' => $request->input('sex'),
                    'birthday' => $this->formatDate($request->input('birthday_date')),
                    'post_code' => $request->input('post_code'),
                    'address_prefecture' => $request->input('address_prefecture'),
                    'address_city' => $address_city,
                    'address_ward' => $address_ward,
                    'address_apartment' => $address_apartment,
                    'tel_area_code' => $request->input('tel_area_code'),
                    'tel_city_code' => $request->input('tel_city_code'),
                    'tel_subscriber_code' => $request->input('tel_subscriber_code'),
                    'fax' => $fax,
                    'mail_address1' => $request->input('mail_address1'),
                    'mail_address2' => $request->input('mail_address2'),
                    'emergency_post_code1' => $request->input('emergency_post_code1'),
                    'emergency_contact1' => $request->input('emergency_contact1'),
                    'emergency_relationship1' => $request->input('emergency_relationship1'),
                    'emergency_tel1' => $request->input('emergency_tel1'),
                    'emergency_address_prefecture1' => $request->input('emergency_address_prefecture1'),
                    'emergency_address_city1' => $request->input('emergency_address_city1'),
                    'emergency_address_ward1' => $emergency_address_ward1,
                    'emergency_address_apartment1' => $emergency_address_apartment1,
                    'emergency_post_code2' => $request->input('emergency_post_code2'),
                    'emergency_contact2' => $request->input('emergency_contact2'),
                    'emergency_relationship2' => $request->input('emergency_relationship2'),
                    'emergency_tel2' => $request->input('emergency_tel2'),
                    'emergency_address_prefecture2' => $request->input('emergency_address_prefecture2'),
                    'emergency_address_city2' => $request->input('emergency_address_city2'),
                    'emergency_address_ward2' => $emergency_address_ward2,
                    'emergency_address_apartment2' => $emergency_address_apartment2,
                    'spouse_flg' => $request->input('spouse_flg'),
                    'dependent_flg' => $request->input('dependent_flg'),
                    'dependent_family_number' => $request->input('dependent_family_number'),
                    'country_id' => $request->input('country_id'),
                    'salary_notices' => $request->input('salary_notices'),
                    'insured_age_type' => $request->input('insured_age_type'),
                    'insurer_reference_no' => $request->input('insurer_reference_no'),
                    'employment_insured_no' => $request->input('employment_insured_no'),
                    'residence_card_no' => $request->input('residence_card_no'),
                    'stay_date_period' => $this->formatDate($request->input('stay_date_period')),
                    'residential_status_id' => $request->input('residential_status_id'),
                    'residential_status_unknown_reason' => $request->input('residential_status_unknown_reason'),
                    'unauthorized_activities_permission_flg' => $request->input('unauthorized_activities_permission_flg'),
                    'social_insurance_no' => $request->input('social_insurance_no'),
                    'pension_no' => $request->input('pension_no'),
                    'labor_insurance_type' => $request->input('labor_insurance_type'),
                    'employment_insurance_type' => $request->input('employment_insurance_type'),
                    'insurance_office_no' => $request->input('insurance_office_no'),
                    'insurer_no' => $request->input('insurer_no'),
                    'employment_insurance_applied_date' => $this->formatDate($request->input('employment_insurance_applied_date')),
                    'employment_insured_date' => $this->formatDate($request->input('employment_insured_date')),
                    'employee_type' => $request->input('employee_type'),
                    'employee_status' => $request->input('employee_status'),
                    'contract_period_flg' => $request->input('contract_period_flg'),
                    'contract_start_date' => $this->formatDate($request->input('contract_start_date')),
                    'contract_end_date' => $this->formatDate($request->input('contract_end_date')),
                    'contract_renewal_flg' => $request->input('contract_renewal_flg'),
                    'hired_date' => $this->formatDate($request->input('hired_date')),
                    'retirement_date' => $this->formatDate($request->input('retirement_date')),
                    'intended_retirement_date' => $this->formatDate($request->input('intended_retirement_date')),
                    'resignation_letter_request_flg' => $request->input('resignation_letter_request_flg'),
                    'private_introduction' => $request->input('private_introduction'),
                    'recruitment_category' => $request->input('recruitment_category'),
                    'recruitment_category_detail' => $request->input('recruitment_category_detail'),
                    'employment_status' => $request->input('employment_status'),
                    'pay_type' => $request->input('pay_type'),
                    'insurance_loss_reason' => $request->input('insurance_loss_reason'),
                    'over_retired_insurance_loss_reason' => $request->input('over_retired_insurance_loss_reason'), // developにない
                    //'over_70_non_applicable_flg' => $request->input('over_70_non_applicable_flg'), // developにない
                    'passed_away_date' => $this->formatDate($request->input('passed_away_date')),
                    //'personal_information_access_flg' => $request->input('personal_information_access_flg'),
                    //'personal_information_access_flg_tmsp' => $request->input('personal_information_access_flg_tmsp'),
                    'external_advisor_flg' => $request->input('external_advisor_flg'),
                    'occupation_type' => $request->input('occupation_type'),
                    'employment_route' => $request->input('employment_route'),
                    //'insured_reason' => $request->input('insured_reason'),
                    //'insured_reason_details' => $request->input('insured_reason_details'),
                    //'currency_id' => $request->input('currency_id'),
                    //'salary_payment_system' => $request->input('salary_payment_system'),
                    // 'caregiver_leave_benefit_receive_bank_id' => $request->input('caregiver_leave_benefit_receive_bank_id'),// developにない
                    // 'japan_post_bank_account_no' => $request->input('japan_post_bank_account_no'),// developにない
                    // 'bank_account_no' => $request->input('bank_account_no'),// developにない
                    'employment_type' => $request->input('employment_type'),
                    'employer_type' => $request->input('employer_type'),
                    'employment_start_date' => $this->formatDate($request->input('employment_start_date')),
                    'employment_end_date' => $this->formatDate($request->input('employment_end_date')),
                    'blood_type' => $request->input('blood_type'),
                    'insured_status' => $request->input('insured_status'),
                    'health_insurance_association_number' => $request->input('health_insurance_association_number'),
                    'acquisition_of_distinction' => $request->input('acquisition_of_distinction'),
                    'health_insurance_acquisition_date' => $this->formatDate($request->input('health_insurance_acquisition_date')),
                    'health_insurance_loss_date' => $this->formatDate($request->input('health_insurance_loss_date')),
                    'welfare_pension' => $request->input('welfare_pension'),
                    'overseas_special_exception' => $request->input('overseas_special_exception'),
                    'overseas_special_exception_date' => $this->formatDate($request->input('overseas_special_exception_date')),
                    'overseas_special_not_exception_date' => $this->formatDate($request->input('overseas_special_not_exception_date')),
                    'dispatch_contract_completion' => $request->input('dispatch_contract_completion'),
                    'employment_not_insured_date' => $this->formatDate($request->input('employment_not_insured_date')),
                    'bank_name' => $request->input('bank_name'),
                    'bank_name_kana' => $request->input('bank_name_kana'),
                    'head_office_or_branch_office' => $request->input('head_office_or_branch_office'),
                    'financial_institution_code' => $request->input('financial_institution_code'),
                    'store_code' => $request->input('store_code'),
                    'japan_bank_flg' => $request->input('japan_bank_flg'),
                ]);

            $employee = Employee::find($request->input('employee_id'));
            $employee->update([
                'mynumber_card_no' => $request->input('mynumber_card_no'),
                'bank_account_no' => $request->input('bank_account_no'),
                'japan_post_bank_code_no' => $request->input('japan_post_bank_code_no'),
            ]);

            $deids = $request->input('de-id', []);
            $excepts = [];

            $company_id = Branch::join('m_company as company', 'm_branch.company_id', '=', 'company.id')
                    ->where('m_branch.id', $request->input('branch_id'))
                    ->select('company.id')
                    ->first();

            $pickup_setting = Pickup_setting::where('company_id', $company_id->id)
                ->select('change_in_dependent_status')
                ->first();
            if (empty($companyPickupSetting)) {
                $companyPickupSetting = new Pickup_setting([
                    'company_id' => $company_id->id,
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

            $insertData = [];

            $hired_date = $this->formatDate($request->input('hired_date'));
            if($hired_date) {
                $hired_date = Carbon::parse($hired_date);
                $due_date = $hired_date->copy()->addMonth()->day(10);

                if(!$hired_date->isSameDay($old_hired_date) && $due_date->gte(Carbon::today())) {
                    $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                        ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                        ->where('m_pickup_type.id', 21)
                        ->first();

                    $search = ['pickup_type', 'employee', 'starting_date', 'due_date'];
                    $replace = [
                        '資格取得届',
                        $request->input('last_name') . ' ' . $request->input('first_name'),
                        $hired_date->copy()->format('Y年n月j日'),
                        $due_date->copy()->format('Y年n月j日'),
                    ];

                    $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                    $content = str_replace($search, $replace, $pickupMessage->content);

                    $pickups = Pickup::where('employee_id', $request->input('employee_id'))->where('pickup_type_id', 21)->get();
                    if(!empty($pickups)) {
                        foreach($pickups as $pickup) {
                            $pickup->update([
                                'pickup_situation_id' => 4,
                                'anonymous_flg' => 1,
                            ]); 
                        }
                    }

                    $insertData[] = [
                        'company_id' => $company_id->id,
                        'pickup_type_id' => 21,
                        'employee_id' => $request->input('employee_id'),
                        'dependent_id' => null,
                        'starting_date' => $hired_date,
                        'due_date' => $due_date,
                        'business_name' => $business_name,
                        'content' => $content,
                        'created_at' => now(),
                    ];
                }
            }

            $retirement_date = $this->formatDate($request->input('retirement_date')) ?? null;
            $intended_retirement_date = $this->formatDate($request->input('intended_retirement_date')) ?? null;
            if($retirement_date) {
                $retirement_date = Carbon::parse($retirement_date);

                if(!empty($retirement_date) && ($old_retirement_date === null || !$retirement_date->isSameDay($old_retirement_date)) && $retirement_date->gte(Carbon::today())) {
                    $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                        ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                        ->where('m_pickup_type.id', 24)
                        ->first();

                    $search = ['pickup_type', 'employee', 'due_date'];
                    $replace = [
                        '資格喪失届',
                        $request->input('last_name') . ' ' . $request->input('first_name'),
                        $retirement_date->copy()->format('Y年n月j日'),
                    ];

                    $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                    $content = str_replace($search, $replace, $pickupMessage->content);

                    $pickups = Pickup::where('employee_id', $request->input('employee_id'))->where('pickup_type_id', 24)->get();
                    if(!empty($pickups)) {
                        foreach($pickups as $pickup) {
                            $pickup->update([
                                'pickup_situation_id' => 4,
                                'anonymous_flg' => 1,
                            ]); 
                        }
                    }

                    $insertData[] = [
                        'company_id' => $company_id->id,
                        'pickup_type_id' => 24,
                        'employee_id' => $request->input('employee_id'),
                        'dependent_id' => null,
                        'starting_date' => null,
                        'due_date' => $retirement_date,
                        'business_name' => $business_name,
                        'content' => $content,
                        'created_at' => now(),
                    ];
                }
            } elseif($intended_retirement_date) {
                $intended_retirement_date = Carbon::parse($intended_retirement_date);

                if(!empty($intended_retirement_date) && !$intended_retirement_date->isSameDay($old_intended_retirement_date) && $intended_retirement_date->gte(Carbon::today())) {
                    $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                        ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                        ->where('m_pickup_type.id', 24)
                        ->first();

                    $search = ['pickup_type', 'employee', 'due_date'];
                    $replace = [
                        '資格喪失届',
                        $request->input('last_name') . ' ' . $request->input('first_name'),
                        $intended_retirement_date->copy()->format('Y年n月j日'),
                    ];

                    $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                    $content = str_replace($search, $replace, $pickupMessage->content);

                    $pickups = Pickup::where('employee_id', $request->input('employee_id'))->where('pickup_type_id', 24)->get();
                    if(!empty($pickups)) {
                        foreach($pickups as $pickup) {
                            $pickup->update([
                                'pickup_situation_id' => 4,
                                'anonymous_flg' => 1,
                            ]); 
                        }
                    }

                    $insertData[] = [
                        'company_id' => $company_id->id,
                        'pickup_type_id' => 24,
                        'employee_id' => $request->input('employee_id'),
                        'dependent_id' => null,
                        'starting_date' => null,
                        'due_date' => $intended_retirement_date,
                        'business_name' => $business_name,
                        'content' => $content,
                        'created_at' => now(),
                    ];
                }
            }

            foreach ($deids as $index => $deid) {
                $dedata = $this->data_dependent($data, $index, $request->input('employee_id'));
                if ($deid > 0) {
                    $dependent = Dependent::find($deid);
                    $old_date_of_expiry = null;
                    $old_date_of_authorisation = null;
                    $old_dependent_type = null;
                    if ($dependent) {
                        $old_date_of_expiry = $dependent->date_of_expiry;
                        $old_date_of_expiry = $old_date_of_expiry ? Carbon::parse($old_date_of_expiry)->startOfDay() : null;
                        $old_date_of_authorisation = $dependent->date_of_authorisation;
                        $old_date_of_authorisation = $old_date_of_authorisation ? Carbon::parse($old_date_of_authorisation)->startOfDay() : null;
                        $old_dependent_type = $dependent->dependent_type;

                        $dependent->fill($dedata);
                        $dependent->save();
                    }
                    $excepts[] = $deid;

                    if(!empty($pickup_setting)) {
                        $relationship_spouses = [
                            '未選択',
                            '夫',
                            '妻',
                            '夫(未届)',
                            '妻(未届)',
                        ];
                        $relationship_dependents = [
                            '未選択',
                            '配偶者',
                            '子供',
                            '養子',
                            '孫',
                            '兄弟姉妹',
                            '父母',
                            '祖父母',
                            '義父母',
                            '義兄弟姉妹',
                            '従兄弟姉妹',
                            '甥・姪',
                            'おじ・おば',
                            '継父母',
                            '継子',
                            'その他の親族',
                        ];
                        $relationship_spouse = $dedata['relationship_spouse'] ?? null;
                        $relationship_dependent = $dedata['relationship_dependent'] ?? null;
                        $relation = '';
                        if(!empty($relationship_spouse)) {
                            $relation = $relationship_spouses[$relationship_spouse];
                        } elseif(!empty($relationship_dependent)) {
                            $relation = $relationship_dependents[$relationship_dependent];
                        }

                        $dependent_name = $dedata['last_name'] . ' ' . $dedata['first_name'];

                        $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                            ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                            ->where('m_pickup_type.id', 15)
                            ->first();

                        $search = ['pickup_type', 'employee', 'relation', 'dependent'];
                        $replace = [
                            '扶養変更',
                            $request->input('last_name') . ' ' . $request->input('first_name'),
                            $relation,
                            $dependent_name,
                        ];

                        $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                        $content = str_replace($search, $replace, $pickupMessage->content);

                        if(!empty($dedata['date_of_expiry']) || !empty($dedata['date_of_authorisation']) || !empty($dedata['dependent_type'])) {
                            if($dedata['date_of_expiry'] && ($old_date_of_expiry === null || !Carbon::parse($dedata['date_of_expiry'])->isSameDay($old_date_of_expiry))) {
                                $due_date = Carbon::parse($dedata['date_of_expiry'])->addDays($pickup_setting->change_in_dependent_status);
                                if($due_date->gte(Carbon::today())) {
                                    $insertData[] = [
                                        'company_id' => $company_id->id,
                                        'pickup_type_id' => 15,
                                        'employee_id' => $request->input('employee_id'),
                                        'dependent_id' => $deid,
                                        'starting_date' => null,
                                        'due_date' => $due_date,
                                        'business_name' => $business_name,
                                        'content' => $content,
                                        'created_at' => now(),
                                    ];
                                }
                            } elseif(($dedata['date_of_authorisation'] && $old_date_of_authorisation === null || !Carbon::parse($dedata['date_of_authorisation'])->isSameDay($old_date_of_authorisation))) {
                                $due_date = Carbon::parse($dedata['date_of_authorisation'])->addDays($pickup_setting->change_in_dependent_status);
                                if($due_date->gte(Carbon::today())) {
                                    $insertData[] = [
                                        'company_id' => $company_id->id,
                                        'pickup_type_id' => 15,
                                        'employee_id' => $request->input('employee_id'),
                                        'dependent_id' => $deid,
                                        'starting_date' => null,
                                        'due_date' => $due_date,
                                        'business_name' => $business_name,
                                        'content' => $content,
                                        'created_at' => now(),
                                    ];
                                }
                            } elseif($dedata['dependent_type'] && $old_dependent_type === null || $old_dependent_type !== (int)$dedata['dependent_type']) {
                                $due_date = Carbon::now()->addDays($pickup_setting->change_in_dependent_status);
                                $insertData[] = [
                                    'company_id' => $company_id->id,
                                    'pickup_type_id' => 15,
                                    'employee_id' => $request->input('employee_id'),
                                    'dependent_id' => $deid,
                                    'starting_date' => null,
                                    'due_date' => $due_date,
                                    'business_name' => $business_name,
                                    'content' => $content,
                                    'created_at' => now(),
                                ];
                            }
                        }
                    }
                } else {
                    $created_id = Dependent::create($dedata)->id;
                    $excepts[] = $created_id;

                    if(!empty($pickup_setting)) {
                        $relationship_spouses = [
                            '未選択',
                            '夫',
                            '妻',
                            '夫(未届)',
                            '妻(未届)',
                        ];
                        $relationship_dependents = [
                            '未選択',
                            '配偶者',
                            '子供',
                            '養子',
                            '孫',
                            '兄弟姉妹',
                            '父母',
                            '祖父母',
                            '義父母',
                            '義兄弟姉妹',
                            '従兄弟姉妹',
                            '甥・姪',
                            'おじ・おば',
                            '継父母',
                            '継子',
                            'その他の親族',
                        ];
                        $relationship_spouse = $dedata['relationship_spouse'] ?? null;
                        $relationship_dependent = $dedata['relationship_dependent'] ?? null;
                        $relation = '';
                        if(!empty($relationship_spouse)) {
                            $relation = $relationship_spouses[$relationship_spouse];
                        } elseif(!empty($relationship_dependent)) {
                            $relation = $relationship_dependents[$relationship_dependent];
                        }

                        $dependent_name = $dedata['last_name'] . ' ' . $dedata['first_name'];

                        $pickupMessage = Pickup_message::join('m_pickup_type', 'm_pickup_message.id', '=', 'm_pickup_type.pickup_message_id')
                            ->select('m_pickup_message.business_name', 'm_pickup_message.content')
                            ->where('m_pickup_type.id', 15)
                            ->first();

                        $search = ['pickup_type', 'employee', 'relation', 'dependent'];
                        $replace = [
                            '扶養変更',
                            $request->input('last_name') . ' ' . $request->input('first_name'),
                            $relation,
                            $dependent_name,
                        ];

                        $business_name = str_replace($search, $replace, $pickupMessage->business_name);
                        $content = str_replace($search, $replace, $pickupMessage->content);

                        if(!empty($dedata['date_of_expiry'])) {
                            $due_date = Carbon::parse($dedata['date_of_expiry'])->addDays($pickup_setting->change_in_dependent_status);

                            if($due_date->gte(Carbon::today())) {
                                $insertData[] = [
                                    'company_id' => $company_id->id,
                                    'pickup_type_id' => 15,
                                    'employee_id' => $request->input('employee_id'),
                                    'dependent_id' => $created_id,
                                    'starting_date' => null,
                                    'due_date' => $due_date,
                                    'business_name' => $business_name,
                                    'content' => $content,
                                    'created_at' => now(),
                                ];
                            }
                        } elseif(!empty($dedata['date_of_authorisation'])) {
                            $due_date = Carbon::parse($dedata['date_of_authorisation'])->addDays($pickup_setting->change_in_dependent_status);

                            if($due_date->gte(Carbon::today())) {
                                $insertData[] = [
                                    'company_id' => $company_id->id,
                                    'pickup_type_id' => 15,
                                    'employee_id' => $request->input('employee_id'),
                                    'dependent_id' => $created_id,
                                    'starting_date' => null,
                                    'due_date' => $due_date,
                                    'business_name' => $business_name,
                                    'content' => $content,
                                    'created_at' => now(),
                                ];
                            }
                        } elseif(!empty($dedata['dependent_type'])) {
                            $due_date = Carbon::now()->addDays($pickup_setting->change_in_dependent_status);

                            $insertData[] = [
                                'company_id' => $company_id->id,
                                'pickup_type_id' => 15,
                                'employee_id' => $request->input('employee_id'),
                                'dependent_id' => $created_id,
                                'starting_date' => null,
                                'due_date' => $due_date,
                                'business_name' => $business_name,
                                'content' => $content,
                                'created_at' => now(),
                            ];
                        }
                    }
                }
            }
            Pickup::insert($insertData);
            Dependent::where('employee_id', $request->input('employee_id'))->where('history_flg',0)->whereNotIn('id', $excepts)->update(['delete_flg' => 1]);

            $qualifications = $request->input('qualifications', []);
            Employee_qualifications::whereNotIn('qualifications_id', $qualifications)
                ->where('employee_id', $request->input('employee_id'))
                ->where('delete_flg', 0)
                ->update(['delete_flg' => 1]);

            $existingQualificationsRecords = Employee_qualifications::whereIn('qualifications_id', $qualifications)->where('employee_id', $request->input('employee_id'))->where('delete_flg', 0)->get();

            $existingQualificationsIds = $existingQualificationsRecords->pluck('qualifications_id')->toArray();
            $newQualificationsIds = array_diff($qualifications, $existingQualificationsIds);
            if (!empty($newQualificationsIds)) {
                foreach ($newQualificationsIds as $qualificationsId) {
                    Employee_qualifications::insert([
                        'employee_id' => $request->input('employee_id'),
                        'qualifications_id' => $qualificationsId,
                    ]);
                }
            }


            $departments = $request->input('departments', []);
            Employee_department::whereNotIn('department_id', $departments)
                ->where('employee_id', $request->input('employee_id'))
                ->where('delete_flg', 0)
                ->update(['delete_flg' => 1]);

            $existingRecords = Employee_department::whereIn('department_id', $departments)->where('employee_id', $request->input('employee_id'))->where('delete_flg', 0)->get();

            $existingDepartmentIds = $existingRecords->pluck('department_id')->toArray();
            $newDepartmentIds = array_diff($departments, $existingDepartmentIds);
            if (!empty($newDepartmentIds)) {
                foreach ($newDepartmentIds as $departmentId) {
                    Employee_department::insert([
                        'department_id' => $departmentId,
                        'employee_id' => $request->input('employee_id')
                    ]);
                }
            }

            $employee_id = $request->input('employee_id');
            $company_id = $request->input('company_id');
            $icon_file = $request->file('icon_file');
            $icon_delete_flg = $request->input('icon_delete_flg');
            if ($company_id && $employee_id) {
                if ($icon_delete_flg === "1") {
                    $directory = 'photo/' . $company_id;

                    foreach (Storage::files($directory) as $file) {
                        $fileName = pathinfo($file, PATHINFO_FILENAME);
                        if ($fileName === $employee_id) {
                            Storage::delete($file);
                        }
                    }
                } elseif ($icon_file) {
                    $extension = $icon_file->getClientOriginalExtension();
                    $directory = 'photo/' . $company_id;
                    $filePath = $directory . '/' . $employee_id . '.' . $extension;

                    if (!Storage::exists($directory)) {
                        Storage::makeDirectory($directory);
                    }

                    foreach (Storage::files($directory) as $file) {
                        $fileName = pathinfo($file, PATHINFO_FILENAME);
                        if ($fileName === $employee_id) {
                            Storage::delete($file);
                        }
                    }

                    $icon_file->storeAs($filePath);
                }
            }

            DB::commit();
            $this->putSuccess();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);
            return back()->withErrors('エラー');
        }
        return redirect()->route('admin.labor');
    }

    private function data_dependent(array $requestData, $index, $employee_id)
    {
        $input_date1 = $requestData['de-birthday'][$index];
        if (!is_null($input_date1) && strtotime($input_date1) === false) {
            $formatted_de_birthday = Carbon::createFromFormat('Y年n月j日', $input_date1)->format('Y-m-d');
        } else {
            $formatted_de_birthday = $input_date1;
        }
        $input_date2 = $requestData['de-date_of_authorisation'][$index];
        if (!is_null($input_date2) && strtotime($input_date2) === false) {
            $formatted_de_date_of_authorisation = Carbon::createFromFormat('Y年n月j日', $input_date2)->format('Y-m-d');
        } else {
            $formatted_de_date_of_authorisation = $input_date2;
        }
        if (isset($requestData['de-date_of_expiry'][$index])) {
            $input_date3 = $requestData['de-date_of_expiry'][$index];
            if (!is_null($input_date3) && strtotime($input_date3) === false) {
                $formatted_de_date_of_expiry = Carbon::createFromFormat('Y年n月j日', $input_date3)->format('Y-m-d');
            } else {
                $formatted_de_date_of_expiry = $input_date3;
            }
        }

        return [
            'employee_id' => $employee_id,
            'relationship_spouse' => $requestData['de-relationship_spouse'][$index] ?? null,
            'relationship_dependent' => $requestData['de-relationship_dependent'][$index] ?? null,
            'spouse_flag' => $requestData['de-spouse_flag'][$index] ?? null,
            'dependent_type' => $requestData['de-dependent_type'][$index] ?? null,
            'last_name' => $requestData['de-last_name'][$index],
            'first_name' => $requestData['de-first_name'][$index],
            'last_name_kana' => $requestData['de-last_name_kana'][$index],
            'first_name_kana' => $requestData['de-first_name_kana'][$index],
            'sex' => $requestData['de-sex'][$index],
            'occupation' => $requestData['de-occupation'][$index],
            'annual_income' => $requestData['de-annual_income'][$index],
            'contact' => $requestData['de-contact'][$index],
            'mynumber_card_no' => $requestData['de-mynumber_card_no'][$index],
            'pension_no' => $requestData['de-pension_no'][$index],
            'history_flg' => $requestData['de-history_flg'][$index] ?? 0,
            'birthday' => $formatted_de_birthday,
            'date_of_authorisation' => $formatted_de_date_of_authorisation,
            'date_of_expiry' => $formatted_de_date_of_expiry ?? null,
            'insurer_no' => $requestData['de-insurer_no'][$index],
            'remarks' => $requestData['de-remarks'][$index],
            'living_type' => $requestData['de-living_type'][$index] ?? 0,
            'post_code' => $requestData['de-post_code'][$index],
            'address_prefecture' => $requestData['de-address_prefecture'][$index],
            'address_city' => $requestData['de-address_city'][$index],
            'address_ward' => $requestData['de-address_ward'][$index],
            'address_apartment' => $requestData['de-address_apartment'][$index],
            'insurance_office_no' => $requestData['de-insurance_office_no'][$index],
        ];
    }

    public function get_departments(Request $request)
    {

        $departments = Department::where('company_id', $request->company_id)->where('delete_flg', 0)->get(['id', 'name']);

        return response()->json($departments);
    }

    public function get_position(Request $request)
    {

        $managerial_position = Managerial_position::where('company_id', $request->company_id)->where('delete_flg', 0)->get(['id', 'name']);

        return response()->json($managerial_position);
    }

    public function get_industry_type(Request $request)
    {

        $industry_type = Industry_type::get(['id', 'industry_type_code']);

        return response()->json($industry_type);
    }

    public function get_qualifications(Request $request)
    {
        $qualifications = Qualifications::select('id', 'qualification_name')->where('company_id', $request->company_id)->where('delete_flg', 0)->get();

        return response()->json($qualifications);
    }

    // ---------------------------------------------------------------------------------------
    // 社労士顧客会社設定
    // ---------------------------------------------------------------------------------------

    public function client(Request $request, $id)
    {
        $employee = Employee::find($id);

        if (empty($employee)) {
            return redirect()->route('admin.labor');
        }

        $company = $employee->branch->company()->first();

        return view('admin.client', ['employee' => $employee, 'company' => $company]);
    }
}
