<?php

namespace App\Livewire;

use App\Models\Allowance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Branch;

class AllowanceModalContent extends BaseTable
{
    public $id;
    public $allowance_name;
    public $branch_id;
    public $applied_date;
    public $end_date_of_application;
    public $formatAppliedDate;
    public $formatEndDateOfApplication;

    protected $listeners = ['updatedModalBranchId','allowanceModalOpened','submitAllowance','updateAllowance'];

    public function allowanceModalOpened($id)
    {
        $this->resetErrorBag();
        $this->id = $id;
        if($id){
            $this->allowance_name = Allowance::where('id',$id)->pluck('name')->first();
        }
    }

    public function updatedModalBranchId($branch_id)
    {
        $this->branch_id = $branch_id;
    }

    public function render()
    {
        $this->dispatch('allowance-modal-render');
        return view('livewire.allowance-modal-content');
    }

    public function submitAllowance()
    {
        $rules = [
            'allowance_name' => 'required|max:255',
            'applied_date' => 'required',
        ];
        $this->validate($rules,[
            'allowance_name.required' => '名称は必須です',
            'applied_date.required' => '適用日は必須です',
        ]);

        $formatAppliedDate = $this->applied_date ? Carbon::createFromFormat('Y年n月j日', $this->applied_date)->format('Y-m-d') : null;

        try {
            Allowance::create([
                'branch_id' => $this->branch_id,
                'name' => $this->allowance_name,
                'applied_date' => $formatAppliedDate,
            ]);
            $this->dispatch('closeAllowanceModal');
        } catch (\Exception $e) {
            \Log::error($e);
            return back()->withErrors('エラー');
        }
    }

    public function makeAllowanceHistory($id)
    {
        $this->formatAppliedDate = Allowance::where('id',$id)->pluck('applied_date')->first();
        $this->formatEndDateOfApplication = $this->end_date_of_application ? Carbon::createFromFormat('Y年n月j日', $this->end_date_of_application)->format('Y-m-d') : null;

        $rules = [
            'formatEndDateOfApplication' => 'required|after:formatAppliedDate',
        ];
        $this->validate($rules,[
            'formatEndDateOfApplication.required' => '適用終了日は必須です',
            'formatEndDateOfApplication.after' => '適用終了日は適用日以降の日付でなければなりません',
        ]);

        try {
            Allowance::where('id', $id)->update([
                'end_date_of_application' => $this->formatEndDateOfApplication,
                'history_flg' => 1,
            ]);
            $this->dispatch('closeAllowanceModal');
        } catch (\Exception $e) {
            \Log::error($e);
            return back()->withErrors('エラー');
        }
    }
}