<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retirement_reason_employee_decision_change_office extends Model
{
    protected $table = 'm_retirement_reason_employee_decision_change_office';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
