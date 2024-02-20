<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class External_advisor_receptionist extends Model
{
    protected $table = 'm_external_advisor_receptionist';
    protected $primaryKey = 'id';

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class,'external_advisor_id','id');
    }
}