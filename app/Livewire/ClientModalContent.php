<?php

namespace App\Livewire;

use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;

use App\Models\Employee;
use App\Models\Branch;
use App\Models\Company;
use App\Models\Receptionist;
use Carbon\Carbon;
use Livewire\Component;

class ClientModalContent extends BaseTable
{
    public $id;

    public $search = '';
    public $limit = 5;

    public $disablePrev = false;
    public $disableNext = false;

    public $settingText = [];

    public $settingId = [];
    public $startDate;
    public $endDate;
    public $formatStartDate;
    public $formatEndDate;

    public $companyID;

    public $receptionistCompanyName;

    public $contract_update_success;

    protected $listeners = ['clientModalOpened'];

    public function mount(Request $request, $page = 1)
    {
        $this->id = $request->route()->parameter('id');
        $this->page = $page;
    }

    public function clientModalOpened($companyID)
    {
        $this->settingId = [];
        $this->settingText = [];

        $this->companyID = $companyID;

        if ($this->companyID) {
            $receptionistCompanyName = Company::join('m_receptionist', 'm_company.id', '=', 'm_receptionist.client_company_id')
                ->select('m_company.name')
                ->where('m_receptionist.client_company_id', $this->companyID)
                ->first();

            $this->receptionistCompanyName = $receptionistCompanyName->name;

            $receptionist = Receptionist::select('contract_start_date', 'contract_end_date')
                ->where('employee_id', $this->id)
                ->where('client_company_id', $this->companyID)
                ->first();
            if ($receptionist) {
                $this->startDate = Carbon::parse($receptionist->contract_start_date)->format('Y年n月j日');
                $this->endDate = Carbon::parse($receptionist->contract_end_date)->format('Y年n月j日');
            }
        } else {
            $this->startDate = null;
            $this->endDate = null;
        }
    }

    public function render()
    {
        $search = $this->search;

        $laborOffice = Company::where('company_division', 1);
        $employeeCompany = Company::join('m_branch', 'm_company.id', '=', 'm_branch.company_id')
            ->join('m_employee', 'm_branch.id', '=', 'm_employee.branch_id')
            ->select('m_company.id as employee_company_id')
            ->where('m_employee.id', $this->id);
        $receptionistCompany = Receptionist::join('m_employee', 'm_receptionist.employee_id', '=', 'm_employee.id')
            ->join('m_company', 'm_receptionist.client_company_id', 'm_company.id')
            ->select('m_company.id as receptionist_company_id')
            ->where('m_receptionist.employee_id', $this->id);

        $laborOffice = $laborOffice->pluck('id')->toArray();
        $employeeCompanyIds = $employeeCompany->pluck('employee_company_id')->toArray();
        $receptionistCompanyIds = $receptionistCompany->pluck('receptionist_company_id')->toArray();

        $condition = Company::join('m_branch', 'm_company.id', '=', 'm_branch.company_id')
            ->select('m_company.id', 'm_company.name')
            ->where('m_branch.branch_type', 1)
            ->where('m_company.delete_flg', 0)
            ->whereNotIn('m_company.id', array_merge($laborOffice, $employeeCompanyIds, $receptionistCompanyIds));

        if (!empty($search)) {
            $pat = '%' . addcslashes($search, '%_\\') . '%';
            $condition = $condition->where('m_company.name', 'LIKE', $pat);
        }
        $d = $this->getData($condition);
        $items = collect();
        foreach ($d['items'] as $key => &$item) {
            $obj = new \stdClass();
            $obj->id = $item->id;
            $obj->name = $item->name;
            $items->push($obj);
        }
        $d['items'] = $items;
        $this->data = $d;

        $this->total = $this->data['pagination']['totalItems'];
        $this->disablePrev = $this->page <= 1;
        $this->disableNext = $this->page >= ceil($this->total / $this->limit);

        $this->dispatch('client-modal-render');

        return view('livewire.client-modal-content');
    }

    public function settingID($employee_id, $company_id)
    {
        $this->settingId = [$employee_id, $company_id];

        if (!isset($this->settingText)) {
            $this->settingText = [];
        }

        if (!empty($this->settingText)) {
            if ($this->settingText[0] === $company_id) {
                $this->settingText = [];
                $this->settingId = [];
                return;
            } else {
                $this->settingText = [$company_id];
            }
        } else {
            $this->settingText = [$company_id];
        }

        $this->settingText[$company_id] = !($this->settingText[$company_id] ?? false);
    }

    public function settingCompany()
    {
        try {
            $employee_id = $this->settingId[0];
            $company_id = $this->settingId[1];
            $startDate = Carbon::createFromFormat('Y年n月j日', $this->startDate);
            $endDate = Carbon::createFromFormat('Y年n月j日', $this->endDate);
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'settingId.1.required' => '会社を選択してください',
                'startDate' => '契約開始日は有効な日付でなければなりません。',
                'endDate' => '契約終了日は有効な日付でなければなりません。',
            ]);
        }

        $this->formatStartDate = $startDate->format('Y-m-d');
        $this->formatEndDate = $endDate->format('Y-m-d');

        $this->validate([
            'settingId.1' => 'required',
            'formatStartDate' => 'required|date',
            'formatEndDate' => 'required|date|after:formatStartDate',
        ], [
            'settingId.1.required' => '会社を選択してください',
            'formatStartDate.required' => '契約開始日は必須です',
            'formatStartDate.date' => '契約開始日は有効な日付でなければなりません',
            'formatEndDate.required' => '契約終了日は必須です',
            'formatEndDate.date' => '契約終了日は有効な日付でなければなりません',
            'formatEndDate.after' => '契約終了日は契約開始日以降の日付でなければなりません',
        ]);

        try {
            Receptionist::create([
                'employee_id' => $employee_id,
                'client_company_id' => $company_id,
                'contract_start_date' => $startDate,
                'contract_end_date' => $endDate
            ]);

            $this->dispatch('closeClientModal');
        } catch (\Exception $e) {
            \Log::error($e);
            return back()->withErrors('エラー');
        }
    }

    public function contractUpdate()
    {
        try {
            $startDate = Carbon::createFromFormat('Y年n月j日', $this->startDate);
            $endDate = Carbon::createFromFormat('Y年n月j日', $this->endDate);
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'startDate' => '契約開始日は有効な日付でなければなりません。',
                'endDate' => '契約終了日は有効な日付でなければなりません。',
            ]);
        }

        $employee_id = $this->id;
        $company_id = $this->companyID;

        $this->formatStartDate = $startDate->format('Y-m-d');
        $this->formatEndDate = $endDate->format('Y-m-d');

        $this->validate([
            'formatStartDate' => 'required|date',
            'formatEndDate' => 'required|date|after:formatStartDate',
        ], [
            'formatStartDate.required' => '契約開始日は必須です',
            'formatStartDate.date' => '契約開始日は有効な日付でなければなりません',
            'formatEndDate.required' => '契約終了日は必須です',
            'formatEndDate.date' => '契約終了日は有効な日付でなければなりません',
            'formatEndDate.after' => '契約終了日は契約開始日以降の日付でなければなりません',
        ]);

        try {
            Receptionist::where('employee_id', $employee_id)
                ->where('client_company_id', $company_id)
                ->update([
                    'contract_start_date' => $startDate,
                    'contract_end_date' => $endDate
                ]);

            $this->dispatch('closeClientModal');
            $this->dispatch('contractSuccess');
        } catch (\Exception $e) {
            \Log::error($e);
            return back()->withErrors('エラー');
        }
    }
}
