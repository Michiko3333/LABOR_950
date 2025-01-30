<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

use Carbon\Carbon;

use App\Permission;
use App\Models\CurrentUser;
use App\Models\Pickup;
use App\Models\Pickup_situation;
use App\Models\Employee;

class PickupList extends BaseTable
{
    public $situations = [];
    public $situation_colors = ['no_supported', 'in_progress', 'completion', 'invalid'];

    public $editPermission = false;

    public $limit = 10;

    public function mount()
    {
        $this->page = request()->query('p', 1);

        $permission = new Permission();
        $this->editPermission = ($permission->isGeneralAffair() && !$permission->isAdmin() && $permission->isWritableFor(15));
    }

    public function render()
    {
        $current_company = CurrentUser::currentCompany();
        $current_company_id = 0;
        if(!empty($current_company)) {
            $current_company_id = $current_company->id;
        }
        $condition = Pickup::select(
                'id',
                'due_date',
                'business_name',
                'content',
                'responder_id',
                'pickup_situation_id',
            )
            ->where('company_id', $current_company_id)
            ->where('pickup_type_id', '!=', 9) // 役員の誕生日以外
            ->where('delete_flg', 0);

        $this->paginated = true;
        $this->data = $this->getData($condition);
        $ids = [];

        $items = $this->data['items'];
        foreach($items as &$item) {
            $item->format_due_date = Carbon::parse($item->due_date)->format('Y年n月j日');

            $item->responder = Employee::select('last_name', 'first_name')
                ->where('delete_flg', 0)
                ->where('id', $item->responder_id)
                ->first();
            $item->responder_name = $item->responder ? $item->responder->last_name . ' ' . $item->responder->first_name : '-';

            $pickup_situations = Pickup_situation::pluck('name', 'id')->toArray();
            $item->situation_text = $pickup_situations[$item->pickup_situation_id];
            $item->situation_color = $this->situation_colors[$item->pickup_situation_id - 1];

            $ids[] = $item['id'];
        }

        $this->RestrictingQueryParameters($ids);

        return view('livewire.pickup-list');
    }

    // クエリパラメーターのバリデーション
    public function RestrictingQueryParameters(array $ids)
    {
        $queryParameterP = request()->get('p');
        $totalPages = $this->data['pagination']['totalPages'];
        if(isset($queryParameterP)) {
            if(1 > $queryParameterP || $queryParameterP > $totalPages) {
                abort(404);
            }
        }

        $queryParameterId = request()->query('id');
        if(isset($queryParameterId)) {
            if (!in_array($queryParameterId, $ids)) {
                abort(404);
            }
        }
    }

    #[On('openDetail')]
    public function detail($id)
    {
        $this->inputs_error = false;

        $d = Pickup::select(
                'due_date',
                'business_name',
                'content',
                'responder_id',
                'pickup_situation_id',
            )
            ->where('id', $id)
            ->where('delete_flg', 0)
            ->first();

        if (!empty($d)) {
            $this->situations = Pickup_situation::where('id', '>=', $d->pickup_situation_id)->get();

            $due_date = Carbon::parse($d->due_date)->format('Y年n月j日');

            $responder = Employee::select('last_name', 'first_name')
                ->where('delete_flg', 0)
                ->where('id', $d->responder_id)
                ->first();
            $responder_name = $responder ? $responder->last_name . ' ' . $responder->first_name : '-';

            $this->dispatch('modal-onDetailModal', info: [
                'id' => $id,
                'business_name' => $d->business_name,
                'content' => $d->content,
                'due_date' => $due_date,
                'responder_name' => $responder_name,
                'pickup_situation_id' => $d->pickup_situation_id,
            ]);
        } else {
            \Log::error('no pickup');
        }
    }

    #[On('onSubmitPickup')]
    public function edit($id, $situation)
    {
        if (!in_array($situation, ['1', '2', '3', '4'], true)) {
            $this->dispatch('modal-onSubmitError');
            return false;
        }        

        $current_user = CurrentUser::info();
        $current_user_id = $current_user->id;

        $pickup = Pickup::where('id', $id)->first();
        if($pickup->situation !== (int)$situation) {
                $pickup->update([
                    'responder_id' => $current_user_id,
                    'pickup_situation_id' => (int)$situation,
                ]);
        }

        $this->dispatch('modal-closePickupModal');
        return true;
    }
}
