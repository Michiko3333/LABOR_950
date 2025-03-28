<?php

namespace App\Livewire;

use App\Http\Controllers\Controller;
use App\Models\Salary_revision;
use Carbon\Carbon;

class HistoryRevision extends BaseTable
{
    public $company_id = 0;
    public $items;

    public function mount($company_id)
    {
        $this->company_id = $company_id;
    }
    public function render()
    {
        $condition = Salary_revision::select([
            'm_salary_revision.id',
            'm_salary_revision.monthly_standard_salary',
            'm_salary_revision.health_insurance',
            'm_salary_revision.welfare_annuity_insurance',
            'm_salary_revision.revision_date',
            'employee.last_name as employee_last_name',
            'employee.first_name as employee_first_name',
            'employee.id as employee_id',
        ])
        ->leftJoin('m_employee as employee', 'm_salary_revision.employee_id', '=', 'employee.id')
        ->leftJoin('m_branch as branch', 'employee.branch_id', '=', 'branch.id')
        ->leftJoin('m_company as company', 'branch.company_id', '=', 'company.id')
        ->where('company.id', $this->company_id)
        ->whereRaw('m_salary_revision.updated_at = (SELECT MAX(sr2.updated_at) FROM m_salary_revision sr2 WHERE sr2.employee_id = m_salary_revision.employee_id)');
        $this->data = $this->getData($condition);
        $this->items = $this->data['items'];
        if($this->items){
            foreach ($this->items as &$item) {
                $item->monthly_standard_salary = number_format($item->monthly_standard_salary);
                $item->health_insurance = number_format($item->health_insurance);
                $item->welfare_annuity_insurance = number_format($item->welfare_annuity_insurance);
                $item->revision_date = Controller::convertWesternCalendarToJapaneseCalendar(Carbon::parse($item->revision_date));
                $item->year = intval(Carbon::parse($item->revision_date['japanese_calendar_result'])->format('Y'));
                $item->month = intval(Carbon::parse($item->revision_date['japanese_calendar_result'])->format('n'));
            }
        }
        return view('livewire.history-revision');
    }
}
