<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retirement_reason_other_reasons extends Model
{
    protected $table = 'm_retirement_reason_other_reasons';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
