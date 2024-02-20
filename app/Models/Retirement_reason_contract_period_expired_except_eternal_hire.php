<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retirement_reason_contract_period_expired_except_eternal_hire extends Model
{
    protected $table = 'm_retirement_reason_contract_period_expired_except_eternal_hire';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
