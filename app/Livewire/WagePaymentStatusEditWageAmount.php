<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\DepartmentPermission;

use Livewire\Component;
use App\Models\Branch;
use App\Models\Wage;
use App\Models\Employee;
use App\Models\Salary;
use App\Models\Attendance;
use Livewire\Attributes\On;

use App\Rules\noEmoji;

class WagePaymentStatusEditWageAmount extends Component
{
    public function render()
    {
        return view('livewire.wage-payment-status-edit-wage-amount');
    }


    public function openEditWageAmountModal()
    {
        $this->dispatch('showEditWageAmountModal');// フロントエンドに通知
    }
}