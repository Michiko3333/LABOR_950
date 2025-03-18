<?php

namespace App\Livewire;

use App\Models\Closure_information;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Branch;
use App\Models\Employee;

class ClosureModalContent extends BaseTable
{
    public $closure_type;
    public $startDateOfClosed;
    public $endDateOfLosed;
    public $dateOfReturnToWork;
    public $dueDate;
    public $plannedEndDateOfClosure;
    public $dateOfBirth;
    public $dateOfStartOfFosterCare;
    public $plannedEndDateOfChildSupport;
    public $endDateOfFosterCare;
    public $dateOfCommencementOfSpecialChildcareProvision;
    public $formatStartDateOfClosed;
    public $formatEndDateOfLosed;
    public $formatDateOfReturnToWork;
    public $formatDueDate;
    public $formatPlannedEndDateOfClosure;
    public $formatDateOfBirth;
    public $formatDateOfStartOfFosterCare;
    public $formatPlannedEndDateOfChildSupport;
    public $formatEndDateOfFosterCare;
    public $formatDateOfCommencementOfSpecialChildcareProvision;
    public $employee_id;
    public $companyID;
    public $id;
    public $current_closure;
    public $search = '';
    public $branch_id = null;
    public $branch_list = [];

    public $total = 0;
    public $limit = 5;

    public $disablePrev = false;
    public $disableNext = false;

    protected $listeners = ['closureModalOpened', 'submitClosure', 'updateClosure', 'reloadClosureData'];

    public function mount($company_id)
    {
        $this->companyID = $company_id;
    }

    public function closureModalOpened($closure_type, $id)
    {
        $this->resetErrorBag();
        $this->resetForm();
        $this->closure_type = $closure_type;
        $this->id = $id;
        if ($id) {
            $current_closure = Closure_information::where('id', $this->id)->first();
            $current_closure->employee_last_name = $current_closure->employee->last_name;
            $current_closure->employee_first_name = $current_closure->employee->first_name;
            $current_closure->branch_name = $current_closure->employee->branch->name;
            $current_closure->employee_no = $current_closure->employee->employee_no;
            $current_closure->employee_status = $current_closure->employee->employee_status;
            $directory = 'photo/' . $this->companyID;
            $files = Storage::files($directory);
            $filePath = '';
            foreach ($files as $file) {
                $fileName = pathinfo($file, PATHINFO_FILENAME);
                if ((int)$fileName === $current_closure->employee_id) {
                    $filePath = '/' . $file . '?v=' . time();
                }
            }
            if (empty($filePath)) {
                $filePath = '/img/image.png';
            }
            $current_closure->icon = $filePath;

            if (empty($this->startDateOfClosed)) $this->startDateOfClosed = $current_closure->start_date_of_closed ?? null;
            if (empty($this->endDateOfLosed)) $this->endDateOfLosed = $current_closure->end_date_of_losed ?? null;
            if (empty($this->dateOfReturnToWork)) $this->dateOfReturnToWork = $current_closure->date_of_return_to_work ?? null;
            if (empty($this->dueDate)) $this->dueDate = $current_closure->due_date ?? null;
            if (empty($this->plannedEndDateOfClosure)) $this->plannedEndDateOfClosure = $current_closure->planned_end_date_of_closure ?? null;
            if (empty($this->dateOfBirth)) $this->dateOfBirth = $current_closure->date_of_birth ?? null;
            if (empty($this->dateOfStartOfFosterCare)) $this->dateOfStartOfFosterCare = $current_closure->date_of_start_of_foster_care ?? null;
            if (empty($this->plannedEndDateOfChildSupport)) $this->plannedEndDateOfChildSupport = $current_closure->planned_end_date_of_child_support ?? null;
            if (empty($this->endDateOfFosterCare)) $this->endDateOfFosterCare = $current_closure->end_date_of_foster_care ?? null;
            if (empty($this->dateOfCommencementOfSpecialChildcareProvision)) $this->dateOfCommencementOfSpecialChildcareProvision = $current_closure->date_of_commencement_of_special_childcare_provision ?? null;
            $this->current_closure = $current_closure;
        }
    }

    public function render()
    {
        $branch_ids = Branch::where('company_id', $this->companyID)->where('delete_flg', 0)->pluck('name', 'id')->toArray();
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
        $this->dispatch('closure-modal-render');
        return view('livewire.closure-modal-content');
    }

    public function selectEmployee($employee_id)
    {
        $this->employee_id = $employee_id;
    }

