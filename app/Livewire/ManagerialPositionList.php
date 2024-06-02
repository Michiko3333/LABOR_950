<?php

namespace App\Livewire;

use App\Models\Managerial_position;
use Livewire\Component;
use Livewire\Attributes\On;

class ManagerialPositionList extends Component
{
    public $company_id = 0;
    public $data = [];

    public $form_id = 0;
    public $form_name = '';
    public $form_name_kana = '';
    public $form_rank = '0';
    public $form_representative_flg = false;

    public $remove_tmp = 0;

    public function mount($company_id)
    {
        $this->company_id = $company_id;
    }
    public function render()
    {
        $this->data = Managerial_position::select('id', 'name', 'name_kana', 'rank', 'representative_flg')
            ->where('company_id', $this->company_id)
            ->where('delete_flg', 0)
            ->orderBy('rank', 'asc')
            ->get();

        return view('livewire.managerial-position-list');
    }

    public function new()
    {
        $this->resetForm();
        $this->dispatch('showModal', $this->setData());
    }

    public function edit($id)
    {
        $this->resetForm();
        $position = Managerial_position::select('id', 'name', 'name_kana', 'rank', 'representative_flg')
            ->where('id', $id)
            ->where('company_id', $this->company_id)
            ->where('delete_flg', 0)
            ->first();

        if (empty($position)) return;

        $this->form_id = $id;
        $this->form_name = $position->name;
        $this->form_name_kana = $position->name_kana;
        $this->form_rank = $position->rank;
        $this->form_representative_flg = $position->representative_flg;

        $this->dispatch('showModal', $this->setData());
    }

    public function setData()
    {
        return [
            'form_id' => $this->form_id,
            'form_name' => $this->form_name,
            'form_name_kana' => $this->form_name_kana,
            'form_rank' => $this->form_rank,
            'form_representative_flg' => $this->form_representative_flg
        ];
    }

    #[On('onEditManagerial')]
    public function onEditManagerial($data = null)
    {

        if (empty($data['form_name']) || empty($data['form_name_kana']) || $data['form_rank'] < 1 || $data['form_rank'] > 10) {
            $this->dispatch('showErrorMessage');
            return;
        }
        if (!empty($data['form_id'])) {
            Managerial_position::where('company_id', $this->company_id)->where('id', $data['form_id'])->update([
                'name' => $data['form_name'],
                'name_kana' => $data['form_name_kana'],
                'rank' => (int) $data['form_rank'],
                'representative_flg' => (int) $data['form_representative_flg'],
            ]);
        } else {
            Managerial_position::insert([
                'name' => $data['form_name'],
                'name_kana' => $data['form_name_kana'],
                'rank' => (int) $data['form_rank'],
                'representative_flg' => (int) $data['form_representative_flg'],
                'company_id' => $this->company_id,
            ]);
        }
        $this->dispatch('closeModal');
        $this->render();
    }

    public function remove($id, $name)
    {
        $this->remove_tmp = $id;
        $this->dispatch('showRemoveModal', ['id' => $id, 'name' => $name]);
    }

    #[On('onRemoveManagerial')]
    public function onRemoveManagerial()
    {
        Managerial_position::where('id', $this->remove_tmp)->where('company_id', $this->company_id)->update([
            'delete_flg' => 1
        ]);
        $this->remove_tmp = 0;
        $this->render();
    }

    #[On('onCancelManagerial')]
    public function onCancelManagerial()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->remove_tmp = 0;

        $this->form_id = 0;
        $this->form_name = '';
        $this->form_name_kana = '';
        $this->form_rank = '1';
        $this->form_representative_flg = '';
    }
}
