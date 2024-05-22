<?php

namespace App\Livewire;

use App\Models\Managerial_position;
use Livewire\Component;

class ManagerialPositionList extends Component
{
    public $company_id = 0;

    public $form_id = 0;
    public $form_name = '';
    public $form_name_kana = '';
    public $form_rank = '0';
    public $form_representative_flg = false;

    public $managerial_position = [];

    public function mount($company_id)
    {
        $this->company_id = $company_id;
    }
    
    public function render()
    {
        $managerial_position = Managerial_position::where('company_id', $this->company_id)->where('delete_flg', 0);
        $this->managerial_position = $managerial_position->select('id', 'name', 'name_kana', 'rank', 'representative_flg')->get();

        $sortedData = $this->managerial_position->sortBy('rank');
        $groupedData = $sortedData->groupBy('rank');

        return view('livewire.managerial-position-list', ['groupedData' => $groupedData]);
    }

    public function select($id)
    {
        $d = Managerial_position::find($id);
        $this->form_id = $d->id;
        $this->form_name = $d->name;
        $this->form_name_kana = $d->name_kana;
        $this->form_rank = $d->rank;
        $this->form_representative_flg = $d->representative_flg;
    }

    public function edit($id)
    {
        $this->dispatch('setEditData', id: $id);
    }
}
