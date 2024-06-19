<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Receptionist;
use App\Models\Managerial_position;
use Livewire\Component;

use Livewire\Attributes\On;

class CancelModalContent extends BaseTable
{
    public $receptionistId;
    public $managerialPositionId;

    #[On('cancelModalOpened')]
    public function cancelModalOpened($receptionistId, $managerialPositionId)
    {
        if(!$managerialPositionId) {
            $this->receptionistId = $receptionistId;
        } elseif(!$receptionistId) {
            $this->managerialPositionId = $managerialPositionId;
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
}
