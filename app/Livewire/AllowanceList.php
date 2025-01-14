<?php

namespace App\Livewire;

use App\Models\Allowance;
use App\Models\Branch;
use Carbon\Carbon;

class AllowanceList extends BaseTable
{
    public $branch_list;
    public $items;
    public $historyItems;
    public $nonHistoryItems;
    public $company_id;
    public $branch_id = '';
    public $history_flg = 0;

    public function mount($company_id = null)
    {
        $this->company_id = $company_id;
        $this->history_flg = 0;
        $this->branch_list = Branch::where('company_id', $company_id)->where('delete_flg', 0)->pluck('name', 'id')->toArray();
    }

    public function updatedBranchId($branch_id)
    {
        $this->branch_id = $branch_id;
        $this->dispatch('updatedModalBranchId',$branch_id);
        
        $condition = Allowance::select([
            'm_allowance.id',
            'm_allowance.name',
            'm_allowance.branch_id',
            'm_allowance.applied_date',
            'm_allowance.end_date_of_application',
            'm_allowance.history_flg',
        ])
        ->where('m_allowance.branch_id', $this->branch_id)
        ->where('m_allowance.delete_flg', 0);
        $this->data = $this->getData($condition);
        $this->items = $this->data['items'];
        if($this->items){
            foreach ($this->items as &$item) {
                $item->applied_date = $item->applied_date ? Carbon::parse($item->applied_date)->format('Y年n月j日') : null;
                $item->end_date_of_application = $item->end_date_of_application ? Carbon::parse($item->end_date_of_application)->format('Y年n月j日') : null;
            }
        }
        $this->nonHistoryItems = collect($this->items)->where('history_flg', 0)->values()->all();
        $this->historyItems = collect($this->items)->where('history_flg', 1)->values()->all();

    }

    public function updatedHistoryFlg()
    {
        foreach ($this->nonHistoryItems as &$item) {
            if (preg_match('/[\x{4e00}-\x{9fa5}]/u', $item->applied_date)) {
                $item->applied_date = $item->applied_date ? Carbon::createFromFormat('Y年n月j日', $item->applied_date)->format('Y年n月j日') : null;
            } else {
                $item->applied_date = $item->applied_date ? Carbon::parse($item->applied_date)->format('Y年n月j日') : null;
            }

            if (preg_match('/[\x{4e00}-\x{9fa5}]/u', $item->end_date_of_application)) {
                $item->end_date_of_application = $item->end_date_of_application ? Carbon::createFromFormat('Y年n月j日', $item->end_date_of_application)->format('Y年n月j日') : null;
            } else {
                $item->end_date_of_application = $item->end_date_of_application ? Carbon::parse($item->end_date_of_application)->format('Y年n月j日') : null;
            }
        }
        foreach ($this->historyItems as &$item) {
            if (preg_match('/[\x{4e00}-\x{9fa5}]/u', $item->applied_date)) {
                $item->applied_date = $item->applied_date ? Carbon::createFromFormat('Y年n月j日', $item->applied_date)->format('Y年n月j日') : null;
            } else {
                $item->applied_date = $item->applied_date ? Carbon::parse($item->applied_date)->format('Y年n月j日') : null;
            }

            if (preg_match('/[\x{4e00}-\x{9fa5}]/u', $item->end_date_of_application)) {
                $item->end_date_of_application = $item->end_date_of_application ? Carbon::createFromFormat('Y年n月j日', $item->end_date_of_application)->format('Y年n月j日') : null;
            } else {
                $item->end_date_of_application = $item->end_date_of_application ? Carbon::parse($item->end_date_of_application)->format('Y年n月j日') : null;
            }    
        }
    }
    
    public function render()
    {
        return view('livewire.allowance-list');
    }
}