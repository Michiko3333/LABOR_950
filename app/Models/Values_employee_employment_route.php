<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Values_employee_employment_route extends Model
{
    protected $table = 'm_values_employee_employment_route';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->hasMany(Employee::class,'id','employment_route');
    }
}