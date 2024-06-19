<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Values_employee_insured_reason extends Model
{
    protected $table = 'm_values_employee_insured_reason';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->hasMany(Employee::class,'id','insured_reason');
    }
}