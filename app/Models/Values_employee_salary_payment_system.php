<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Values_employee_salary_payment_system extends Model
{
    protected $table = 'm_values_employee_salary_payment_system';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->hasMany(Employee::class,'id','salary_payment_system');
    }
}