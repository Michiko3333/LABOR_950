<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'm_employee';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

    public function employee_salary_breakdown()
    {
        return $this->hasMany(Employee_salary_breakdown::class);
    }

    public function labor_contract()
    {
        return $this->hasMany(Labor_contract::class);
    }

    public function calendar_event()
    {
        return $this->hasMany(Calendar_event::class);
    }

    public function external_advisor_receptionist()
    {
        return $this->hasMany(External_advisor_receptionist::class,'id','external_advisor_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
    public function roles()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }
}
