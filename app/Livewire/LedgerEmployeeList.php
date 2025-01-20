<?php

namespace App\Livewire;

use App\Models\Branch;
use App\Models\Country;
use App\Models\Company;
use App\Models\CurrentUser;
use App\Models\Dependent;
use App\Models\Employee;
use App\Models\Salary;
use App\Models\Residential_status;
use App\Models\Retirement_reason_age;
use App\Models\Retirement_reason_business_owner_suggestion;
use App\Models\Retirement_reason_contract_period_expired_except_eternal_hire;
use App\Models\Retirement_reason_contract_period_expired_eternal_hire;
use App\Models\Retirement_reason_contract_period_reached_limit;
use App\Models\Retirement_reason_employee_decision_change_job_type;
use App\Models\Retirement_reason_employee_decision_change_office;
use App\Models\Retirement_reason_employee_decision_reasons;
use App\Http\Controllers\Controller;
use App\Models\Closure_information;
use App\Models\Hello_work;
use App\Models\Prefecture;
use Carbon\Carbon;
use App\Models\Values_employee_insured_age_type;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class LedgerEmployeeList extends BaseTable
{
    public $search = '';
    public $branch_id = null;
    public $branch_list = [];

    public $total = 0;
    public $limit = 5;

    public $disablePrev = false;
    public $disableNext = false;

    public $selected_id = 0;

    public function render()
    {
        $currentCompany = CurrentUser::currentCompany();
        $company_id = $currentCompany->id;
        $branch_ids = Branch::where('company_id', $company_id)->where('delete_flg', 0)->pluck('name', 'id')->toArray();
        $this->branch_list = $branch_ids;

        $condition = Employee::whereIn('branch_id', array_keys($branch_ids))->where('delete_flg', 0);
        if (!empty($this->search)) {
            $pat = '%' . addcslashes($this->search, '%_\\') . '%';
            $condition = $condition->where(DB::raw("CONCAT(last_name, ' ', first_name)"), 'LIKE', $pat);
        }

        if (!empty($this->branch_id)) {
            $condition = $condition->where('branch_id', $this->branch_id);
        }

        $condition = $condition->with('branch');
        $this->data = $this->getData($condition);

        $this->total = $this->data['pagination']['totalItems'];
        $this->disablePrev = $this->page <= 1;
        $this->disableNext = $this->page >= ceil($this->total / $this->limit);

        return view('livewire.ledger-employee-list');
    }

    public function selectEmployee($id)
    {
        $this->paginated = true;
        $items = $this->data['items'];
        $employee = $items->where('id', $id)->first();

        $employeeData = $employee->toArray();
        $branchData = $employee->branch->toArray();
        $companyId = $branchData['company_id'];
        $headquarters  = Branch::select('post_code', 'address_prefecture', 'address_city', 'address_ward', 'address_apartment', 'name', 'tel_area_code', 'tel_city_code', 'tel_subscriber_code', 'pension_office_no', 'pension_office_reference_prefecture', 'pension_office_reference_no_cities', 'pension_office_reference_no_office')
            ->where('company_id', $companyId)
            ->where('branch_type', 1)
            ->first();
        $company = Company::where('id', $companyId)->first();
        $headquartersData = $headquarters->toArray();
        $companyData = $company->toArray();
        $branchId = $branchData['id'];
        $employee_id = $employeeData['id'];
        $employee_prefecture_id = $employeeData['address_prefecture'];
        $employee_insured_age_type = $employeeData['insured_age_type'];
        $employee_prefecture_data = Prefecture::where('id', $employee_prefecture_id)->first();
        $branch_prefecture_id = $branchData['address_prefecture'];
        $branch_prefecture_data = Prefecture::where('id', $branch_prefecture_id)->first();
        $hello_work_id = $branchData['hello_work_id'];
        $helloWork = Hello_work::where('id', $hello_work_id)->first();
        $helloWorkName = $helloWork ? $helloWork->name : '';
        $headquarters_prefecture_id = $headquartersData['address_prefecture'];
        $headquarters_prefecture_data = Prefecture::where('id', $headquarters_prefecture_id)->first();
        $retirement_reason_age_data = Retirement_reason_age::where('employee_id', $employee_id)->first();
        $retirement_reason_contract_period_reached_limit_data = Retirement_reason_contract_period_reached_limit::where('employee_id', $employee_id)->first();
        $retirement_reason_contract_period_expired_eternal_hire_data = Retirement_reason_contract_period_expired_eternal_hire::where('employee_id', $employee_id)->first();
        $retirement_reason_contract_period_expired_except_eternal_hire_data = Retirement_reason_contract_period_expired_except_eternal_hire::where('employee_id', $employee_id)->first();
        $retirement_reason_business_owner_suggestion_data = Retirement_reason_business_owner_suggestion::where('employee_id', $employee_id)->first();
        $retirement_reason_employee_decision_change_office_data = Retirement_reason_employee_decision_change_office::where('employee_id', $employee_id)->first();
        $retirement_reason_employee_decision_change_job_type_data = Retirement_reason_employee_decision_change_job_type::where('employee_id', $employee_id)->first();
        $retirement_reason_employee_decision_reasons_data = Retirement_reason_employee_decision_reasons::where('employee_id', $employee_id)->first();
        $spouse_data = Dependent::where('employee_id', $employee_id)->where('spouse_flag', '1')->where('delete_flg', '0')->first();

        if ($spouse_data) {
            $spouse_prefecture_id = $spouse_data['address_prefecture'];
            $spouse_prefecture_data = Prefecture::where('id', $spouse_prefecture_id)->first();
            $spouse_country_id = $spouse_data['country_id'];
            if ($spouse_country_id) {
                $spouse_data['country_name'] = Country::where('id', $spouse_country_id)->value('country_name');
            }
            $spouse_data['country_name'] = $spouse_prefecture_data['name'] ?? null;
        }
        if (!empty($spouse_data->birthday)) {
            $spouse_birthday = Carbon::parse($spouse_data->birthday);
            $spouse_birthday_convert_japan = Controller::convertWesternCalendarToJapaneseCalendar($spouse_birthday);
            $spouse_birthday_convert_japan = [
                'era' => $spouse_birthday_convert_japan['japanese_calendar_era_string'],
                'year' => $spouse_birthday_convert_japan['japanese_calendar_result']->year,
                'month' => $spouse_birthday_convert_japan['japanese_calendar_result']->month,
                'day' => $spouse_birthday_convert_japan['japanese_calendar_result']->day,
            ];
        }
        $country_id = Employee::where('id', $id)->value('country_id');
        if (!empty($country_id)) {
            $country_value = Country::where('id', $country_id)->value('setting_value');
        }
        $residential_status_id = Employee::where('id', $id)->value('residential_status_id');
        if (!empty($residential_status_id)) {
            $residential_status_value = Residential_status::where('id', $residential_status_id)->value('setting_value');
        }
        if (!empty($employee->birthday)) {
            $birthday = Carbon::parse($employee->birthday);
            $birthday_convert_japan = Controller::convertWesternCalendarToJapaneseCalendar($birthday);
            $sixty_years_old_date = $birthday->copy()->addYears(60);
            $day_after_sixty_years_old = $sixty_years_old_date->copy()->addDay();
            $sixty_convert_japan = Controller::convertWesternCalendarToJapaneseCalendar($sixty_years_old_date);
            $sixty_convert_japan = [
                'era' => $sixty_convert_japan['japanese_calendar_era_string'],
                'year' => $sixty_convert_japan['japanese_calendar_result']->year,
                'month' => $sixty_convert_japan['japanese_calendar_result']->month,
                'day' => $sixty_convert_japan['japanese_calendar_result']->day,
            ];
            $day_after_sixty_convert_japan = Controller::convertWesternCalendarToJapaneseCalendar($day_after_sixty_years_old);
            $day_after_sixty_convert_japan = [
                'era' => $day_after_sixty_convert_japan['japanese_calendar_era_string'],
                'year' => $day_after_sixty_convert_japan['japanese_calendar_result']->year,
                'month' => $day_after_sixty_convert_japan['japanese_calendar_result']->month,
                'day' => $day_after_sixty_convert_japan['japanese_calendar_result']->day,
            ];
            $birthday_convert_japan = [
                'era' => $birthday_convert_japan['japanese_calendar_era_string'],
                'year' => $birthday_convert_japan['japanese_calendar_result']->year,
                'month' => $birthday_convert_japan['japanese_calendar_result']->month,
                'day' => $birthday_convert_japan['japanese_calendar_result']->day,
            ];
        }
        if (!empty($employee->employment_insured_date)) {
            $employment_insured_date = Carbon::parse($employee->employment_insured_date);
            $employment_insured_convert_date = Controller::convertWesternCalendarToJapaneseCalendar($employment_insured_date);
            $employment_insured_convert_date = [
                'era' => $employment_insured_convert_date['japanese_calendar_era_string'],
                'year' => $employment_insured_convert_date['japanese_calendar_result']->year,
                'month' => $employment_insured_convert_date['japanese_calendar_result']->month,
                'day' => $employment_insured_convert_date['japanese_calendar_result']->day,
            ];
        }
        if (!empty($employee->retirement_date)) {
            $employment_retirement_date = Carbon::parse($employee->retirement_date);
            $employment_retirement_convert_date = Controller::convertWesternCalendarToJapaneseCalendar($employment_retirement_date);
            $employment_retirement_convert_date = [
                'era' => $employment_retirement_convert_date['japanese_calendar_era_string'],
                'year' => $employment_retirement_convert_date['japanese_calendar_result']->year,
                'month' => $employment_retirement_convert_date['japanese_calendar_result']->month,
                'day' => $employment_retirement_convert_date['japanese_calendar_result']->day,
            ];
        }
        if (!empty($employee->insurance_loss_date)) {
            $insurance_loss_date = Carbon::parse($employee->insurance_loss_date);
            $insurance_loss_convert_date = Controller::convertWesternCalendarToJapaneseCalendar($insurance_loss_date);
            $insurance_loss_convert_date = [
                'era' => $insurance_loss_convert_date['japanese_calendar_era_string'],
                'year' => $insurance_loss_convert_date['japanese_calendar_result']->year,
                'month' => $insurance_loss_convert_date['japanese_calendar_result']->month,
                'day' => $insurance_loss_convert_date['japanese_calendar_result']->day,
            ];
        }
        if (!empty($employee->over_70_non_applicable_date)) {
            $over_70_non_applicable_date = Carbon::parse($employee->over_70_non_applicable_date);
            $over_70_non_applicable_convert_date = Controller::convertWesternCalendarToJapaneseCalendar($over_70_non_applicable_date);
            $over_70_non_applicable_convert_date = [
                'era' => $over_70_non_applicable_convert_date['japanese_calendar_era_string'],
                'year' => $over_70_non_applicable_convert_date['japanese_calendar_result']->year,
                'month' => $over_70_non_applicable_convert_date['japanese_calendar_result']->month,
                'day' => $over_70_non_applicable_convert_date['japanese_calendar_result']->day,
            ];
        }
        if (!empty($employee_insured_age_type)) {
            $insured_age_type_data = Values_employee_insured_age_type::where('id', $employee_insured_age_type)->value('name');
        }
        if (!empty($employee->contract_start_date)) {
            $contract_start_date = Carbon::parse($employee->contract_start_date);
            $contract_start_convert_date = Controller::convertWesternCalendarToJapaneseCalendar($contract_start_date);
            $contract_start_convert_date = [
                'era' => $contract_start_convert_date['japanese_calendar_era_string'],
                'year' => $contract_start_convert_date['japanese_calendar_result']->year,
                'month' => $contract_start_convert_date['japanese_calendar_result']->month,
                'day' => $contract_start_convert_date['japanese_calendar_result']->day,
            ];
        }
        if (!empty($employee->contract_end_date)) {
            $contract_end_date = Carbon::parse($employee->contract_end_date);
            $contract_end_convert_date = Controller::convertWesternCalendarToJapaneseCalendar($contract_end_date);
            $contract_end_convert_date = [
                'era' => $contract_end_convert_date['japanese_calendar_era_string'],
                'year' => $contract_end_convert_date['japanese_calendar_result']->year,
                'month' => $contract_end_convert_date['japanese_calendar_result']->month,
                'day' => $contract_end_convert_date['japanese_calendar_result']->day,
            ];
        }
        if (!empty($employee->retirement_date)) {
            $loss_date = Carbon::parse($employee->retirement_date)->addDay();
            $loss_convert_date = Controller::convertWesternCalendarToJapaneseCalendar($loss_date);
            $loss_convert_date = [
                'era' => $loss_convert_date['japanese_calendar_era_string'],
                'year' => $loss_convert_date['japanese_calendar_result']->year,
                'month' => $loss_convert_date['japanese_calendar_result']->month,
                'day' => $loss_convert_date['japanese_calendar_result']->day,
            ];
        }
        if (!empty($spouse_data->date_of_authorisation)) {
            $date_of_authorisation = Carbon::parse($spouse_data->date_of_authorisation);
            $date_of_authorisation_convert = Controller::convertWesternCalendarToJapaneseCalendar($date_of_authorisation);
            $date_of_authorisation_convert = [
                'era' => $date_of_authorisation_convert['japanese_calendar_era_string'],
                'year' => $date_of_authorisation_convert['japanese_calendar_result']->year,
                'month' => $date_of_authorisation_convert['japanese_calendar_result']->month,
                'day' => $date_of_authorisation_convert['japanese_calendar_result']->day,
            ];
        }
        if (!empty($spouse_data->date_of_expiry)) {
            $date_of_expiry = Carbon::parse($spouse_data->date_of_expiry);
            $date_of_expiry_convert = Controller::convertWesternCalendarToJapaneseCalendar($date_of_expiry);
            $date_of_expiry_convert = [
                'era' => $date_of_expiry_convert['japanese_calendar_era_string'],
                'year' => $date_of_expiry_convert['japanese_calendar_result']->year,
                'month' => $date_of_expiry_convert['japanese_calendar_result']->month,
                'day' => $date_of_expiry_convert['japanese_calendar_result']->day,
            ];
        }
        $closure_1_data_4950008680182000 = Closure_information::where('employee_id', $employee_id)->where('closure_type', '1')->where('delete_flg', '0')
            ->get()->filter(function ($item) {
                $start_date_of_closed = Carbon::parse($item->start_date_of_closed);
                return Carbon::today()->lessThan($start_date_of_closed);
            })->sortByDesc('created_at')->first();
        $closure_1_data_4950008680050000 = Closure_information::where('employee_id', $employee_id)->where('closure_type', '1')->where('delete_flg', '0')
            ->get()->filter(function ($item) {
                $start_date_of_closed = Carbon::parse($item->start_date_of_closed);
                return Carbon::today()->lessThan($start_date_of_closed);
            })->sortByDesc('created_at')->first();
        $closure_2_data = Closure_information::where('employee_id', $employee_id)->where('closure_type', '2')->where('delete_flg', '0')
            ->get()->filter(function ($item) {
                $end_date_of_losed = Carbon::parse($item->end_date_of_losed);
                return Carbon::today()->lessThan($end_date_of_losed);
            })->sortByDesc('created_at')->first();
        if (!empty($closure_1_data_4950008680182000->start_date_of_closed)) {
            $start_date_of_closed_4950008680182000 = Carbon::parse($closure_1_data_4950008680182000->start_date_of_closed);
            $start_date_of_closed_4950008680182000 = Controller::convertWesternCalendarToJapaneseCalendar($start_date_of_closed_4950008680182000);
            $start_date_of_closed_4950008680182000 = [
                'era' => $start_date_of_closed_4950008680182000['japanese_calendar_era_string'],
                'year' => $start_date_of_closed_4950008680182000['japanese_calendar_result']->year,
                'month' => $start_date_of_closed_4950008680182000['japanese_calendar_result']->month,
                'day' => $start_date_of_closed_4950008680182000['japanese_calendar_result']->day,
            ];
        }
        if (!empty($closure_1_data_4950008680182000->date_of_return_to_work)) {
            $date_of_return_to_work_4950008680182000 = Carbon::parse($closure_1_data_4950008680182000->date_of_return_to_work);
            $date_of_return_to_work_4950008680182000 = Controller::convertWesternCalendarToJapaneseCalendar($date_of_return_to_work_4950008680182000);
            $date_of_return_to_work_4950008680182000 = [
                'era' => $date_of_return_to_work_4950008680182000['japanese_calendar_era_string'],
                'year' => $date_of_return_to_work_4950008680182000['japanese_calendar_result']->year,
                'month' => $date_of_return_to_work_4950008680182000['japanese_calendar_result']->month,
                'day' => $date_of_return_to_work_4950008680182000['japanese_calendar_result']->day,
            ];
        }
        if (!empty($closure_1_data_4950008680182000->date_of_return_to_work)) {
            $before_date_of_return_to_work_4950008680182000 = Carbon::parse($closure_1_data_4950008680182000->date_of_return_to_work)->subDay();
            $before_date_of_return_to_work_4950008680182000 = Controller::convertWesternCalendarToJapaneseCalendar($before_date_of_return_to_work_4950008680182000);
            $before_date_of_return_to_work_4950008680182000 = [
                'era' => $before_date_of_return_to_work_4950008680182000['japanese_calendar_era_string'],
                'year' => $before_date_of_return_to_work_4950008680182000['japanese_calendar_result']->year,
                'month' => $before_date_of_return_to_work_4950008680182000['japanese_calendar_result']->month,
                'day' => $before_date_of_return_to_work_4950008680182000['japanese_calendar_result']->day,
            ];
        }
        if (!empty($closure_1_data_4950008680182000->date_of_birth)) {
            $date_of_birth_4950008680182000 = Carbon::parse($closure_1_data_4950008680182000->date_of_birth);
            $date_of_birth_4950008680182000 = Controller::convertWesternCalendarToJapaneseCalendar($date_of_birth_4950008680182000);
            $date_of_birth_4950008680182000 = [
                'era' => $date_of_birth_4950008680182000['japanese_calendar_era_string'],
                'year' => $date_of_birth_4950008680182000['japanese_calendar_result']->year,
                'month' => $date_of_birth_4950008680182000['japanese_calendar_result']->month,
                'day' => $date_of_birth_4950008680182000['japanese_calendar_result']->day,
            ];
        }
        if (!empty($closure_1_data_4950008680182000->due_date)) {
            $due_date_4950008680182000 = Carbon::parse($closure_1_data_4950008680182000->due_date);
            $due_date_4950008680182000 = Controller::convertWesternCalendarToJapaneseCalendar($due_date_4950008680182000);
            $due_date_4950008680182000 = [
                'era' => $due_date_4950008680182000['japanese_calendar_era_string'],
                'year' => $due_date_4950008680182000['japanese_calendar_result']->year,
                'month' => $due_date_4950008680182000['japanese_calendar_result']->month,
                'day' => $due_date_4950008680182000['japanese_calendar_result']->day,
            ];
        }
        if (!empty($closure_1_data_4950008680050000->start_date_of_closed)) {
            $start_date_of_closed_4950008680050000 = Carbon::parse($closure_1_data_4950008680050000->start_date_of_closed);
            $start_date_of_closed_4950008680050000 = Controller::convertWesternCalendarToJapaneseCalendar($start_date_of_closed_4950008680050000);
            $start_date_of_closed_4950008680050000 = [
                'era' => $start_date_of_closed_4950008680050000['japanese_calendar_era_string'],
                'year' => $start_date_of_closed_4950008680050000['japanese_calendar_result']->year,
                'month' => $start_date_of_closed_4950008680050000['japanese_calendar_result']->month,
                'day' => $start_date_of_closed_4950008680050000['japanese_calendar_result']->day,
            ];
        }
        if (!empty($closure_1_data_4950008680050000->date_of_return_to_work)) {
            $date_of_return_to_work_4950008680050000 = Carbon::parse($closure_1_data_4950008680050000->date_of_return_to_work);
            $date_of_return_to_work_4950008680050000 = Controller::convertWesternCalendarToJapaneseCalendar($date_of_return_to_work_4950008680050000);
            $date_of_return_to_work_4950008680050000 = [
                'era' => $date_of_return_to_work_4950008680050000['japanese_calendar_era_string'],
                'year' => $date_of_return_to_work_4950008680050000['japanese_calendar_result']->year,
                'month' => $date_of_return_to_work_4950008680050000['japanese_calendar_result']->month,
                'day' => $date_of_return_to_work_4950008680050000['japanese_calendar_result']->day,
            ];
        }
        if (!empty($closure_1_data_4950008680050000->date_of_return_to_work)) {
            $before_date_of_return_to_work_4950008680050000 = Carbon::parse($closure_1_data_4950008680050000->date_of_return_to_work)->subDay();
            $before_date_of_return_to_work_4950008680050000 = Controller::convertWesternCalendarToJapaneseCalendar($before_date_of_return_to_work_4950008680050000);
            $before_date_of_return_to_work_4950008680050000 = [
                'era' => $before_date_of_return_to_work_4950008680050000['japanese_calendar_era_string'],
                'year' => $before_date_of_return_to_work_4950008680050000['japanese_calendar_result']->year,
                'month' => $before_date_of_return_to_work_4950008680050000['japanese_calendar_result']->month,
                'day' => $before_date_of_return_to_work_4950008680050000['japanese_calendar_result']->day,
            ];
        }
        if (!empty($closure_1_data_4950008680050000->date_of_birth)) {
            $date_of_birth_4950008680050000 = Carbon::parse($closure_1_data_4950008680050000->date_of_birth);
            $date_of_birth_4950008680050000 = Controller::convertWesternCalendarToJapaneseCalendar($date_of_birth_4950008680050000);
            $date_of_birth_4950008680050000 = [
                'era' => $date_of_birth_4950008680050000['japanese_calendar_era_string'],
                'year' => $date_of_birth_4950008680050000['japanese_calendar_result']->year,
                'month' => $date_of_birth_4950008680050000['japanese_calendar_result']->month,
                'day' => $date_of_birth_4950008680050000['japanese_calendar_result']->day,
            ];
        }
        if (!empty($closure_2_data->start_date_of_closed)) {
            $start_date_of_closed = Carbon::parse($closure_2_data->start_date_of_closed);
            $start_date_of_closed = Controller::convertWesternCalendarToJapaneseCalendar($start_date_of_closed);
            $start_date_of_closed = [
                'era' => $start_date_of_closed['japanese_calendar_era_string'],
                'year' => $start_date_of_closed['japanese_calendar_result']->year,
                'month' => $start_date_of_closed['japanese_calendar_result']->month,
                'day' => $start_date_of_closed['japanese_calendar_result']->day,
            ];
        }
        if (!empty($closure_2_data->end_date_of_losed)) {
            $end_date_of_losed = Carbon::parse($closure_2_data->end_date_of_losed);
            $end_date_of_losed = Controller::convertWesternCalendarToJapaneseCalendar($end_date_of_losed);
            $end_date_of_losed = [
                'era' => $end_date_of_losed['japanese_calendar_era_string'],
                'year' => $end_date_of_losed['japanese_calendar_result']->year,
                'month' => $end_date_of_losed['japanese_calendar_result']->month,
                'day' => $end_date_of_losed['japanese_calendar_result']->day,
            ];
        }

        $output = [
            'employee' => $employeeData,
            'branch' => $branchData,
            'hello_work' => $helloWorkName,
            'headquarters' => $headquartersData,
            'company' => $companyData,
            'spouse' => $spouse_data,
            'retirement_reason_age' => $retirement_reason_age_data,
            'retirement_reason_contract_period_reached_limit' => $retirement_reason_contract_period_reached_limit_data,
            'retirement_reason_contract_period_expired_eternal_hire' => $retirement_reason_contract_period_expired_eternal_hire_data,
            'retirement_reason_contract_period_expired_except_eternal_hire' => $retirement_reason_contract_period_expired_except_eternal_hire_data,
            'retirement_reason_business_owner_suggestion' => $retirement_reason_business_owner_suggestion_data,
            'retirement_reason_employee_decision_change_job_type' => $retirement_reason_employee_decision_change_job_type_data,
            'retirement_reason_employee_decision_change_office' => $retirement_reason_employee_decision_change_office_data,
            'retirement_reason_employee_decision_reasons' => $retirement_reason_employee_decision_reasons_data,
            'country_value' => $country_value ?? '',
            'residential_status_value' => $residential_status_value ?? '',
            'birthday_convert_japan' => $birthday_convert_japan ?? '',
            'sixty_convert_japan' => $sixty_convert_japan ?? '',
            'day_after_sixty_convert_japan' => $day_after_sixty_convert_japan ?? '',
            'employment_insured_convert_date' => $employment_insured_convert_date ?? '',
            'employment_retirement_convert_date' => $employment_retirement_convert_date ?? '',
            'passed_away_convert_date' => $passed_away_convert_date ?? '',
            'spouse_birthday_convert_japan' => $spouse_birthday_convert_japan ?? '',
            'employee_prefecture_data' => $employee_prefecture_data ?? '',
            'branch_prefecture_data' => $branch_prefecture_data ?? '',
            'headquarters_prefecture_data' => $headquarters_prefecture_data ?? '',
            'spouse_prefecture_data' => $spouse_prefecture_data ?? '',
            'insurance_loss_convert_date' => $insurance_loss_convert_date ?? '',
            'over_70_non_applicable_convert_date' => $over_70_non_applicable_convert_date ?? '',
            'insured_age_type_data' => $insured_age_type_data ?? '',
            'contract_start_convert_date' => $contract_start_convert_date ?? '',
            'contract_end_convert_date' => $contract_end_convert_date ?? '',
            'date_of_authorisation_convert' => $date_of_authorisation_convert ?? '',
            'date_of_expiry_convert' => $date_of_expiry_convert ?? '',
            'loss_convert_date' => $loss_convert_date ?? '',
            'start_date_of_closed_4950008680182000' => $start_date_of_closed_4950008680182000 ?? '',
            'date_of_return_to_work_4950008680182000' => $date_of_return_to_work_4950008680182000 ?? '',
            'date_of_birth_4950008680182000' => $date_of_birth_4950008680182000 ?? '',
            'due_date_4950008680182000' => $due_date_4950008680182000 ?? '',
            'before_date_of_return_to_work_4950008680182000' => $before_date_of_return_to_work_4950008680182000 ?? '',
            'start_date_of_closed_4950008680050000' => $start_date_of_closed_4950008680050000 ?? '',
            'date_of_return_to_work_4950008680050000' => $date_of_return_to_work_4950008680050000 ?? '',
            'date_of_birth_4950008680050000' => $date_of_birth_4950008680050000 ?? '',
            'before_date_of_return_to_work_4950008680050000' => $before_date_of_return_to_work_4950008680050000 ?? '',
            'start_date_of_closed' => $start_date_of_closed ?? '',
            'end_date_of_losed' => $end_date_of_losed ?? '',
        ];

        $this->selected_id = $id;
        $this->dispatch('onSelectEmployee', data: $output);
    }

    #[On('setDefault')]
    public function setDefault($employee_id, $employee_name)
    {
        if ($employee_id) {
            $this->search = $employee_name;
            $this->selected_id = $employee_id;
        }
    }
}
