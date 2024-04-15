<?php

namespace App\Livewire;

use App\Models\Managerial_position;
use Livewire\Component;
use Livewire\Attributes\On;

class ManagerialPositionList extends Component
{
    public $company_id = 0;
    public $data = [];
    public $showModal = false;

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
        return view('livewire.managerial-position-list');
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

    public function new()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $this->resetForm();
        $managerial_position = Managerial_position::where('company_id', $this->company_id)->where('id', $id)->first();
        $this->form_id = $id;
        $this->form_name = $managerial_position->name;
        $this->form_name_kana = $managerial_position->name_kana;
        $this->form_rank = $managerial_position->rank;
        $this->form_representative_flg = (bool)$managerial_position->representative_flg;
    }

    public function remove($id)
    {
        Managerial_position::where('id', $id)->update([
            'delete_flg' => 1
        ]);
    }

    #[On('onCancelManagerialPosition')]
    public function onCancelManagerialPosition()
    {
        $this->resetForm();
    }

    #[On('onEditManagerialPosition')]
    public function onEditManagerialPosition()
    {
        if (!empty($this->form_id)) {
            Managerial_position::where('id', $this->form_id)->update([
                'company_id' => $this->company_id,
                'name' => $this->form_name,
                'name_kana' => $this->form_name_kana,
                'rank' => (int) $this->form_rank,
                'representative_flg' => $this->form_representative_flg ? 1 : 0,
            ]);
        } else {
            Managerial_position::insert([
                'company_id' => $this->company_id,
                'name' => $this->form_name,
                'name_kana' => $this->form_name_kana,
                'rank' => (int) $this->form_rank,
                'representative_flg' => $this->form_representative_flg ? 1 : 0,
            ]);
        }
    }

    private function resetForm()
    {
        $this->form_id = 0;
        $this->form_name = '';
        $this->form_name_kana = '';
        $this->form_rank = '0';
        $this->form_representative_flg = false;
    }
}
