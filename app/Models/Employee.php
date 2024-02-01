<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'm_employee';
    protected $primaryKey = 'id';

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function receptionist()
    {
        return $this->hasMany(Receptionist::class);
    }

    public function employee_department()
    {
        return $this->hasMany(Employee_department::class);
    }

    public function calendar_event()
    {
        return $this->hasMany(Calendar_event::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
