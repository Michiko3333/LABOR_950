<?php

namespace App\Livewire;

use App\Models\Salary_revision_history;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Livewire\Component;

class RevisionHistoryModalContent extends Component
{
    public $employee_id;
    public $items;
    protected $listeners = ['revisionHistoryModalOpened'];

    public function revisionHistoryModalOpened($employee_id)
    {
        $this->employee_id = $employee_id;
    }

    public function render()
    {
        $condition = Salary_revision_history::select([
            'm_salary_revision_history.monthly_standard_salary',
            'm_salary_revision_history.health_insurance',
            'm_salary_revision_history.welfare_annuity_insurance',
            'm_salary_revision_history.revision_date',
            'm_salary_revision_history.created_at',
            'employee.last_name as employee_last_name',
            'employee.first_name as employee_first_name',
        ])
            ->leftJoin('m_employee as employee', 'm_salary_revision_history.employee_id', '=', 'employee.id')
            ->where('employee.id', $this->employee_id)
            ->orderBy('m_salary_revision_history.created_at', 'desc');
        $this->items = $condition->get();;
        if ($this->items) {
            foreach ($this->items as &$item) {
                $item->monthly_standard_salary = number_format($item->monthly_standard_salary);
                $item->health_insurance = number_format($item->health_insurance);
                $item->welfare_annuity_insurance = number_format($item->welfare_annuity_insurance);
                $item->revision_date = Controller::convertWesternCalendarToJapaneseCalendar(Carbon::parse($item->revision_date));
                $item->year = intval(Carbon::parse($item->revision_date['japanese_calendar_result'])->format('Y'));
                $item->month = intval(Carbon::parse($item->revision_date['japanese_calendar_result'])->format('n'));
            }
        }
        return view('livewire.revision-history-modal-content');
    }
}