    public function submitClosure()
    {
        $this->formatStartDateOfClosed = $this->startDateOfClosed ? Carbon::createFromFormat('Y年n月j日', $this->startDateOfClosed)->format('Y-m-d') : null;
        $this->formatEndDateOfLosed = $this->endDateOfLosed ? Carbon::createFromFormat('Y年n月j日', $this->endDateOfLosed)->format('Y-m-d') : null;
        $this->formatDateOfReturnToWork = $this->dateOfReturnToWork ? Carbon::createFromFormat('Y年n月j日', $this->dateOfReturnToWork)->format('Y-m-d') : null;
        $this->formatDueDate = $this->dueDate ? Carbon::createFromFormat('Y年n月j日', $this->dueDate)->format('Y-m-d') : null;
        $this->formatPlannedEndDateOfClosure = $this->plannedEndDateOfClosure ? Carbon::createFromFormat('Y年n月j日', $this->plannedEndDateOfClosure)->format('Y-m-d') : null;
        $this->formatDateOfBirth = $this->dateOfBirth ? Carbon::createFromFormat('Y年n月j日', $this->dateOfBirth)->format('Y-m-d') : null;
        $this->formatDateOfStartOfFosterCare = $this->dateOfStartOfFosterCare ? Carbon::createFromFormat('Y年n月j日', $this->dateOfStartOfFosterCare)->format('Y-m-d') : null;
        $this->formatPlannedEndDateOfChildSupport = $this->plannedEndDateOfChildSupport ? Carbon::createFromFormat('Y年n月j日', $this->plannedEndDateOfChildSupport)->format('Y-m-d') : null;
        $this->formatEndDateOfFosterCare = $this->endDateOfFosterCare ? Carbon::createFromFormat('Y年n月j日', $this->endDateOfFosterCare)->format('Y-m-d') : null;
        $this->formatDateOfCommencementOfSpecialChildcareProvision = $this->dateOfCommencementOfSpecialChildcareProvision ? Carbon::createFromFormat('Y年n月j日', $this->dateOfCommencementOfSpecialChildcareProvision)->format('Y-m-d') : null;

        $rules = [
            'employee_id' => 'required',
            'formatStartDateOfClosed' => 'nullable|required_if:closure_type,1,2,3,4,6,7|date',
            'formatEndDateOfLosed' => 'nullable|date|after:formatStartDateOfClosed',
            'formatDateOfReturnToWork' => 'nullable|date|after:formatStartDateOfClosed|after:formatEndDateOfLosed',
            'formatDueDate' => 'nullable|date',
            'formatPlannedEndDateOfClosure' => 'nullable|date',
            'formatDateOfBirth' => 'nullable|date',
            'formatPlannedEndDateOfChildSupport' => 'nullable|date',
            'formatEndDateOfFosterCare' => 'nullable|date|after:formatDateOfStartOfFosterCare',
        ];
        if ($this->closure_type == "5") {
            $rules['formatDateOfCommencementOfSpecialChildcareProvision'] = 'nullable|required_without_all:formatDateOfStartOfFosterCare|date';
            $rules['formatDateOfStartOfFosterCare'] = 'nullable|required_without_all:formatDateOfCommencementOfSpecialChildcareProvision|date';
        }
        $this->validate($rules, [
            'employee_id.required' => '従業員を選択してください',
            'formatStartDateOfClosed.required_if' => '休業開始日は必須です',
            'formatStartDateOfClosed.date' => '休業開始日は有効な日付でなければなりません',
            'formatEndDateOfLosed.date' => '休業終了日は有効な日付でなければなりません',
            'formatEndDateOfLosed.after' => '休業終了日は休業開始日以降の日付でなければなりません',
            'formatDateOfReturnToWork.date' => '職場復帰日は有効な日付でなければなりません',
            'formatDateOfReturnToWork.after' => '職場復帰日は休業開始日また休業終了日以降の日付でなければなりません',
            'formatDueDate.date' => '出産予定日は有効な日付でなければなりません',
            'formatPlannedEndDateOfClosure.date' => '休業終了予定日は有効な日付でなければなりません',
            'formatDateOfBirth.date' => '出産日は有効な日付でなければなりません',
            'formatPlannedEndDateOfChildSupport.date' => '養育終了予定日は有効な日付でなければなりません',
            'formatDateOfCommencementOfSpecialChildcareProvision.required_without_all' => '養育特例開始日また養育開始日のいずれは必須です',
            'formatDateOfCommencementOfSpecialChildcareProvision.date' => '養育特例開始日は有効な日付でなければなりません',
            'formatDateOfStartOfFosterCare.required_without_all' => '養育開始日また養育特例開始日のいずれは必須です',
            'formatDateOfStartOfFosterCare.date' => '養育開始日は有効な日付でなければなりません',
            'formatEndDateOfFosterCare.date' => '養育終了日は有効な日付でなければなりません',
            'formatEndDateOfFosterCare.after' => '養育終了日は養育開始日以降の日付でなければなりません',
        ]);

        try {
            Closure_information::create([
                'employee_id' => $this->employee_id,
                'closure_type' => $this->closure_type,
                'start_date_of_closed' => $this->formatStartDateOfClosed,
                'end_date_of_losed' => $this->formatEndDateOfLosed,
                'date_of_return_to_work' => $this->formatDateOfReturnToWork,
                'due_date' => $this->formatDueDate,
                'planned_end_date_of_closure' => $this->formatPlannedEndDateOfClosure,
                'date_of_birth' => $this->formatDateOfBirth,
                'date_of_start_of_foster_care' => $this->formatDateOfStartOfFosterCare,
                'planned_end_date_of_child_support' => $this->formatPlannedEndDateOfChildSupport,
                'end_date_of_foster_care' => $this->formatEndDateOfFosterCare,
                'date_of_commencement_of_special_childcare_provision' => $this->formatDateOfCommencementOfSpecialChildcareProvision,
            ]);
            $this->dispatch('closeClosureModal');
            $this->dispatch('success');
        } catch (\Exception $e) {
            \Log::error($e);
            return back()->withErrors('エラー');
        }
    }

