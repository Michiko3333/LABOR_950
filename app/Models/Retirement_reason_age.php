<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retirement_reason_age extends Model
{
    protected $table = 'm_retirement_reason_age';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
