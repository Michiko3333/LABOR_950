<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Labor_contract_salary_breakdown extends Model
{
    protected $table = 't_labor_contract_salary_breakdown';
    protected $primaryKey = 'id';

    public function labor_contract()
    {
        return $this->belongsTo(Labor_contract::class);
    }

    public function salary_breakdown()
    {
        return $this->belongsTo(Salary_breakdown::class);
    }
}