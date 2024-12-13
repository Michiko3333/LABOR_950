<?php

namespace App\Livewire;

use App\Models\Closure_information;
use App\Models\Receptionist;
use App\Models\Managerial_position;
use Livewire\Component;

use Livewire\Attributes\On;

class CancelModalContent extends BaseTable
{
    public $receptionistId;
    public $managerialPositionId;
    public $closureId;

    #[On('cancelModalOpened')]
    public function cancelModalOpened($receptionistId, $managerialPositionId, $closureId)
    {
        if ($receptionistId) {
            $this->receptionistId = $receptionistId;
        } elseif ($managerialPositionId) {
            $this->managerialPositionId = $managerialPositionId;
        } elseif ($closureId) {
            $this->closureId = $closureId;
        }
    }

    public function render()
    {
        return view('livewire.cancel-modal-content');
    }

    public function cancelReception()
    {
        $id = $this->receptionistId;
        $reception = Receptionist::select('id', 'employee_id')
            ->where('id', $id)
            ->first();
        $employeeId = $reception->employee_id;

        if ($reception) {
            $reception->delete();
        }

        $this->dispatch('closeCancelModal');
    }

    public function cancelManagerialPosition() {
        Managerial_position::where('id', $this->managerialPositionId)->update([
            'delete_flg' => 1
        ]);

        $this->dispatch('closeCancelModal');
    }

    public function cancelClosure() {
        Closure_information::where('id', $this->closureId)->update([
            'delete_flg' => 1
        ]);
        $this->dispatch('closeCancelModal');
    }
}
