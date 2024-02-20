<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retirement_reason_business_owner_suggestion extends Model
{
    protected $table = 'm_retirement_reason_business_owner_suggestion';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
