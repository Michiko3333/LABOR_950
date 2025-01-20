<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary_breakdown extends Model
{
    protected $table = 'm_salary_breakdown';
    protected $primaryKey = 'id';

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function employee_salary_breakdown()
    {
        return $this->hasMany(Employee_salary_breakdown::class);
    }

    public function labor_contract_salary_breakdown()
    {
        return $this->hasMany(Labor_contract_salary_breakdown::class);
    }
}
