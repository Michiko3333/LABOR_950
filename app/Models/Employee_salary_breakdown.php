<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee_salary_breakdown extends Model
{
    protected $table = 'm_employee_salary_breakdown';
    protected $primaryKey = 'id';

    public function salary_breakdown()
    {
        return $this->belongsTo(Salary_breakdown::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}