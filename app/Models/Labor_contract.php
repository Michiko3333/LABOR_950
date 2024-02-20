<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Labor_contract extends Model
{
    protected $table = 't_labor_contract';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function labor_contract_salary_breakdown()
    {
        return $this->hasMany(Labor_contract_salary_breakdown::class);
    }
}