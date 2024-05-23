<?php

namespace App\Livewire;

use App\Models\Managerial_position;
use Livewire\Component;
use Livewire\Attributes\On;

class ManagerialPositionModal extends Component
{
    public $company_id = 0;

    public $form_id = 0;
    public $form_name = '';
    public $form_name_kana = '';
    public $form_rank = '0';
    public $form_representative_flg = false;

    public function mount($company_id)
    {
        $this->company_id = $company_id;
    }
    
    public function render()
    {
        return view('livewire.managerial-position-modal');
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

    #[On('setEditData')]
    public function setEditData($id)
    {
        $this->resetForm();
        $managerial_position = Managerial_position::where('company_id', $this->company_id)->where('id', $id)->first();
        $this->form_id = $id;
        $this->form_name = $managerial_position->name;
        $this->form_name_kana = $managerial_position->name_kana;
        $this->form_rank = $managerial_position->rank;
        $this->form_representative_flg = (bool)$managerial_position->representative_flg;

        $this->dispatch('openManagerialPositionModal');
    }

    public function onEditManagerialPosition()
    {
        $this->validate([
            'form_name' => 'required|string',
            'form_name_kana' => 'required|string|regex:/^[ァ-ヴー\s]+$/u',
            'form_rank' => 'required|int|between:1,10',
        ], [
            'form_name.required' => '役職名は必須です',
            'form_name.string' => '役職名は正しい形式ではありません',
            'form_name_kana.required' => '役職名（カナ）は必須です',
            'form_name_kana.string' => '役職名（カナ）は正しい形式ではありません',
            'form_name_kana.regex' => '役職名（カナ）は全角カタカナで入力してください',
            'form_rank.required' => 'ランクは必須です',
            'form_rank.int' => 'ランクは正しい形式ではありません',
            'form_rank.between' => 'ランクは１～１０の間で入力してください',
        ]);

        if (!empty($this->form_id)) {
            try {
                Managerial_position::where('id', $this->form_id)->update([
                    'company_id' => $this->company_id,
                    'name' => $this->form_name,
                    'name_kana' => $this->form_name_kana,
                    'rank' => (int) $this->form_rank,
                    'representative_flg' => $this->form_representative_flg ? 1 : 0,
                ]);

                $this->dispatch('closeManagerialPositionModal');
            } catch (\Exception $e) {
                \Log::error($e);
                return back()->withErrors('エラー');
            }
      
        } else {
            try {
                Managerial_position::insert([
                    'company_id' => $this->company_id,
                    'name' => $this->form_name,
                    'name_kana' => $this->form_name_kana,
                    'rank' => (int) $this->form_rank,
                    'representative_flg' => $this->form_representative_flg ? 1 : 0,
                ]);

                $this->dispatch('closeManagerialPositionModal');
            } catch (\Exception $e) {
                \Log::error($e);
                return back()->withErrors('エラー');
            }
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
