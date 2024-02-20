<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Values_employee_occupation_type extends Model
{
    protected $table = 'm_values_employee_occupation_type';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->hasMany(Employee::class,'id','occupation_type');
    }
}