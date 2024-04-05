<?php

namespace App\Livewire;

use App\Models\Branch;
use App\Models\Country;
use App\Models\Company;
use App\Models\CurrentUser;
use App\Models\Dependent;
use App\Models\Employee;
use App\Models\Retirement_reason_age;
use App\Models\Retirement_reason_business_owner_suggestion;
use App\Models\Retirement_reason_contract_period_expired_except_eternal_hire;
use App\Models\Retirement_reason_contract_period_expired_eternal_hire;
use App\Models\Retirement_reason_contract_period_reached_limit;
use App\Models\Retirement_reason_employee_decision_change_job_type;
use App\Models\Retirement_reason_employee_decision_change_office;
use App\Models\Retirement_reason_employee_decision_reasons;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

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
            $condition = $condition->where(DB::raw("CONCAT(last_name, first_name)"), 'LIKE', $pat);
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

        $employee_id = $employeeData['id'];
        $retirement_reason_age_data = Retirement_reason_age::where('employee_id', $employee_id)->first();
        $retirement_reason_contract_period_reached_limit_data = Retirement_reason_contract_period_reached_limit::where('employee_id', $employee_id)->first();
        $retirement_reason_contract_period_expired_eternal_hire_data = Retirement_reason_contract_period_expired_eternal_hire::where('employee_id', $employee_id)->first();
        $retirement_reason_contract_period_expired_except_eternal_hire_data = Retirement_reason_contract_period_expired_except_eternal_hire::where('employee_id', $employee_id)->first();
        $retirement_reason_business_owner_suggestion_data = Retirement_reason_business_owner_suggestion::where('employee_id', $employee_id)->first();
        $retirement_reason_employee_decision_change_office_data = Retirement_reason_employee_decision_change_office::where('employee_id', $employee_id)->first();
        $retirement_reason_employee_decision_change_job_type_data = Retirement_reason_employee_decision_change_job_type::where('employee_id', $employee_id)->first();
        $retirement_reason_employee_decision_reasons_data = Retirement_reason_employee_decision_reasons::where('employee_id', $employee_id)->first();
        $spouse_data = Dependent::where('employee_id', $employee_id)->where('relationship', '1')->first();
        if ($spouse_data) {
            $spouse_country_id = $spouse_data['country_id'];
            if ($spouse_country_id) {
                $spouse_data['country_name'] = Country::where('id', $spouse_country_id)->value('country_name');
            }
        }

        $output = [
            'employee' => $employeeData,
            'branch' => $branchData,
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
        ];

        $this->selected_id = $id;
        $this->dispatch('onSelectEmployee', data: $output);
    }
}
