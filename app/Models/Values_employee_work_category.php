<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Values_employee_work_category extends Model
{
    protected $table = 'm_values_employee_work_category';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->hasMany(Employee::class,'id','work_category');
    }
}