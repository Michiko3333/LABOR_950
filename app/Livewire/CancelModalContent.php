<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Receptionist;
use Livewire\Component;

use Livewire\Attributes\On;

class CancelModalContent extends BaseTable
{
    public $receptionistId;

    #[On('cancelModalOpened')]
    public function cancelModalOpened($receptionistId)
    {
        $this->receptionistId = $receptionistId;
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
}
