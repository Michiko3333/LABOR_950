<?php

namespace App\Livewire;

use App\Models\Closure_information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Livewire\Component;

class ClosureList extends BaseTable
{
    public $branch;
    public $employee;
    public $closure;
    public $company_id;

    protected $listeners = ['detailModalOpened'];

    public function mount($company_id = null)
    {
        $this->company_id = $company_id;
    }

    public function render()
    {
        $condition = Closure_information::select([
            'm_closure_information.id',
            'm_closure_information.employee_id',
            'm_closure_information.closure_type',
            'm_closure_information.start_date_of_closed',
            'm_closure_information.end_date_of_losed',
            'm_closure_information.date_of_return_to_work',
            'm_closure_information.date_of_birth',
            'm_closure_information.date_of_start_of_foster_care',
            'm_closure_information.planned_end_date_of_child_support',
            'm_closure_information.end_date_of_foster_care',
            'm_closure_information.due_date',
            'm_closure_information.planned_end_date_of_closure',
            'm_closure_information.date_of_commencement_of_special_childcare_provision',
            'branch.name as branch_name',
            'employee.last_name as employee_last_name',
            'employee.first_name as employee_first_name',
            'employee.employee_no as employee_employee_no',
            'employee.employee_status as employee_employee_status',
        ])
        ->leftJoin('m_employee as employee', 'm_closure_information.employee_id', '=', 'employee.id')
        ->leftJoin('m_branch as branch', 'employee.branch_id', '=', 'branch.id')
        ->leftJoin('m_company as company', 'branch.company_id', '=', 'company.id')
        ->where('company.id', $this->company_id)
        ->where('m_closure_information.delete_flg', 0);
        $this->data = $this->getData($condition);
        $items = $this->data['items'];
        foreach ($items as &$item) {
            $directory = 'photo/' . $this->company_id;
            $files = Storage::files($directory);
            $filePath = '';
            foreach ($files as $file) {
                $fileName = pathinfo($file, PATHINFO_FILENAME);
                if ((int)$fileName === $item->employee_id) {
                    $filePath = '/' . $file . '?v=' . time();
                }
            }
            if (empty($filePath)) {
                $filePath = '/img/image.png';
            }
            $item->icon = $filePath;

            $item->start_date_of_closed = $item->start_date_of_closed ? Carbon::parse($item->start_date_of_closed)->format('Y年n月j日') : null;
            $item->end_date_of_losed = $item->end_date_of_losed ? Carbon::parse($item->end_date_of_losed)->format('Y年n月j日') : null;
            $item->date_of_return_to_work = $item->date_of_return_to_work ? Carbon::parse($item->date_of_return_to_work)->format('Y年n月j日') : null;
            $item->due_date = $item->due_date ? Carbon::parse($item->due_date)->format('Y年n月j日') : null;
            $item->planned_end_date_of_closure = $item->planned_end_date_of_closure ? Carbon::parse($item->planned_end_date_of_closure)->format('Y年n月j日') : null;
            $item->date_of_birth = $item->date_of_birth ? Carbon::parse($item->date_of_birth)->format('Y年n月j日') : null;
            $item->date_of_start_of_foster_care = $item->date_of_start_of_foster_care ? Carbon::parse($item->date_of_start_of_foster_care)->format('Y年n月j日') : null;
            $item->planned_end_date_of_child_support = $item->planned_end_date_of_child_support ? Carbon::parse($item->planned_end_date_of_child_support)->format('Y年n月j日') : null;
            $item->end_date_of_foster_care = $item->end_date_of_foster_care ? Carbon::parse($item->end_date_of_foster_care)->format('Y年n月j日') : null;
            $item->date_of_commencement_of_special_childcare_provision = $item->date_of_commencement_of_special_childcare_provision ? Carbon::parse($item->date_of_commencement_of_special_childcare_provision)->format('Y年n月j日') : null;
        }

        return view('livewire.closure-list');
    }

    public function detailModalOpened($id)
    {
        $this->closure = Closure_information::where('id',$id)->where('delete_flg', 0)->first();
        $this->employee = $this->closure->employee()->first();
        $this->branch = $this->employee->branch()->first();
        $directory = 'photo/' . $this->company_id;
        $files = Storage::files($directory);
        $filePath = '';
        foreach ($files as $file) {
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            if ((int)$fileName === $this->employee->id) {
                $filePath = '/' . $file . '?v=' . time();
            }
        }
        if (empty($filePath)) {
            $filePath = '/img/image.png';
        }
        $this->employee->icon = $filePath;
        $this->dispatch('closureDetailsShow', [
            'closure' =>$this->closure,
            'employee' =>$this->employee,
            'branch' =>$this->branch,
        ]);
    }
}
