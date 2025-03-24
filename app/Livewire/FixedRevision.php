<?php

namespace App\Livewire;

use App\Models\Salary_revision;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Livewire\Attributes\On;

class FixedRevision extends BaseTable
{
    public $company_id = 0;
    public $era;
    public $year = '';
    public $month = '';
    public $years = [];
    public $months = [];
    public $eraStartYears = [];
    public $items;

    public function mount($company_id, $era = '4')
    {
        $this->company_id = $company_id;
        $this->era = $era;
        $this->years = [];
        [$startYear, $endYear] = [2019, Carbon::now()->year];

        for ($y = $startYear; $y <= $endYear; $y++) {
            $eraYear = $y - $startYear + 1;
            $this->years[$eraYear] = "{$eraYear}年";
        }
    }
    public function render()
    {
        return view('livewire.fixed-revision');
    }

    public function updatedYear($value)
    {
        $this->month = '';
        $this->months = [];
        $this->items = [];

        $currentMonth = Carbon::now()->month;

        $maxMonth = 12;
        $minMonth = 1;

        if ($value == 1) {
            $minMonth = 4;
        } else {
            if ($value == array_key_last($this->years)) {
                $maxMonth = $currentMonth;
            }
            $minMonth = 1;
        }

        for ($m = $minMonth; $m <= $maxMonth; $m++) {
            $this->months[$m] = "{$m}月";
        }
    }

    public function updatedMonth($value)
    {
        $revisionDate = Controller::convertJapaneseCalendarToWesternCalendar($this->era, Carbon::create($this->year, $value, 1));
        $condition = Salary_revision::select([
            'm_salary_revision.id',
            'm_salary_revision.health_insurance',
            'm_salary_revision.welfare_annuity_insurance',
            'employee.last_name as employee_last_name',
            'employee.first_name as employee_first_name',
            'employee.employment_insured_no as employment_insured_no',
        ])
            ->leftJoin('m_employee as employee', 'm_salary_revision.employee_id', '=', 'employee.id')
            ->leftJoin('m_branch as branch', 'employee.branch_id', '=', 'branch.id')
            ->leftJoin('m_company as company', 'branch.company_id', '=', 'company.id')
            ->where('company.id', $this->company_id)
            ->where('m_salary_revision.revision_date', $revisionDate->format('Y-m-d'))
            ->where('m_salary_revision.fixed_flg', 0);
        $this->data = $this->getData($condition);
        $this->items = $this->data['items'];
        if ($this->items) {
            foreach ($this->items as &$item) {
                $item->health_insurance = number_format($item->health_insurance);
                $item->welfare_annuity_insurance = number_format($item->welfare_annuity_insurance);
            }
        }
    }
}
