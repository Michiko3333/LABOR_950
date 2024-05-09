<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Values_employee_childcare_reacquisition_reason extends Model
{
    protected $table = 'm_values_employee_childcare_reacquisition_reason';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->hasMany(Employee::class,'id','childcare_reacquisition_reason');
    }
}
