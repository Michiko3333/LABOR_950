<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retirement_reason_contract_period_reached_limit extends Model
{
    protected $table = 'm_retirement_reason_contract_period_reached_limit';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
