<?php

namespace App\Livewire;

use App\Models\Allowance;
use App\Models\Employee;
use App\Models\Closure_information;
use App\Models\Receptionist;
use App\Models\Managerial_position;
use Livewire\Component;

use Livewire\Attributes\On;

class CancelModalContent extends BaseTable
{
    public $receptionistId;
    public $managerialPositionId;
    public $allowanceId;
    public $name;
    public $closureId;
    public $allowanceHistoryId;

    #[On('cancelModalOpened')]
    public function cancelModalOpened($receptionistId, $managerialPositionId, 
    $closureId, $allowanceId, $name, $allowanceHistoryId)
    {
        if ($receptionistId) {
            $this->receptionistId = $receptionistId;
        } elseif ($managerialPositionId) {
            $this->managerialPositionId = $managerialPositionId;
        } elseif ($allowanceId) {
            $this->allowanceId = $allowanceId;
        } elseif ($allowanceHistoryId) {
            $this->allowanceHistoryId = $allowanceHistoryId;
        } elseif ($closureId) {
            $this->closureId = $closureId;
        }
        
        if($name){
            $this->name = $name;
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

    public function cancelAllowance() {
        Allowance::whereIn('id', array_filter([$this->allowanceId, $this->allowanceHistoryId]))
        ->update(['delete_flg' => 1]);
        $this->dispatch('closeCancelModal');
    }

    public function cancelClosure() {
        Closure_information::where('id', $this->closureId)->update([
            'delete_flg' => 1
        ]);
        $this->dispatch('closeCancelModal');
    }
}
