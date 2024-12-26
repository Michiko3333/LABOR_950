<?php

namespace App\Livewire;

use App\Models\Qualifications;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Rules\noEmoji;

class QualificationsList extends Component
{
    public $company_id = 0;
    public $data = [];

    public $form_id = 0;
    public $form_qualification_name = '';
    public $form_qualification_allowance = '';
    public $form_applicable_grade = '';

    public $remove_tmp = 0;

    public function mount($company_id)
    {
        $this->company_id = $company_id;
    }
    public function render()
    {
        $this->data = Qualifications::select('id', 'qualification_name', 'qualification_allowance', 'applicable_grade')
            ->where('company_id', $this->company_id)
            ->where('delete_flg', 0)
            ->orderBy('applicable_grade', 'asc')
            ->get();

        foreach($this->data as $item) {
            $item['qualification_allowance'] = number_format($item['qualification_allowance']);
        }

            return view('livewire.qualifications-list');
    }

    public function new()
    {
        $this->resetForm();
        $this->dispatch('showModal', $this->setData());
    }

    public function edit($id)
    {
        $this->resetForm();
        $position = Qualifications::select('id', 'qualification_name', 'qualification_allowance', 'applicable_grade')
            ->where('id', $id)
            ->where('company_id', $this->company_id)
            ->where('delete_flg', 0)
            ->first();

        if (empty($position)) return;

        $this->form_id = $id;
        $this->form_qualification_name = $position->qualification_name;
        $this->form_qualification_allowance = $position->qualification_allowance;
        $this->form_applicable_grade = $position->applicable_grade;

        $this->dispatch('showModal', $this->setData());
    }

    public function setData()
    {
        return [
            'form_id' => $this->form_id,
            'form_qualification_name' => $this->form_qualification_name,
            'form_qualification_allowance' => $this->form_qualification_allowance,
            'form_applicable_grade' => $this->form_applicable_grade,
        ];
    }

    #[On('onEditQualification')]
    public function onEditQualification($data = null)
    {
        if (empty($data['form_qualification_name']) || strlen($data['form_qualification_name']) > 50) {
            $this->dispatch('showErrorMessage');
            return;
        }
        if (noEmoji::isEmoji($data['form_qualification_name'])) {
            $this->dispatch('showErrorMessage');
            return;
        }
        if ($data['form_qualification_allowance'] < 0 || $data['form_qualification_allowance'] > 10000000) {
            $this->dispatch('showErrorMessage');
            return;
        }
        if ($data['form_applicable_grade'] < 0) {
            $this->dispatch('showErrorMessage');
            return;
        }

        if (!empty($data['form_id'])) {
            Qualifications::where('company_id', $this->company_id)->where('id', $data['form_id'])->update([
                'qualification_name' => $data['form_qualification_name'],
                'qualification_allowance' => (int) $data['form_qualification_allowance'],
                'applicable_grade' => $data['form_applicable_grade'],
            ]);
        } else {
            Qualifications::insert([
                'company_id' => $this->company_id,
                'qualification_name' => $data['form_qualification_name'],
                'qualification_allowance' => (int) $data['form_qualification_allowance'],
                'applicable_grade' => $data['form_applicable_grade'],
            ]);
        }
        $this->dispatch('closeModal');
        $this->render();
    }

    public function remove($id, $qualification_name)
    {
        $this->remove_tmp = $id;
        $this->dispatch('showRemoveModal', ['id' => $id, 'qualification_name' => $qualification_name]);
    }

    #[On('onRemoveQualification')]
    public function onRemoveQualification()
    {
        Qualifications::where('id', $this->remove_tmp)->where('company_id', $this->company_id)->update([
            'delete_flg' => 1
        ]);
        $this->remove_tmp = 0;
        $this->render();
    }

    #[On('onCancelQualification')]
    public function onCancelQualification()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->remove_tmp = 0;

        $this->form_id = 0;
        $this->form_qualification_name = '';
        $this->form_qualification_allowance = '';
        $this->form_applicable_grade = '';
    }
}
