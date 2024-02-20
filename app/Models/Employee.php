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

    public function retirement_reason_age()
    {
        return $this->hasOne(Retirement_reason_age::class);
    }

    public function retirement_reason_contract_period_reached_limit()
    {
        return $this->hasOne(Retirement_reason_contract_period_reached_limit::class);
    }
    
    public function retirement_reason_contract_period_expired_eternal_hire()
    {
        return $this->hasOne(Retirement_reason_contract_period_expired_eternal_hire::class);
    }

    public function retirement_reason_contract_period_expired_except_eternal_hire()
    {
        return $this->hasOne(Retirement_reason_contract_period_expired_except_eternal_hire::class);
    }

    public function retirement_reason_business_owner_suggestion()
    {
        return $this->hasOne(Retirement_reason_business_owner_suggestion::class);
    }

    public function retirement_reason_employee_decision_change_job_type()
    {
        return $this->hasOne(Retirement_reason_employee_decision_change_job_type::class);
    }

    public function retirement_reason_employee_decision_change_office()
    {
        return $this->hasOne(Retirement_reason_employee_decision_change_office::class);
    }

    public function retirement_reason_employee_decision_reasons()
    {
        return $this->hasOne(Retirement_reason_employee_decision_reasons::class);
    }
    
    public function retirement_reason_other_reasons()
    {
        return $this->hasOne(Retirement_reason_other_reasons::class);
    }
    
    public function external_advisor_receptionist()
    {
        return $this->hasMany(External_advisor_receptionist::class,'id','external_advisor_id');
    }
}