    public function updateClosure($id)
    {
        $this->formatStartDateOfClosed = $this->startDateOfClosed ?
            (Carbon::hasFormat($this->startDateOfClosed, 'Y-m-d') ?
                $this->startDateOfClosed : Carbon::createFromFormat('Y年n月j日', $this->startDateOfClosed)->format('Y-m-d')
            ) : null;
        $this->formatEndDateOfLosed = $this->endDateOfLosed ?
            (Carbon::hasFormat($this->endDateOfLosed, 'Y-m-d') ?
                $this->endDateOfLosed : Carbon::createFromFormat('Y年n月j日', $this->endDateOfLosed)->format('Y-m-d')
            ) : null;
        $this->formatDateOfReturnToWork = $this->dateOfReturnToWork ?
            (Carbon::hasFormat($this->dateOfReturnToWork, 'Y-m-d') ?
                $this->dateOfReturnToWork : Carbon::createFromFormat('Y年n月j日', $this->dateOfReturnToWork)->format('Y-m-d')
            ) : null;
        $this->formatDueDate = $this->dueDate ?
            (Carbon::hasFormat($this->dueDate, 'Y-m-d') ?
                $this->dueDate : Carbon::createFromFormat('Y年n月j日', $this->dueDate)->format('Y-m-d')
            ) : null;
        $this->formatPlannedEndDateOfClosure = $this->plannedEndDateOfClosure ?
            (Carbon::hasFormat($this->plannedEndDateOfClosure, 'Y-m-d') ?
                $this->plannedEndDateOfClosure : Carbon::createFromFormat('Y年n月j日', $this->plannedEndDateOfClosure)->format('Y-m-d')
            ) : null;
        $this->formatDateOfBirth = $this->dateOfBirth ?
            (Carbon::hasFormat($this->dateOfBirth, 'Y-m-d') ?
                $this->dateOfBirth : Carbon::createFromFormat('Y年n月j日', $this->dateOfBirth)->format('Y-m-d')
            ) : null;
        $this->formatDateOfStartOfFosterCare = $this->dateOfStartOfFosterCare ?
            (Carbon::hasFormat($this->dateOfStartOfFosterCare, 'Y-m-d') ?
                $this->dateOfStartOfFosterCare : Carbon::createFromFormat('Y年n月j日', $this->dateOfStartOfFosterCare)->format('Y-m-d')
            ) : null;
        $this->formatPlannedEndDateOfChildSupport = $this->plannedEndDateOfChildSupport ?
            (Carbon::hasFormat($this->plannedEndDateOfChildSupport, 'Y-m-d') ?
                $this->plannedEndDateOfChildSupport : Carbon::createFromFormat('Y年n月j日', $this->plannedEndDateOfChildSupport)->format('Y-m-d')
            ) : null;
        $this->formatEndDateOfFosterCare = $this->endDateOfFosterCare ?
            (Carbon::hasFormat($this->endDateOfFosterCare, 'Y-m-d') ?
                $this->endDateOfFosterCare : Carbon::createFromFormat('Y年n月j日', $this->endDateOfFosterCare)->format('Y-m-d')
            ) : null;
        $this->formatDateOfCommencementOfSpecialChildcareProvision = $this->dateOfCommencementOfSpecialChildcareProvision ?
            (Carbon::hasFormat($this->dateOfCommencementOfSpecialChildcareProvision, 'Y-m-d') ?
                $this->dateOfCommencementOfSpecialChildcareProvision : Carbon::createFromFormat('Y年n月j日', $this->dateOfCommencementOfSpecialChildcareProvision)->format('Y-m-d')
            ) : null;

        $rules = [
            'formatStartDateOfClosed' => 'nullable|required_if:closure_type,1,2,3,4,6,7|date',
            'formatEndDateOfLosed' => 'nullable|date|after:formatStartDateOfClosed',
            'formatDateOfReturnToWork' => 'nullable|date|after:formatStartDateOfClosed|after:formatEndDateOfLosed',
            'formatDueDate' => 'nullable|date',
            'formatPlannedEndDateOfClosure' => 'nullable|date',
            'formatDateOfBirth' => 'nullable|date',
            'formatPlannedEndDateOfChildSupport' => 'nullable|date',
            'formatEndDateOfFosterCare' => 'nullable|date|after:formatDateOfStartOfFosterCare',
        ];
        if ($this->closure_type == "5") {
            $rules['formatDateOfCommencementOfSpecialChildcareProvision'] = 'nullable|required_without_all:formatDateOfStartOfFosterCare|date';
            $rules['formatDateOfStartOfFosterCare'] = 'nullable|required_without_all:formatDateOfCommencementOfSpecialChildcareProvision|date';
        }
        $this->validate($rules, [
            'formatStartDateOfClosed.required_if' => '休業開始日は必須です',
            'formatStartDateOfClosed.date' => '休業開始日は有効な日付でなければなりません',
            'formatEndDateOfLosed.date' => '休業終了日は有効な日付でなければなりません',
            'formatEndDateOfLosed.after' => '休業終了日は休業開始日以降の日付でなければなりません',
            'formatDateOfReturnToWork.date' => '職場復帰日は有効な日付でなければなりません',
            'formatDateOfReturnToWork.after' => '職場復帰日は休業開始日また休業終了日以降の日付でなければなりません',
            'formatDueDate.date' => '出産予定日は有効な日付でなければなりません',
            'formatPlannedEndDateOfClosure.date' => '休業終了予定日は有効な日付でなければなりません',
            'formatDateOfBirth.date' => '出産日は有効な日付でなければなりません',
            'formatPlannedEndDateOfChildSupport.date' => '養育終了予定日は有効な日付でなければなりません',
            'formatDateOfCommencementOfSpecialChildcareProvision.required_without_all' => '養育特例開始日また養育開始日のいずれは必須です',
            'formatDateOfCommencementOfSpecialChildcareProvision.date' => '養育特例開始日は有効な日付でなければなりません',
            'formatDateOfStartOfFosterCare.required_without_all' => '養育開始日また養育特例開始日のいずれは必須です',
            'formatDateOfStartOfFosterCare.date' => '養育開始日は有効な日付でなければなりません',
            'formatEndDateOfFosterCare.date' => '養育終了日は有効な日付でなければなりません',
            'formatEndDateOfFosterCare.after' => '養育終了日は養育開始日以降の日付でなければなりません',
        ]);

        try {
            $current_closure = Closure_information::where('id', $id)->first();
            Closure_information::where('id', $id)->update([
                'employee_id' => $current_closure->employee_id,
                'closure_type' => $this->closure_type,
                'start_date_of_closed' => $this->formatStartDateOfClosed,
                'end_date_of_losed' => $this->formatEndDateOfLosed,
                'date_of_return_to_work' => $this->formatDateOfReturnToWork,
                'due_date' => $this->formatDueDate,
                'planned_end_date_of_closure' => $this->formatPlannedEndDateOfClosure,
                'date_of_birth' => $this->formatDateOfBirth,
                'date_of_start_of_foster_care' => $this->formatDateOfStartOfFosterCare,
                'planned_end_date_of_child_support' => $this->formatPlannedEndDateOfChildSupport,
                'end_date_of_foster_care' => $this->formatEndDateOfFosterCare,
                'date_of_commencement_of_special_childcare_provision' => $this->formatDateOfCommencementOfSpecialChildcareProvision,
            ]);
            $this->dispatch('closeClosureModal');
            $this->dispatch('success');
        } catch (\Exception $e) {
            \Log::error($e);
            return back()->withErrors('エラー');
        }
    }

    private function resetForm()
    {
        $this->startDateOfClosed = '';
        $this->endDateOfLosed = '';
        $this->dateOfReturnToWork = '';
        $this->dueDate = '';
        $this->plannedEndDateOfClosure = '';
        $this->dateOfBirth = '';
        $this->dateOfStartOfFosterCare = '';
        $this->plannedEndDateOfChildSupport = '';
        $this->endDateOfFosterCare = '';
        $this->dateOfCommencementOfSpecialChildcareProvision = '';
        $this->current_closure = '';
    }
}
